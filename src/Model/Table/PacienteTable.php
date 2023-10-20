<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Paciente Model
 *
 * @method \App\Model\Entity\Paciente newEmptyEntity()
 * @method \App\Model\Entity\Paciente newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Paciente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paciente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Paciente findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Paciente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Paciente[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paciente|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paciente saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paciente[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paciente[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paciente[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paciente[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PacienteTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('paciente');
        $this->setDisplayField('PacCod');
        $this->setPrimaryKey('PacCod');


    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('PacCod')
            ->notEmptyString('PacCod');

        $validator
            ->scalar('PacDir')
            ->maxLength('PacDir', 100)
            ->allowEmptyString('PacDir');

            $validator
            ->integer('PacAnoNac')
            ->allowEmptyString('PacAnoNac')
            ->add('PacAnoNac', 'validYear', [
                'rule' => function ($value) {
                    return preg_match('/^\d{4}$/', $value) === 1 && checkdate(1, 1, (int)$value);
                },
                'message' => 'Por favor ingrese un año válido (formato: YYYY)'
            ]);

            $validator

            ->integer('PacCel')
            ->allowEmptyString('PacCel')
            ->add('PacCel', 'validPeruPhoneNumber', [
                'rule' => function ($value) {
                    return preg_match('/^\d{9}$/', $value) === 1 && substr($value, 0, 1) === '9';
                },
                'message' => 'Por favor ingrese un número de teléfono válido de Perú(959 959 959)'
            ]);

            $validator
            ->scalar('PacEma')
            ->maxLength('PacEma', 100)
            ->allowEmptyString('PacEma')
            ->email('PacEma', false, 'Por favor ingrese una dirección de correo electrónico válida (artedentalaqp@gmail.com)');

            $validator
            ->integer('PacDni')
            ->allowEmptyString('PacDni')
            ->minLength('PacDni', 8, 'Por favor ingrese un número de DNI válido (mínimo 8 dígitos(Peru))')
            ->maxLength('PacDni', 12, 'Por favor ingrese un número de DNI válido (máximo 12 dígitos(Carnet de extranjeria))');


        $validator
            ->scalar('PacNom')
            ->maxLength('PacNom', 60, 'Por favor ingrese sus nombres con un máximo de 60 caracteres')
            ->allowEmptyString('PacNom')
            ->add('PacNom', 'alphaOnly', [
                'rule' => ['custom', '/^[a-zA-Z\s]+$/'],
                'message' => 'Por favor ingrese solo letras.'
        ]);

        $validator
    ->scalar('PacOcu')
    ->maxLength('PacOcu', 60, 'Por favor ingrese su ocupación con un máximo de 60 caracteres')
    ->allowEmptyString('PacOcu')
    ->add('PacOcu', 'alphaOnly', [
        'rule' => ['custom', '/^[a-zA-Z\s]+$/'],
        'message' => 'Por favor ingrese solo letras.'
    ]);


        $validator
    ->scalar('PacRef')
    ->maxLength('PacRef', 60, 'Por favor ingrese su referencia con un máximo de 60 caracteres')
    ->allowEmptyString('PacRef')
    ->add('PacRef', 'alphaNumeric', [
        'rule' => ['alphaNumeric'],
        'message' => 'Por favor ingrese solo letras y números.'
    ]);


        $validator
            ->scalar('PacEstReg')
            ->maxLength('PacEstReg', 1)
            ->allowEmptyString('PacEstReg');

        $validator
            ->scalar('PacCarFlaAct')
            ->maxLength('PacCarFlaAct', 1)
            ->allowEmptyString('PacCarFlaAct');

        return $validator;
    }

}
