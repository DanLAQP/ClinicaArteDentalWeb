<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HistorialTrabajo Model
 *
 * @method \App\Model\Entity\HistorialTrabajo newEmptyEntity()
 * @method \App\Model\Entity\HistorialTrabajo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\HistorialTrabajo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HistorialTrabajo get($primaryKey, $options = [])
 * @method \App\Model\Entity\HistorialTrabajo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\HistorialTrabajo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HistorialTrabajo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\HistorialTrabajo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HistorialTrabajo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HistorialTrabajo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HistorialTrabajo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\HistorialTrabajo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HistorialTrabajo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class HistorialTrabajoTable extends Table
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

        $this->setTable('historial_trabajo');
        $this->setDisplayField('HisTraCod');
        $this->setPrimaryKey('HisTraCod');

        $this->belongsTo('HistoriaClinica', [
            'foreignKey' => 'HisCliCod',
            'joinType' => 'INNER',
        ]);
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
            ->integer('HisTraCod')
            ->notEmptyString('HisTraCod');

        $validator
            ->integer('HisCliCod')
            ->requirePresence('HisCliCod', 'create')
            ->notEmptyString('HisCliCod');

            $validator
            ->integer('HisTraFecAno')
            ->allowEmptyString('HisTraFecAno')
            ->add('HisTraFecAno', 'validYear', [
                'rule' => function ($value, $context) {
                    return is_numeric($value) && $value >= 0 && $value <= 9999; // Ajusta el rango si es necesario
                },
                'message' => 'Por favor ingrese un año válido(2023).'
            ]);

        $validator
            ->integer('HisTraFecMes')
            ->allowEmptyString('HisTraFecMes')
            ->add('HisTraFecMes', 'validMonth', [
                'rule' => function ($value, $context) {
                    return is_numeric($value) && $value >= 1 && $value <= 12; // Meses válidos entre 1 y 12
                },
                'message' => 'Por favor ingrese un mes válido(1-12).'
            ]);

        $validator
            ->integer('HisTraFecDia')
            ->allowEmptyString('HisTraFecDia')
            ->add('HisTraFecDia', 'validDay', [
                'rule' => function ($value, $context) {
                    return is_numeric($value) && $value >= 1 && $value <= 31; // Días válidos entre 1 y 31
                },
                'message' => 'Por favor ingrese un día válido(1-31).'
            ]);


        $validator
            ->boolean('HisTraLab')
            ->allowEmptyString('HisTraLab');

            $validator
            ->scalar('HisTraDocNom')
            ->maxLength('HisTraDocNom', 100)
            ->allowEmptyString('HisTraDocNom')
            ->add('HisTraDocNom', 'alphaOnly', [
                'rule' => ['custom', '/^[a-zA-Z\s]+$/'],
                'message' => 'Por favor ingrese solo letras.'
            ]);



            $validator
            ->scalar('HisTraTra')
            ->maxLength('HisTraTra', 255)
            ->allowEmptyString('HisTraTra')
            ->add('HisTraTra', 'alphaOnly', [
                'rule' => '/^[a-zA-Z\s]+$/',
                'message' => 'Por favor ingrese solo letras.'
            ]);

            $validator
            ->integer('HisTraAcu')
            ->allowEmptyString('HisTraAcu')
            ->greaterThan('HisTraAcu', 0, 'Por favor ingrese un número mayor a 0')
            ->lessThanOrEqual('HisTraAcu', 99999, 'Por favor ingrese un número de máximo 5 dígitos');


            $validator
            ->integer('HisTraSal')
            ->allowEmptyString('HisTraSal')
            ->greaterThan('HisTraSal', 0, 'Por favor ingrese un número mayor a 0')
            ->lessThanOrEqual('HisTraSal', 999999, 'Por favor ingrese un número de máximo 6 dígitos');


        $validator
            ->boolean('HisTraFirPac')
            ->allowEmptyString('HisTraFirPac');

            $validator
            ->scalar('HisTraObs')
            ->maxLength('HisTraObs', 120)
            ->allowEmptyString('HisTraObs')
            ->add('HisTraObs', 'alphaNumeric', [
                'rule' => ['alphaNumeric'],
                'message' => 'Por favor ingrese solo letras y números.'
            ]);


        $validator
            ->scalar('EstReg')
            ->maxLength('EstReg', 1)
            ->allowEmptyString('EstReg');

        $validator
            ->scalar('CarFlaAct')
            ->maxLength('CarFlaAct', 1)
            ->allowEmptyString('CarFlaAct');

        return $validator;
    }
}
