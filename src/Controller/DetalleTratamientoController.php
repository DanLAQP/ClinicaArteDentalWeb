<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Table\TratamientoTable;
/**
 * DetalleTratamiento Controller
 *
 * @property \App\Model\Table\DetalleTratamientoTable $DetalleTratamiento
 * @method \App\Model\Entity\DetalleTratamiento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DetalleTratamientoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */


    public function index()
{
    $detTraCodIngresado = null;

    if ($this->request->is('post')) {
        $detTraCodIngresado = $this->request->getData('DetTraCod');

        // Verifica si el campo de búsqueda tiene valor
        if (!empty($detTraCodIngresado)) {
            $query = $this->DetalleTratamiento->find()
                ->order(['DetTraCod' => 'ASC'])
                ->where(['DetTraCod' => $detTraCodIngresado]);
        } else {
            // Si no se ingresa ningún valor en el campo de búsqueda, obtiene todos los registros de DetalleTratamiento
            $query = $this->DetalleTratamiento;
        }
    } else {
        $query = $this->DetalleTratamiento;
    }

    $detalleTratamiento = $this->paginate($query);

    $this->set(compact('detalleTratamiento', 'detTraCodIngresado'));
}


    /**
     * View method
     *
     * @param string|null $id Detalle Tratamiento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detalleTratamiento = $this->DetalleTratamiento->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('detalleTratamiento'));
    }

/**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $opcionesDeTraCod = $this->DetalleTratamiento->Tratamiento->find('list', [
            'keyField' => 'TraCod',
            'valueField' => 'TraCod',
        ])->toArray();

        $detalleTratamiento = $this->DetalleTratamiento->newEmptyEntity();
        if ($this->request->is('post')) {
            $requestData = $this->request->getData();

            // Calcular el costo total (DetTraCosTot) multiplicando DetTraCan y DetTraCosUni
            $requestData['DetTraCosTot'] = $requestData['DetTraCan'] * $requestData['DetTraCosUni'];

            $detalleTratamiento = $this->DetalleTratamiento->patchEntity($detalleTratamiento, $requestData);

            // Asignar el valor manualmente a DetTraCod
            $detalleTratamiento->DetTraCod = $requestData['DetTraCod'];
            // Actualizar el estado de registro y el flag
            $detalleTratamiento->CarFlaAct = "1";
            $detalleTratamiento->EstReg = 'A';

            if ($this->DetalleTratamiento->save($detalleTratamiento)) {
                // Actualizar el estado del registro en lugar de eliminarlo

                $this->Flash->success(__('El detalleTratamiento se guardó.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El detalleTratamiento no pudo guardarse. Inténtelo de nuevo.'));
        }
        $this->set(compact('detalleTratamiento', 'opcionesDeTraCod'));
    }


/**
 * Edit method
 *
 * @param string|null $id DetalleTratamiento id.
 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function edit($id = null)
{
    $detalleTratamiento = $this->DetalleTratamiento->get($id, [
        'contain' => [],
    ]);

    // Verificar si se está realizando una actualización
    $updating = $this->request->is(['patch', 'post', 'put']);
    // Obtener el estado actual del flag o bandera de actualizar
    $flagToUpdate = $this->getFlagToUpdate($detalleTratamiento);

    if ($flagToUpdate) {
        if ($updating) {
            $requestData = $this->request->getData();

            // Calcular el costo total (DetTraCosTot) multiplicando DetTraCan y DetTraCosUni
            $requestData['DetTraCosTot'] = $requestData['DetTraCan'] * $requestData['DetTraCosUni'];

            $detalleTratamiento = $this->DetalleTratamiento->patchEntity($detalleTratamiento, $requestData);

            // Verificar si el registro se actualizó correctamente
            if ($this->DetalleTratamiento->save($detalleTratamiento)) {
                $this->Flash->success(__('El detalleTratamiento ha sido actualizado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El detalleTratamiento no pudo actualizarse. Intentelo de nuevo.'));
            }
        }
    } else {
        $this->Flash->error(__('No estás autorizado para actualizar este Detalle.'));
    }

    $this->set(compact('detalleTratamiento', 'updating', 'flagToUpdate'));
}

/**
 * Obtener el valor de la bandera de actualización.
 *
 * @param \App\Model\Entity\DetalleTratamiento $detalleTratamiento DetalleTratamiento entity.
 * @return bool Valor de la bandera de actualización.
 */
public function getFlagToUpdate($detalleTratamiento)
{
    if ($detalleTratamiento->EstReg === 'A' && $detalleTratamiento->CarFlaAct === '1') {
        return true;
    } else {
        return false;
    }
}


/**
 * Delete method
 *
 * @param string|null $id DetalleTratamiento id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $detalleTratamiento = $this->DetalleTratamiento->get($id);

    // Actualizar el estado del registro en lugar de eliminarlo
    $detalleTratamiento->EstReg = '*';
    $detalleTratamiento->CarFlaAct = "0";
    if ($this->DetalleTratamiento->save($detalleTratamiento)) {
        $this->Flash->success(__('El detalleTratamiento ha sido eliminado.'));
    } else {
        $this->Flash->error(__('El detalleTratamiento no pudo eliminarse. Intentelo de nuevo.'));
    }

    return $this->redirect(['action' => 'index']);
}

/**
 * Inactivate method
 *
 * @param string|null $id DetalleTratamiento id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function inactivate($id = null)
{
    $detalleTratamiento = $this->DetalleTratamiento->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('detalleTratamiento'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $detalleTratamiento->EstReg = 'I';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $detalleTratamiento->CarFlaAct = "1";

        if ($this->DetalleTratamiento->save($detalleTratamiento)) {
            $this->Flash->success(__('El detalleTratamiento ha sido Inactivado.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('El detalleTratamiento no pudo inactivarse. Intentelo de nuevo.'));
    }
        // $this->set('CarFlaAct', "1");
}

public function reactivate($id = null)
{
    $detalleTratamiento = $this->DetalleTratamiento->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('detalleTratamiento'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $detalleTratamiento->EstReg = 'A';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $detalleTratamiento->CarFlaAct = "1";

        if ($this->DetalleTratamiento->save($detalleTratamiento)) {
            $this->Flash->success(__('El detalleTratamiento ha sido reactivado.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('El detalleTratamiento no pudo reactivarse.Intentelo de nuevo.'));
    }
        // $this->set('CarFlaAct', "1");
}
}
