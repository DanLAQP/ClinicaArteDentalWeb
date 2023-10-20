<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Citas Controller
 *
 * @property \App\Model\Table\CitasTable $Citas
 * @method \App\Model\Entity\Cita[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
use App\Model\Table\PacienteTable;
use App\Model\Table\OdontologoTable;
class CitasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    // public function index()
    // {
    //     $citFecHorIngresada = null;

    //     if ($this->request->is('post')) {
    //         $citFecHorIngresada = $this->request->getData('CitFecHor');

    //         if (!empty($citFecHorIngresada)) {
    //             $query = $this->Citas->find()
    //                 ->order(['CitCod' => 'ASC'])
    //                 ->where([
    //                     'DATE(CitFecHor)' => date('Y-m-d', strtotime($citFecHorIngresada))
    //                 ]);
    //         } else {
    //             $query = $this->Citas;
    //         }
    //     } else {
    //         $query = $this->Citas;
    //     }

    //     $citas = $this->paginate($query);

    //     $this->set(compact('citas', 'citFecHorIngresada'));
    // }

    public function index()
    {
        $citFecHorIngresada = null;

        if ($this->request->is('post')) {
            $citFecHorIngresada = $this->request->getData('CitFecHor');

            if (!empty($citFecHorIngresada)) {
                $query = $this->Citas->find()
                    ->order(['CitCod' => 'ASC'])
                    ->where([
                        'DATE(CitFecHor)' => date('Y-m-d', strtotime($citFecHorIngresada))
                    ])
                    ->contain(['Paciente', 'Odontologo']); // Incluye los datos del paciente y del odontólogo
            } else {
                $query = $this->Citas->find()->contain(['Paciente', 'Odontologo']); // Incluye los datos del paciente y del odontólogo sin filtro de fecha
            }
        } else {
            $query = $this->Citas->find()->contain(['Paciente', 'Odontologo']); // Incluye los datos del paciente y del odontólogo sin filtro de fecha
        }

        $citas = $this->paginate($query);

        $this->set(compact('citas', 'citFecHorIngresada'));
    }





    /**
     * View method
     *
     * @param string|null $id Cita id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cita = $this->Citas->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('cita'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {


        $opcionesDePacCod = $this->Citas->Paciente->find('list', [
            'keyField' => 'PacCod',
            'valueField' => 'PacNom',
        ])->toArray();

        $opcionesDeOdoCod = $this->Citas->Odontologo->find('list', [
            'keyField' => 'OdoCod',
            'valueField' => 'OdoNom',
        ])->toArray();

        $cita = $this->Citas->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Asignar el valor manualmente a CitCod
            $cita->CitCod = $data['CitCod'];

            // Validación de código de cita único
            $citaExists = $this->Citas->exists(['CitCod' => $cita->CitCod]);
            if ($citaExists) {
                $this->Flash->error(__('El código de la cita ya está en uso. Por favor, elige uno nuevo.'));
            } else {
                $cita = $this->Citas->patchEntity($cita, $data);

                if ($this->Citas->save($cita)) {
                    $this->Flash->success(__('La cita se ha guardado.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('La cita no pudo guardarse. Inténtalo de nuevo.'));
                }
            }
        }

        $this->set(compact('cita', 'opcionesDePacCod', 'opcionesDeOdoCod'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Cita id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cita = $this->Citas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cita = $this->Citas->patchEntity($cita, $this->request->getData());
            if ($this->Citas->save($cita)) {
                $this->Flash->success(__('La cita ha sido guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La cita no pudo guardarse. Intentelo denuevo.'));
        }
        $this->set(compact('cita'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cita id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cita = $this->Citas->get($id);
        if ($this->Citas->delete($cita)) {
            $this->Flash->success(__('La cita ha sido eliminada.'));
        } else {
            $this->Flash->error(__('La cita no pudo elminarse. Intentelo denuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
