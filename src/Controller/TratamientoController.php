<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Table\TratamientoTable;
use App\Model\Table\HistoriaClinicaTable;
/**
 * Tratamiento Controller
 *
 * @property \App\Model\Table\TratamientoTable $Tratamiento
 * @method \App\Model\Entity\Tratamiento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TratamientoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
{
    $traCodIngresado = null;

    if ($this->request->is('post')) {
        $traCodIngresado = $this->request->getData('TraCod');

        // Verifica si el campo de búsqueda tiene valor
        if (!empty($traCodIngresado)) {
            $query = $this->Tratamiento->find()
                ->order(['TraCod' => 'ASC'])
                ->where(['TraCod' => $traCodIngresado]);
        } else {
            // Si no se ingresa ningún valor en el campo de búsqueda, obtiene todos los registros de Tratamiento
            $query = $this->Tratamiento;
        }
    } else {
        $query = $this->Tratamiento;
    }

    $tratamiento = $this->paginate($query);

    $this->set(compact('tratamiento', 'traCodIngresado'));
}


    /**
     * View method
     *
     * @param string|null $id Tratamiento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tratamiento = $this->Tratamiento->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tratamiento'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function add()
{
    $opcionesDeHisCliCod = $this->Tratamiento->HistoriaClinica->find('list', [
        'keyField' => 'HisCliCod',
        'valueField' => 'HisCliCod',
    ])->toArray();

    $tratamiento = $this->Tratamiento->newEmptyEntity();
    if ($this->request->is('post')) {
        $requestData = $this->request->getData();

        // Validación de TraCod único
        $traCodExists = $this->Tratamiento->exists(['TraCod' => $requestData['TraCod']]);
        if ($traCodExists) {
            $this->Flash->error(__('El código de Tratamiento ya está en uso. Por favor, elige uno nuevo.'));
        } else {
            // Verificar si la historia clínica ya tiene un tratamiento asociado
            $hisCliCod = $requestData['HisCliCod'];
            $tratamientoExists = $this->Tratamiento->exists(['HisCliCod' => $hisCliCod]);
            if ($tratamientoExists) {
                $this->Flash->error(__('La Historia Clínica ya tiene un Tratamiento asociado.'));
            } else {
                $tratamiento = $this->Tratamiento->patchEntity($tratamiento, $requestData);

                // Asignar el valor manualmente a TraCod
                $tratamiento->TraCod = $requestData['TraCod'];
                $tratamiento->CarFlaAct = "1";
                $tratamiento->EstReg = 'A';

                if ($this->Tratamiento->save($tratamiento)) {
                    $this->Flash->success(__('El tratamiento ha sido guardado.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('El tratamiento no pudo ser guardado. Inténtalo de nuevo.'));
                }
            }
        }
    }
    $this->set(compact('tratamiento', 'opcionesDeHisCliCod'));
}




/**
 * Edit method
 *
 * @param string|null $id Tratamiento id.
 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */

public function edit($id = null)
{
    $tratamiento = $this->Tratamiento->get($id, [
        'contain' => [],
    ]);

    // Verificar si se está realizando una actualización
    $updating = $this->request->is(['patch', 'post', 'put']);
    // Obtener el estado actual del flag o bandera de actualizar
    $flagToUpdate = $this->getFlagToUpdate($tratamiento);

    if ($flagToUpdate) {
        if ($updating) {
            $requestData = $this->request->getData();

            $tratamiento = $this->Tratamiento->patchEntity($tratamiento, $requestData);

            // Verificar si el registro se actualizó correctamente
            if ($this->Tratamiento->save($tratamiento)) {
                $this->Flash->success(__('El tratamiento ha sido actualizado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El tratamiento no pudo actualizarse. Inténtalo de nuevo.'));
            }
        }
    } else {
        $this->Flash->error(__('No estás autorizado para realizar una actualización.'));
    }

    $this->set(compact('tratamiento', 'updating', 'flagToUpdate'));
}



/**
 * Obtener el valor de la bandera de actualización.
 *
 * @param \App\Model\Entity\Tratamiento $tratamiento Tratamiento entity.
 * @return bool Valor de la bandera de actualización.
 */
public function getFlagToUpdate($tratamiento)
{
    if ($tratamiento->EstReg === 'A' && $tratamiento->CarFlaAct === '1') {
        return true;
    } else {
        return false;
    }
}

/**
* Delete method
*
* @param string|null $id Tratamiento id.
* @return \Cake\Http\Response|null|void Redirects to index.
* @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
*/


/// Para hacer la eliminacion logica en cadena de los elementos
public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $tratamiento = $this->Tratamiento->get($id);

    // Actualizar el estado del registro en Tratamiento
    $tratamiento->EstReg = 'I';
    $tratamiento->CarFlaAct = "*";

    // Actualizar el estado del registro en DetalleTratamiento asociados
    $detalleTratamientos = $this->Tratamiento->DetalleTratamiento->find('all', [
        'conditions' => ['TraCod' => $id]
    ]);
    foreach ($detalleTratamientos as $detalleTratamiento) {
        $detalleTratamiento->EstReg = 'I';
        $detalleTratamiento->CarFlaAct = "*";
        $this->Tratamiento->DetalleTratamiento->save($detalleTratamiento);
    }

    if ($this->Tratamiento->save($tratamiento)) {
        $this->Flash->success(__('El tratamiento y los detalleTratamientos asociados han sido eliminados.'));
    } else {
        $this->Flash->error(__('El tratamiento no pudo elimnarse. Inténtalo de nuevo.'));
    }

    return $this->redirect(['action' => 'index']);
}


/**
 * Inactivate method
 *
 * @param string|null $id Tratamiento id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function inactivate($id = null)
{
    $tratamiento = $this->Tratamiento->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('tratamiento'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $tratamiento->EstReg = 'I';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $tratamiento->CarFlaAct = "1";

        if ($this->Tratamiento->save($tratamiento)) {
            $this->Flash->success(__('El tratamiento ha sido inactivado.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('El tratamiento no pudo inactivarse. Inténtalo de nuevo..'));
    }
        // $this->set('CarFlaAct', "1");
}

public function reactivate($id = null)
{
    $tratamiento = $this->Tratamiento->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('tratamiento'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $tratamiento->EstReg = 'A';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $tratamiento->CarFlaAct = "1";

        if ($this->Tratamiento->save($tratamiento)) {
            $this->Flash->success(__('El tratamiento ha sido reactivado.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('El tratamiento no pudo reactivarse.Inténtalo de nuevo.'));
    }
        // $this->set('CarFlaAct', "1");
}

// para una vista con asociados
public function viewTratamiento($id = null)
{
    $tratamiento = $this->Tratamiento->find()
        ->contain('DetalleTratamiento')
        ->where(['Tratamiento.TraCod' => $id])
        ->first();

    $this->set(compact('tratamiento'));
}



}
