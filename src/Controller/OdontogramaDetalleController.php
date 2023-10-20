<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Table\OdontogramaTable;
/**
 * OdontogramaDetalle Controller
 *
 * @property \App\Model\Table\OdontogramaDetalleTable $OdontogramaDetalle
 * @method \App\Model\Entity\OdontogramaDetalle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OdontogramaDetalleController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */


    public function index()
{
    $odxDetCodIngresado = null;

    if ($this->request->is('post')) {
        $odxDetCodIngresado = $this->request->getData('OdxDetCod');

        // Verifica si el campo de búsqueda tiene valor
        if (!empty($odxDetCodIngresado)) {
            $query = $this->OdontogramaDetalle->find()
                ->order(['OdxDetCod' => 'ASC'])
                ->where(['OdxDetCod' => $odxDetCodIngresado]);
        } else {
            // Si no se ingresa ningún valor en el campo de búsqueda, obtiene todos los registros de OdontogramaDetalle
            $query = $this->OdontogramaDetalle;
        }
    } else {
        $query = $this->OdontogramaDetalle;
    }

    $odontogramaDetalle = $this->paginate($query);

    $this->set(compact('odontogramaDetalle', 'odxDetCodIngresado'));
}


    /**
     * View method
     *
     * @param string|null $id Odontograma Detalle id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $odontogramaDetalle = $this->OdontogramaDetalle->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('odontogramaDetalle'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function add()
{
    $opcionesDeOdxCod = $this->OdontogramaDetalle->Odontograma->find('list', [
        'keyField' => 'OdxCod',
        'valueField' => 'OdxCod',
    ])->toArray();

    $odontogramaDetalle = $this->OdontogramaDetalle->newEmptyEntity();

    if ($this->request->is('post')) {
        $data = $this->request->getData();

        // Asignar el valor manualmente a OdxDetCod
        $odontogramaDetalle->OdxDetCod = $data['OdxDetCod'];
        // Actualizar el estado de registro y el flag
        $odontogramaDetalle->CarFlaAct = "1";
        $odontogramaDetalle->EstReg = 'A';

        // Validación de código de detalle de odontograma único
        $odontogramaDetalleExists = $this->OdontogramaDetalle->exists(['OdxDetCod' => $odontogramaDetalle->OdxDetCod]);
        if ($odontogramaDetalleExists) {
            $this->Flash->error(__('El código de detalle del odontograma ya está en uso. Por favor, elige uno nuevo.'));
        } else {
            $odontogramaDetalle = $this->OdontogramaDetalle->patchEntity($odontogramaDetalle, $data);

            if ($this->OdontogramaDetalle->save($odontogramaDetalle)) {
                $this->Flash->success(__('El detalle del odontograma se ha guardado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El detalle del odontograma no pudo guardarse. Inténtalo de nuevo.'));
            }
        }
    }

    $this->set(compact('odontogramaDetalle', 'opcionesDeOdxCod'));
}


/**
 * Edit method
 *
 * @param string|null $id OdontogramaDetalle id.
 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function edit($id = null)
{
    $odontogramaDetalle = $this->OdontogramaDetalle->get($id, [
        'contain' => [],
    ]);

    // Verificar si se está realizando una actualización
    $updating = $this->request->is(['patch', 'post', 'put']);
    // Obtener el estado actual del flag o bandera de actualizar
    $flagToUpdate = $this->getFlagToUpdate($odontogramaDetalle);

    if ($flagToUpdate) {
        if ($updating) {
            $odontogramaDetalle = $this->OdontogramaDetalle->patchEntity($odontogramaDetalle, $this->request->getData());

            // Verificar si el registro se actualizó correctamente
            if ($this->OdontogramaDetalle->save($odontogramaDetalle)) {
                $this->Flash->success(__('El odontogramaDetalle ha sido actualizado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El odontogramaDetalle no pudo actualizarse. Intentelo de nuevo.'));
            }
        }
    } else {
        $this->Flash->error(__('No tiene permisos para editar el odontogramaDetalle.'));
    }

    $this->set(compact('odontogramaDetalle', 'updating', 'flagToUpdate'));
}
/**
 * Obtener el valor de la bandera de actualización.
 *
 * @param \App\Model\Entity\OdontogramaDetalle $odontogramaDetalle OdontogramaDetalle entity.
 * @return bool Valor de la bandera de actualización.
 */
public function getFlagToUpdate($odontogramaDetalle)
{
    if ($odontogramaDetalle->EstReg === 'A' && $odontogramaDetalle->CarFlaAct === '1') {
        return true;
    } else {
        return false;
    }
}


/**
 * Delete method
 *
 * @param string|null $id OdontogramaDetalle id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $odontogramaDetalle = $this->OdontogramaDetalle->get($id);

    // Actualizar el estado del registro en lugar de eliminarlo
    $odontogramaDetalle->EstReg = '*';
    $odontogramaDetalle->CarFlaAct = "0";
    if ($this->OdontogramaDetalle->save($odontogramaDetalle)) {
        $this->Flash->success(__('El odontogramaDetalle ha sido eliminado.'));
    } else {
        $this->Flash->error(__('El odontogramaDetalle no pudo elminarse. Intentelo nuevamente.'));
    }

    return $this->redirect(['action' => 'index']);
}

/**
 * Inactivate method
 *
 * @param string|null $id OdontogramaDetalle id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function inactivate($id = null)
{
    $odontogramaDetalle = $this->OdontogramaDetalle->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('odontogramaDetalle'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $odontogramaDetalle->EstReg = 'I';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $odontogramaDetalle->CarFlaAct = "1";

        if ($this->OdontogramaDetalle->save($odontogramaDetalle)) {
            $this->Flash->success(__('El odontogramaDetalle ha sido inactivado.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('El odontogramaDetalle no pudo inactivarse. Intenetelo nuevamente.'));
    }
        // $this->set('CarFlaAct', "1");
}

public function reactivate($id = null)
{
    $odontogramaDetalle = $this->OdontogramaDetalle->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('odontogramaDetalle'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $odontogramaDetalle->EstReg = 'A';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $odontogramaDetalle->CarFlaAct = "1";

        if ($this->OdontogramaDetalle->save($odontogramaDetalle)) {
            $this->Flash->success(__('El odontogramaDetalle ha sido reactivado.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('El odontogramaDetalle no pudo reactivarse. Intentelo nuevamente.'));
    }
        // $this->set('CarFlaAct', "1");
}
}
