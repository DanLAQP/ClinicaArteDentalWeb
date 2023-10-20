<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Odontologo Model
 *
 * @method \App\Model\Entity\Odontologo newEmptyEntity()
 * @method \App\Model\Entity\Odontologo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Odontologo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Odontologo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Odontologo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Odontologo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Odontologo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Odontologo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Odontologo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Odontologo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Odontologo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Odontologo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Odontologo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OdontologoTable extends Table
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

        $this->setTable('odontologo');
        $this->setDisplayField('OdoCod');
        $this->setPrimaryKey('OdoCod');
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
            ->integer('OdoCod')
            ->notEmptyString('OdoCod');

            $validator
            ->scalar('OdoNom')
            ->maxLength('OdoNom', 100, 'Por favor ingrese sus nombres con un máximo de 100 caracteres')
            ->allowEmptyString('OdoNom')
            ->add('OdoNom', 'alphaOnly', [
                'rule' => ['custom', '/^[a-zA-Z\s]+$/'],
                'message' => 'Por favor ingrese solo letras.'
        ]);



        $validator
            ->integer('OdoFecIngAno')
            ->allowEmptyString('OdoFecIngAno')
            ->add('OdoFecIngAno', 'validYear', [
                'rule' => function ($value, $context) {
                    return is_numeric($value) && $value >= 0 && $value <= 9999; // Ajusta el rango si es necesario
                },
                'message' => 'Por favor ingrese un año válido(2023).'
            ]);

        $validator
            ->integer('OdoFecIngMes')
            ->allowEmptyString('OdoFecIngMes')
            ->add('OdoFecIngMes', 'validMonth', [
                'rule' => function ($value, $context) {
                    return is_numeric($value) && $value >= 1 && $value <= 12; // Meses válidos entre 1 y 12
                },
                'message' => 'Por favor ingrese un mes válido(1-12).'
            ]);

        $validator
            ->integer('OdoFecIngDia')
            ->allowEmptyString('OdoFecIngDia')
            ->add('OdoFecIngDia', 'validDay', [
            'rule' => function ($value, $context) {
                 return is_numeric($value) && $value >= 1 && $value <= 31; // Días válidos entre 1 y 31
            },
            'message' => 'Por favor ingrese un día válido(1-31).'
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
