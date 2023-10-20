<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Odontologo Controller
 *
 * @property \App\Model\Table\OdontologoTable $Odontologo
 * @method \App\Model\Entity\Odontologo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OdontologoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */


    public function index()
{
    $odoCodIngresado = null;

    if ($this->request->is('post')) {
        $odoCodIngresado = $this->request->getData('OdoCod');

        // Verifica si el campo de búsqueda tiene valor
        if (!empty($odoCodIngresado)) {
            $query = $this->Odontologo->find()
                ->order(['OdoCod' => 'ASC'])
                ->where(['OdoCod' => $odoCodIngresado]);
        } else {
            // Si no se ingresa ningún valor en el campo de búsqueda, obtiene todos los registros de Odontologo
            $query = $this->Odontologo;
        }
    } else {
        $query = $this->Odontologo;
    }

    $odontologo = $this->paginate($query);

    $this->set(compact('odontologo', 'odoCodIngresado'));
}


    /**
     * View method
     *
     * @param string|null $id Odontologo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $odontologo = $this->Odontologo->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('odontologo'));
    }

   /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $odontologo = $this->Odontologo->newEmptyEntity();
        if ($this->request->is('post')) {
            $odontologo = $this->Odontologo->patchEntity($odontologo, $this->request->getData());
            // Asignar el valor manualmente a OdoCod
            $odontologo->OdoCod = $this->request->getData('OdoCod');
            //Actualizar el estado de registro y el flag
            $odontologo->CarFlaAct = "1";
            $odontologo->EstReg = 'A';

            if ($this->Odontologo->save($odontologo)) {
                // Actualizar el estado del registro en lugar de eliminarlo

                $this->Flash->success(__('El odontologo ha sido guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El odontologo no pudo guardarse. Inténtalo de nuevo.'));
        }
        $this->set(compact('odontologo'));
    }

/**
 * Edit method
 *
 * @param string|null $id Odontologo id.
 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function edit($id = null)
{
    $odontologo = $this->Odontologo->get($id, [
        'contain' => [],
    ]);

    // Verificar si se está realizando una actualización
    $updating = $this->request->is(['patch', 'post', 'put']);
    // Obtener el estado actual del flag o bandera de actualizar
    $flagToUpdate = $this->getFlagToUpdate($odontologo);

    if ($flagToUpdate) {
        if ($updating) {
            $odontologo = $this->Odontologo->patchEntity($odontologo, $this->request->getData());

            // Verificar si el registro se actualizó correctamente
            if ($this->Odontologo->save($odontologo)) {
                $this->Flash->success(__('El odontologo ha sido actualizado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El odontologo no pudo actualizarse. Inténtalo de nuevo.'));
            }
        }
    } else {
        $this->Flash->error(__('No estas autorizado para realizar actualizaciones.'));
    }

    $this->set(compact('odontologo', 'updating', 'flagToUpdate'));
}
/**
 * Obtener el valor de la bandera de actualización.
 *
 * @param \App\Model\Entity\Odontologo $odontologo Odontologo entity.
 * @return bool Valor de la bandera de actualización.
 */
public function getFlagToUpdate($odontologo)
{
    if ($odontologo->EstReg === 'A' && $odontologo->CarFlaAct === '1') {
        return true;
    } else {
        return false;
    }
}


/**
 * Delete method
 *
 * @param string|null $id Odontologo id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $odontologo = $this->Odontologo->get($id);

    // Actualizar el estado del registro en lugar de eliminarlo
    $odontologo->EstReg = '*';
    $odontologo->CarFlaAct = "0";
    if ($this->Odontologo->save($odontologo)) {
        $this->Flash->success(__('El odontologo ha sido Eliminado.'));
    } else {
        $this->Flash->error(__('El odontologo no pudo eliminarse. Inténtalo de nuevo.'));
    }

    return $this->redirect(['action' => 'index']);
}

/**
 * Inactivate method
 *
 * @param string|null $id Odontologo id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function inactivate($id = null)
{
    $odontologo = $this->Odontologo->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('odontologo'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $odontologo->EstReg = 'I';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $odontologo->CarFlaAct = "1";

        if ($this->Odontologo->save($odontologo)) {
            $this->Flash->success(__('El odontologo ha sido inactivado.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('El odontologo no pudo inactivarse. Inténtalo de nuevo.'));
    }
        // $this->set('CarFlaAct', "1");
}

public function reactivate($id = null)
{
    $odontologo = $this->Odontologo->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('odontologo'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $odontologo->EstReg = 'A';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $odontologo->CarFlaAct = "1";

        if ($this->Odontologo->save($odontologo)) {
            $this->Flash->success(__('El odontologo ha sido reactivado.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('El odontologo no pudo reactivarse. Inténtalo de nuevo.'));
    }
        // $this->set('CarFlaAct', "1");
}
}
