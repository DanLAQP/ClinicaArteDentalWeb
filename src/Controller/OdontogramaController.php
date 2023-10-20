<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\AppController;
use App\Model\Table\OdontogramaTable;
use App\Model\Table\HistoriaClinicaTable;
/**
 * Odontograma Controller
 *
 * @property \App\Model\Table\OdontogramaTable $Odontograma
 * @method \App\Model\Entity\Odontograma[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class OdontogramaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
{
    $odxCodIngresado = null;

    if ($this->request->is('post')) {
        $odxCodIngresado = $this->request->getData('OdxCod');

        // Verifica si el campo de búsqueda tiene valor
        if (!empty($odxCodIngresado)) {
            $query = $this->Odontograma->find()
                ->order(['OdxCod' => 'ASC'])
                ->where(['OdxCod' => $odxCodIngresado]);
        } else {
            // Si no se ingresa ningún valor en el campo de búsqueda, obtiene todos los registros de odontograma
            $query = $this->Odontograma;
        }
    } else {
        $query = $this->Odontograma;
    }

    $odontograma = $this->paginate($query);

    $this->set(compact('odontograma', 'odxCodIngresado'));
}


    /**
     * View method
     *
     * @param string|null $id Odontograma id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $odontograma = $this->Odontograma->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('odontograma'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $opcionesDeHisCliCod = $this->Odontograma->HistoriaClinica->find('list', [
            'keyField' => 'HisCliCod',
            'valueField' => 'HisCliCod',
        ])->toArray();

        $odontograma = $this->Odontograma->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Asignar el valor manualmente a OdxCod
            $odontograma->OdxCod = $data['OdxCod'];
            // Actualizar el estado de registro y el flag
            $odontograma->CarFlaAct = "1";
            $odontograma->EstReg = 'A';

            // Validación de código de odontograma único
            $odontogramaExists = $this->Odontograma->exists(['OdxCod' => $odontograma->OdxCod]);
            if ($odontogramaExists) {
                $this->Flash->error(__('El código del odontograma ya está en uso. Por favor, elige uno nuevo.'));
            } else {
                // Verificar si la historia clínica ya tiene un odontograma asociado
                $historyHasOdontogram = $this->Odontograma->exists(['HisCliCod' => $data['HisCliCod']]);
                if ($historyHasOdontogram) {
                    $this->Flash->error(__('Esta historia clínica ya tiene un odontograma asociado.'));
                } else {
                    $odontograma = $this->Odontograma->patchEntity($odontograma, $data);

                    if ($this->Odontograma->save($odontograma)) {
                        $this->Flash->success(__('El odontograma se ha guardado.'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('El odontograma no pudo guardarse. Inténtalo de nuevo.'));
                    }
                }
            }
        }

        $this->set(compact('odontograma', 'opcionesDeHisCliCod'));
    }


/**
 * Edit method
 *
 * @param string|null $id Odontograma id.
 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function edit($id = null)
{
    $odontograma = $this->Odontograma->get($id, [
        'contain' => [],
    ]);

    // Verificar si se está realizando una actualización
    $updating = $this->request->is(['patch', 'post', 'put']);
    // Obtener el estado actual del flag o bandera de actualizar
    $flagToUpdate = $this->getFlagToUpdate($odontograma);

    if ($flagToUpdate) {
        if ($updating) {
            $odontograma = $this->Odontograma->patchEntity($odontograma, $this->request->getData());

            // Verificar si el registro se actualizó correctamente
            if ($this->Odontograma->save($odontograma)) {
                $this->Flash->success(__('El odontograma ha sido actualizado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El odontograma could not be updated. Inténtalo de nuevo.'));
            }
        }
    } else {
        $this->Flash->error(__('You are not allowed to update this record.'));
    }

    $this->set(compact('odontograma', 'updating', 'flagToUpdate'));
}
/**
 * Obtener el valor de la bandera de actualización.
 *
 * @param \App\Model\Entity\Odontograma $odontograma Odontograma entity.
 * @return bool Valor de la bandera de actualización.
 */
public function getFlagToUpdate($odontograma)
{
    if ($odontograma->EstReg === 'A' && $odontograma->CarFlaAct === '1') {
        return true;
    } else {
        return false;
    }
}


public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $odontograma = $this->Odontograma->get($id);

    // Actualizar el estado del registro en Odontograma
    $odontograma->EstReg = 'I';
    $odontograma->CarFlaAct = "*";

    // Actualizar el estado del registro en OdontogramaDetalle asociados
    $odontogramaDetalles = $this->Odontograma->OdontogramaDetalle->find('all', [
        'conditions' => ['OdxCod' => $id]
    ]);
    foreach ($odontogramaDetalles as $odontogramaDetalle) {
        $odontogramaDetalle->EstReg = 'I';
        $odontogramaDetalle->CarFlaAct = "*";
        $this->Odontograma->OdontogramaDetalle->save($odontogramaDetalle);
    }

    if ($this->Odontograma->save($odontograma)) {
        $this->Flash->success(__('El odontograma y odontogramaDetalles asociados han sido Eliminados.'));
    } else {
        $this->Flash->error(__('El odontograma no pudo eliminarse. Inténtalo de nuevo.'));
    }

    return $this->redirect(['action' => 'index']);
}





/**
 * Inactivate method
 *
 * @param string|null $id Odontograma id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function inactivate($id = null)
{
    $odontograma = $this->Odontograma->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('odontograma'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $odontograma->EstReg = 'I';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $odontograma->CarFlaAct = "1";

        if ($this->Odontograma->save($odontograma)) {
            $this->Flash->success(__('El odontograma ha sido inactivadi.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('El odontograma no pudo inactivarse. Inténtalo de nuevo.'));
    }
        // $this->set('CarFlaAct', "1");
}

public function reactivate($id = null)
{
    $odontograma = $this->Odontograma->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('odontograma'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $odontograma->EstReg = 'A';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $odontograma->CarFlaAct = "1";

        if ($this->Odontograma->save($odontograma)) {
            $this->Flash->success(__('El odontograma ha sido reactivado.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('El odontograma no pudo reactivarse. Inténtalo de nuevo.'));
    }
        // $this->set('CarFlaAct', "1");
}

public function viewOdontograma($id)
{
    $odontograma = $this->Odontograma->find() // Cambia "Odontogramas" a "Odontograma" (singular)
        ->contain('OdontogramaDetalle') // Cambia "OdontogramaDetalles" a "OdontogramaDetalle"
        ->where(['Odontograma.OdxCod' => $id]) // Cambia "Odontogramas" a "Odontograma" (singular)
        ->first();

    $this->set(compact('odontograma'));
}



}
