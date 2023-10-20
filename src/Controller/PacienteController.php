<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Paciente Controller
 *
 * @property \App\Model\Table\PacienteTable $Paciente
 * @method \App\Model\Entity\Paciente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
use App\Model\Table\HistoriaClinicaTable;
// esto por el momento lo dejare
use Cake\ORM\TableRegistry;
use App\Model\Table\PacienteTable;
class PacienteController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
    {
        $dniIngresado = null;
        $nombreIngresado = null;

        if ($this->request->is('post')) {
            $dniIngresado = $this->request->getData('dni');
            $nombreIngresado = $this->request->getData('nombre');

            // Verifica si al menos uno de los campos de búsqueda tiene valor
            if (!empty($dniIngresado) || !empty($nombreIngresado)) {
                $query = $this->Paciente->find()
                    ->order(['PacDni' => 'ASC']); // Esto garantiza que el paciente con el DNI ingresado esté en la primera posición

                if (!empty($dniIngresado)) {
                    $query->where(['PacDni' => $dniIngresado]);
                }

                if (!empty($nombreIngresado)) {
                    $query->where(['PacNom LIKE' => "%$nombreIngresado%"]);
                }
            } else {
                // Si no se ingresa ningún valor en los campos de búsqueda, obtiene todos los pacientes
                $query = $this->Paciente;
            }
        } else {
            $query = $this->Paciente;
        }

        $paciente = $this->paginate($query);

        $this->set(compact('paciente', 'dniIngresado', 'nombreIngresado'));
    }




    /**
     * View method
     *
     * @param string|null $id Paciente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paciente = $this->Paciente->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('paciente'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

public function add()
{
    $paciente = $this->Paciente->newEmptyEntity();

    if ($this->request->is('post')) {
        $data = $this->request->getData();

        // Asignar el valor manualmente a PacCod
        $paciente->PacCod = $data['PacCod'];
        // Actualizar el estado de registro y el flag
        $paciente->PacCarFlaAct = "1";
        $paciente->PacEstReg = 'A';

        // Validación de código de paciente único
        $pacienteExists = $this->Paciente->exists(['PacCod' => $paciente->PacCod]);
        if ($pacienteExists) {
            $this->Flash->error(__('El código del paciente ya está en uso. Por favor, elige uno nuevo.'));
        } else {
            $paciente = $this->Paciente->patchEntity($paciente, $data);

            if ($this->Paciente->save($paciente)) {
                $this->Flash->success(__('El paciente ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El paciente no se pudo guardar. Inténtalo de nuevo.'));
            }
        }
    }

    $this->set(compact('paciente'));
}


/**
 * Edit method
 *
 * @param string|null $id Paciente id.
 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function edit($id = null)
{
    $paciente = $this->Paciente->get($id, [
        'contain' => [],
    ]);

    // Verificar si se está realizando una actualización
    $updating = $this->request->is(['patch', 'post', 'put']);
    // Obtener el estado actual del flag o bandera de actualizar
    $flagToUpdate = $this->getFlagToUpdate($paciente);

    if ($flagToUpdate) {
        if ($updating) {
            $paciente = $this->Paciente->patchEntity($paciente, $this->request->getData());

            // Verificar si el registro se actualizó correctamente
            if ($this->Paciente->save($paciente)) {
                $this->Flash->success(__('El paciente a sido actualizado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El paciente no se puso actualizar. intentelo nuevamente.'));
            }
        }
    } else {
        $this->Flash->error(__('No tienes permiso para actualizar este registro.'));
    }

    $this->set(compact('paciente', 'updating', 'flagToUpdate'));
}
/**
 * Obtener el valor de la bandera de actualización.
 *
 * @param \App\Model\Entity\Paciente $paciente Paciente entity.
 * @return bool Valor de la bandera de actualización.
 */
public function getFlagToUpdate($paciente)
{
    if ($paciente->PacEstReg === 'A' && $paciente->PacCarFlaAct === '1') {
        return true;
    } else {
        return false;
    }
}


/**
 * Delete method
 *
 * @param string|null $id Paciente id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $paciente = $this->Paciente->get($id);

    // Actualizar el estado del registro en lugar de eliminarlo
    $paciente->PacEstReg = '*';
    $paciente->PacCarFlaAct = "0";
    if ($this->Paciente->save($paciente)) {
        $this->Flash->success(__('El paciente a sido eliminado.'));
    } else {
        $this->Flash->error(__('El paciente no puso eliminarse. Por favor, intentelo nuevamente.'));
    }

    return $this->redirect(['action' => 'index']);
}

/**
 * Inactivate method
 *
 * @param string|null $id Paciente id.
 * @return \Cake\Http\Response|null|void Redirects to index.
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function inactivate($id = null)
{
    $paciente = $this->Paciente->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('paciente'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $paciente->PacEstReg = 'I';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $paciente->PacCarFlaAct = "1";

        if ($this->Paciente->save($paciente)) {
            $this->Flash->success(__('El paciente ha sido inactivado.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('El paciente no pudo inactivarse. Por favor, intentelo nuevamente.'));
    }
        // $this->set('CarFlaAct', "1");
}

public function reactivate($id = null)
{
    $paciente = $this->Paciente->get($id);

    // Cargar los datos del registro seleccionado a las cajas de texto
    $this->set(compact('paciente'));

    if ($this->request->is(['patch', 'post', 'put'])) {
        // No se permite modificar ningún dato, protegiendo el código, descripción y estado de registro

        // Actualizar el estado de registro a "I"
        $paciente->PacEstReg = 'A';
           // Colocar el flag o bandera de actualizar en valor de "1"
        $paciente->PacCarFlaAct = "1";

        if ($this->Paciente->save($paciente)) {
            $this->Flash->success(__('El paciente a sido reactivado.'));
            // Redireccionar a la página de la grilla
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('El paciente no pudo reactivarse. Por favor, intentelo nuevamente.'));
    }
        // $this->set('CarFlaAct', "1");
}

}
