<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * HistoriaMedica Controller
 *
 * @property \App\Model\Table\HistoriaMedicaTable $HistoriaMedica
 * @method \App\Model\Entity\HistoriaMedica[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HistoriaMedicaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
    {
        $hisMedCodIngresado = null;

        if ($this->request->is('post')) {
            $hisMedCodIngresado = $this->request->getData('HisMedCod');

            // Verifica si el campo de búsqueda tiene valor
            if (!empty($hisMedCodIngresado)) {
                $query = $this->HistoriaMedica->find()
                    ->order(['HisMedCod' => 'ASC'])
                    ->where(['HisMedCod' => $hisMedCodIngresado]);
            } else {
                // Si no se ingresa ningún valor en el campo de búsqueda, obtiene todas las historias médicas
                $query = $this->HistoriaMedica;
            }
        } else {
            $query = $this->HistoriaMedica;
        }

        $historiaMedica = $this->paginate($query);

        $this->set(compact('historiaMedica', 'hisMedCodIngresado'));
    }



    /**
     * View method
     *
     * @param string|null $id Historia Medica id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $historiaMedica = $this->HistoriaMedica->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('historiaMedica'));
    }

/**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $historiaMedica = $this->HistoriaMedica->newEmptyEntity();
        if ($this->request->is('post')) {
            $requestData = $this->request->getData();

            // Validar si el HisMedCod ya está en uso
            $hisMedCodExists = $this->HistoriaMedica->exists(['HisMedCod' => $requestData['HisMedCod']]);
            if ($hisMedCodExists) {
                $this->Flash->error(__('El código de Historia Médica ya está en uso. Por favor, elige uno nuevo.'));
            } else {
                $historiaMedica = $this->HistoriaMedica->patchEntity($historiaMedica, $requestData);

                // Asignar el valor manualmente a HisMedCod
                $historiaMedica->HisMedCod = $requestData['HisMedCod'];
                $historiaMedica->CarFlaAct = "1";
                $historiaMedica->EstReg = 'A';

                if ($this->HistoriaMedica->save($historiaMedica)) {
                    $this->Flash->success(__('La historia médica ha sido guardada.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('La historia médica no pudo ser guardada. Inténtalo de nuevo.'));
                }
            }
        }
        $this->set(compact('historiaMedica'));
    }

/**
 * Edit method
 *
 * @param string|null $id HistoriaMedica id.
 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function edit($id = null)
{
    $historiaMedica = $this->HistoriaMedica->get($id, [
        'contain' => [],
    ]);

    // Verificar si se está realizando una actualización
    $updating = $this->request->is(['patch', 'post', 'put']);
    // Obtener el estado actual del flag o bandera de actualizar
    $flagToUpdate = $this->getFlagToUpdate($historiaMedica);

    if ($flagToUpdate) {
        if ($updating) {
            $historiaMedica = $this->HistoriaMedica->patchEntity($historiaMedica, $this->request->getData());

            // Verificar si el registro se actualizó correctamente
            if ($this->HistoriaMedica->save($historiaMedica)) {
                $this->Flash->success(__('La historiaMedica ha sido actualizado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La historiaMedica no pudo actualizarse. Intentelo denuevo.'));
            }
        }
    } else {
        $this->Flash->error(__('No tienes autorizacion para realizar una actualizacion.'));
    }

    $this->set(compact('historiaMedica', 'updating', 'flagToUpdate'));
}
/**
 * Obtener el valor de la bandera de actualización.
 *
 * @param \App\Model\Entity\HistoriaMedica $historiaMedica HistoriaMedica entity.
 * @return bool Valor de la bandera de actualización.
 */
public function getFlagToUpdate($historiaMedica)
{
    if ($historiaMedica->EstReg === 'A' && $historiaMedica->CarFlaAct === '1') {
        return true;
    } else {
        return false;
    }
}


/**
 * Delete method
 *
 * @param string|null $id HistoriaMedica id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $historiaMedica = $this->HistoriaMedica->get($id);

    // Actualizar el estado del registro en lugar de eliminarlo
    $historiaMedica->EstReg = '*';
    $historiaMedica->CarFlaAct = "0";
    if ($this->HistoriaMedica->save($historiaMedica)) {
        $this->Flash->success(__('La historiaMedica ha sido eliminada.'));
    } else {
        $this->Flash->error(__('La historiaMedica no ha podido eliminarse. Intentelo denuevo.'));
    }

    return $this->redirect(['action' => 'index']);
}

/**
 * Inactivate method
 *
 * @param string|null $id HistoriaMedica id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function inactivate($id = null)
{
    $historiaMedica = $this->HistoriaMedica->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('historiaMedica'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $historiaMedica->EstReg = 'I';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $historiaMedica->CarFlaAct = "1";

        if ($this->HistoriaMedica->save($historiaMedica)) {
            $this->Flash->success(__('La historiaMedica ha sido inactivada.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('La historiaMedica no pudo inactivarse. Intentalo denuevo.'));
    }
        // $this->set('CarFlaAct', "1");
}

public function reactivate($id = null)
{
    $historiaMedica = $this->HistoriaMedica->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('historiaMedica'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $historiaMedica->EstReg = 'A';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $historiaMedica->CarFlaAct = "1";

        if ($this->HistoriaMedica->save($historiaMedica)) {
            $this->Flash->success(__('La historiaMedica ha sido reactivado.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('La historiaMedica no pudo reactivarse. Intentalo denuevo.'));
    }
        // $this->set('CarFlaAct', "1");
}
}
