<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Table\HistoriaClinicaTable;
/**
 * HistorialTrabajo Controller
 *
 * @property \App\Model\Table\HistorialTrabajoTable $HistorialTrabajo
 * @method \App\Model\Entity\HistorialTrabajo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HistorialTrabajoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
{
    $hisTraCodIngresado = null;

    if ($this->request->is('post')) {
        $hisTraCodIngresado = $this->request->getData('HisTraCod');

        // Verifica si el campo de búsqueda tiene valor
        if (!empty($hisTraCodIngresado)) {
            $query = $this->HistorialTrabajo->find()
                ->order(['HisTraCod' => 'ASC'])
                ->where(['HisTraCod' => $hisTraCodIngresado]);
        } else {
            // Si no se ingresa ningún valor en el campo de búsqueda, obtiene todos los registros de historial de trabajo
            $query = $this->HistorialTrabajo;
        }
    } else {
        $query = $this->HistorialTrabajo;
    }

    $historialTrabajo = $this->paginate($query);

    $this->set(compact('historialTrabajo', 'hisTraCodIngresado'));
}


    /**
     * View method
     *
     * @param string|null $id Historial Trabajo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $historialTrabajo = $this->HistorialTrabajo->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('historialTrabajo'));
    }

/**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $opcionesDeHisCliCod = $this->HistorialTrabajo->HistoriaClinica->find('list', [
            'keyField' => 'HisCliCod',
            'valueField' => 'HisCliCod',
        ])->toArray();

        $historialTrabajo = $this->HistorialTrabajo->newEmptyEntity();
        if ($this->request->is('post')) {
            $requestData = $this->request->getData();

            // Validar si el HisTraCod ya está en uso
            $hisTraCodExists = $this->HistorialTrabajo->exists(['HisTraCod' => $requestData['HisTraCod']]);
            if ($hisTraCodExists) {
                $this->Flash->error(__('El código de Historial de Trabajo ya está en uso. Por favor, elige uno nuevo.'));
            } else {
                $historialTrabajo = $this->HistorialTrabajo->patchEntity($historialTrabajo, $requestData);

                // Asignar el valor manualmente a HisTraCod
                $historialTrabajo->HisTraCod = $requestData['HisTraCod'];
                $historialTrabajo->CarFlaAct = "1";
                $historialTrabajo->EstReg = 'A';

                if ($this->HistorialTrabajo->save($historialTrabajo)) {
                    $this->Flash->success(__('El historial de trabajo ha sido guardado.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('El historial de trabajo no pudo ser guardado. Inténtalo de nuevo.'));
                }
            }
        }
        $this->set(compact('historialTrabajo', 'opcionesDeHisCliCod'));
    }


/**
 * Edit method
 *
 * @param string|null $id HistorialTrabajo id.
 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function edit($id = null)
{
    $historialTrabajo = $this->HistorialTrabajo->get($id, [
        'contain' => [],
    ]);

    // Verificar si se está realizando una actualización
    $updating = $this->request->is(['patch', 'post', 'put']);
    // Obtener el estado actual del flag o bandera de actualizar
    $flagToUpdate = $this->getFlagToUpdate($historialTrabajo);

    if ($flagToUpdate) {
        if ($updating) {
            $historialTrabajo = $this->HistorialTrabajo->patchEntity($historialTrabajo, $this->request->getData());

            // Verificar si el registro se actualizó correctamente
            if ($this->HistorialTrabajo->save($historialTrabajo)) {
                $this->Flash->success(__('The historialTrabajo has been updated.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The historialTrabajo could not be updated. Please, try again.'));
            }
        }
    } else {
        $this->Flash->error(__('You are not allowed to update this record.'));
    }

    $this->set(compact('historialTrabajo', 'updating', 'flagToUpdate'));
}
/**
 * Obtener el valor de la bandera de actualización.
 *
 * @param \App\Model\Entity\HistorialTrabajo $historialTrabajo HistorialTrabajo entity.
 * @return bool Valor de la bandera de actualización.
 */
public function getFlagToUpdate($historialTrabajo)
{
    if ($historialTrabajo->EstReg === 'A' && $historialTrabajo->CarFlaAct === '1') {
        return true;
    } else {
        return false;
    }
}


/**
 * Delete method
 *
 * @param string|null $id HistorialTrabajo id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $historialTrabajo = $this->HistorialTrabajo->get($id);

    // Actualizar el estado del registro en lugar de eliminarlo
    $historialTrabajo->EstReg = '*';
    $historialTrabajo->CarFlaAct = "0";
    if ($this->HistorialTrabajo->save($historialTrabajo)) {
        $this->Flash->success(__('The historialTrabajo has been deleted.'));
    } else {
        $this->Flash->error(__('The historialTrabajo could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
}

/**
 * Inactivate method
 *
 * @param string|null $id HistorialTrabajo id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function inactivate($id = null)
{
    $historialTrabajo = $this->HistorialTrabajo->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('historialTrabajo'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $historialTrabajo->EstReg = 'I';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $historialTrabajo->CarFlaAct = "1";

        if ($this->HistorialTrabajo->save($historialTrabajo)) {
            $this->Flash->success(__('The historialTrabajo has been inactivated.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The historialTrabajo could not be inactivated. Please, try again.'));
    }
        // $this->set('CarFlaAct', "1");
}

public function reactivate($id = null)
{
    $historialTrabajo = $this->HistorialTrabajo->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('historialTrabajo'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $historialTrabajo->EstReg = 'A';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $historialTrabajo->CarFlaAct = "1";

        if ($this->HistorialTrabajo->save($historialTrabajo)) {
            $this->Flash->success(__('The historialTrabajo has been REactivated.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The historialTrabajo could not be reactivated. Please, try again.'));
    }
        // $this->set('CarFlaAct', "1");
}
}
