<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * HistoriaClinica Controller
 *
 * @property \App\Model\Table\HistoriaClinicaTable $HistoriaClinica
 * @method \App\Model\Entity\HistoriaClinica[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
use App\Model\Table\PacienteTable;
use App\Model\Table\OdontologoTable;
use App\Model\Table\HistoriaMedicaTable;
use App\Model\Table\TratamientoTable;
use App\Model\Table\DetalleTratamientoTable;
class HistoriaClinicaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */


// public function index()
// {
//     $hisCliCodIngresado = null;

//     if ($this->request->is('post')) {
//         $hisCliCodIngresado = $this->request->getData('hisCliCod');

//         // Verifica si el campo de búsqueda tiene valor
//         if (!empty($hisCliCodIngresado)) {
//             $query = $this->HistoriaClinica->find()
//                 ->order(['HisCliCod' => 'ASC'])
//                 ->contain(['Paciente']) // Incluye los datos del paciente asociado a la historia clínica
//                 ->where(['HisCliCod' => $hisCliCodIngresado]);
//         } else {
//             // Si no se ingresa ningún valor en el campo de búsqueda, obtiene todas las historias clínicas con datos de pacientes asociados
//             $query = $this->HistoriaClinica->find()->contain(['Paciente']);
//         }
//     } else {
//         $query = $this->HistoriaClinica->find()->contain(['Paciente']); // Obtén todas las historias clínicas con datos de pacientes asociados
//     }

//     $historiaClinica = $this->paginate($query);

//     $this->set(compact('historiaClinica', 'hisCliCodIngresado'));
// }
public function index()
{
    $hisCliCodIngresado = null;
    $pacNomIngresado = null;

    if ($this->request->is('post')) {
        $hisCliCodIngresado = $this->request->getData('hisCliCod');
        $pacNomIngresado = $this->request->getData('pacNom');

        $query = $this->HistoriaClinica->find()
            ->order(['HisCliCod' => 'ASC'])
            ->contain(['Paciente']) // Incluye los datos del paciente asociado a la historia clínica
            ->where(function ($exp, $q) use ($hisCliCodIngresado, $pacNomIngresado) {
                $conditions = [];
                if (!empty($hisCliCodIngresado)) {
                    $conditions['HisCliCod'] = $hisCliCodIngresado;
                }
                if (!empty($pacNomIngresado)) {
                    $conditions['Paciente.PacNom LIKE'] = '%' . $pacNomIngresado . '%';
                }
                return $exp->and_($conditions);
            });
    } else {
        $query = $this->HistoriaClinica->find()->contain(['Paciente']); // Obtén todas las historias clínicas con datos de pacientes asociados
    }

    $historiaClinica = $this->paginate($query);

    $this->set(compact('historiaClinica', 'hisCliCodIngresado', 'pacNomIngresado'));
}


    /**
     * View method
     *
     * @param string|null $id Historia Clinica id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $historiaClinica = $this->HistoriaClinica->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('historiaClinica'));
    }



    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {

public function add()
{
    $opcionesDePacCod = $this->HistoriaClinica->Paciente->find('list', [
        'keyField' => 'PacCod',
        'valueField' => 'PacNom',
    ])->toArray();

    $opcionesDeOdoCod = $this->HistoriaClinica->Odontologo->find('list', [
        'keyField' => 'OdoCod',
        'valueField' => 'OdoNom',
    ])->toArray();

    $opcionesDeHisMedCod = $this->HistoriaClinica->HistoriaMedica->find('list', [
        'keyField' => 'HisMedCod',
        'valueField' => 'HisMedCod',
    ])->toArray();

    $historiaClinica = $this->HistoriaClinica->newEmptyEntity();

    if ($this->request->is('post')) {
        $data = $this->request->getData();

        // Asignar el valor manualmente a HisCliCod
        $historiaClinica->HisCliCod = $data['HisCliCod'];
        // Actualizar el estado de registro y el flag
        $historiaClinica->CarFlaAct = "1";
        $historiaClinica->EstReg = 'A';

        // Validación de código de historia clínica único
        $historiaClinicaExists = $this->HistoriaClinica->exists(['HisCliCod' => $historiaClinica->HisCliCod]);
        if ($historiaClinicaExists) {
            $this->Flash->error(__('El código de la historia clínica ya está en uso. Por favor, elige uno nuevo.'));
        } else {
            // Verificar si el paciente ya tiene una historia clínica asociada
            $pacienteAlreadyHasHistory = $this->HistoriaClinica->exists(['PacCod' => $data['PacCod']]);
            if ($pacienteAlreadyHasHistory) {
                $this->Flash->error(__('Este paciente ya tiene una historia clínica asociada.'));
            } else {
                // Verificar si la historia médica ya está asociada
                $historiaMedicaAlreadyLinked = $this->HistoriaClinica->exists(['HisMedCod' => $data['HisMedCod']]);
                if ($historiaMedicaAlreadyLinked) {
                    $this->Flash->error(__('Esta historia médica ya está asociada a una historia clínica.'));
                } else {
                    $historiaClinica = $this->HistoriaClinica->patchEntity($historiaClinica, $data);

                    if ($this->HistoriaClinica->save($historiaClinica)) {
                        $this->Flash->success(__('La historia clínica se ha guardado.'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('La historia clínica no pudo guardarse. Inténtalo de nuevo.'));
                    }
                }
            }
        }
    }

    $this->set(compact('historiaClinica', 'opcionesDePacCod', 'opcionesDeHisMedCod', 'opcionesDeOdoCod'));
}


/**
 * Edit method
 *
 * @param string|null $id HistoriaClinica id.
 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function edit($id = null)
{
    $historiaClinica = $this->HistoriaClinica->get($id, [
        'contain' => [],
    ]);

    // Verificar si se está realizando una actualización
    $updating = $this->request->is(['patch', 'post', 'put']);
    // Obtener el estado actual del flag o bandera de actualizar
    $flagToUpdate = $this->getFlagToUpdate($historiaClinica);

    if ($flagToUpdate) {
        if ($updating) {
            $historiaClinica = $this->HistoriaClinica->patchEntity($historiaClinica, $this->request->getData());

            // Verificar si el registro se actualizó correctamente
            if ($this->HistoriaClinica->save($historiaClinica)) {
                $this->Flash->success(__('La historiaClinica ha sido actualizada.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La historiaClinica no pudo actualizarse.Inténtalo de nuevo.'));
            }
        }
    } else {
        $this->Flash->error(__('No tienes permisos para actualizar este registro.'));
    }

    $this->set(compact('historiaClinica', 'updating', 'flagToUpdate'));
}
/**
 * Obtener el valor de la bandera de actualización.
 *
 * @param \App\Model\Entity\HistoriaClinica $historiaClinica HistoriaClinica entity.
 * @return bool Valor de la bandera de actualización.
 */
public function getFlagToUpdate($historiaClinica)
{
    if ($historiaClinica->EstReg === 'A' && $historiaClinica->CarFlaAct === '1') {
        return true;
    } else {
        return false;
    }
}


/**
 * Delete method
 *
 * @param string|null $id HistoriaClinica id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $historiaClinica = $this->HistoriaClinica->get($id);

    // Actualizar el estado del registro en lugar de eliminarlo
    $historiaClinica->EstReg = '*';
    $historiaClinica->CarFlaAct = "0";
    if ($this->HistoriaClinica->save($historiaClinica)) {
        $this->Flash->success(__('La historia Clinica ha sido eliminado.'));
    } else {
        $this->Flash->error(__('La historia Clinica no pudo eliminarse. Inténtalo de nuevo.'));
    }

    return $this->redirect(['action' => 'index']);
}

/**
 * Inactivate method
 *
 * @param string|null $id HistoriaClinica id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function inactivate($id = null)
{
    $historiaClinica = $this->HistoriaClinica->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('historiaClinica'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $historiaClinica->EstReg = 'I';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $historiaClinica->CarFlaAct = "1";

        if ($this->HistoriaClinica->save($historiaClinica)) {
            $this->Flash->success(__('La historiaClinica se inactivo.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('La historia Clinica no se pudo inactivar. Intentelo de nuevo'));
    }
        // $this->set('CarFlaAct', "1");
}

public function reactivate($id = null)
{
    $historiaClinica = $this->HistoriaClinica->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('historiaClinica'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $historiaClinica->EstReg = 'A';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $historiaClinica->CarFlaAct = "1";

        if ($this->HistoriaClinica->save($historiaClinica)) {
            $this->Flash->success(__('La historiaClinica se reactivo.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('La historiaClinica no se pudo reactivar. Intentelo de nuevo. '));
    }
        // $this->set('CarFlaAct', "1");
}

public function viewHistoria($id = null)
{
    // Obtener la historia clínica con las relaciones necesarias
    $historia = $this->HistoriaClinica->find()
        ->where(['HistoriaClinica.HisCliCod' => $id])
        ->contain([
            'Odontologo',
            'Paciente',
            'HistoriaMedica',
            'Tratamiento' => ['DetalleTratamiento'],
            'Odontograma' => ['OdontogramaDetalle'],
            'HistorialTrabajo'
        ])
        ->first();

    // Pasar la historia clínica a la vista
    $this->set(compact('historia'));
}



}
