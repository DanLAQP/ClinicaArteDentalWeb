<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OdontogramaDetalle Model
 *
 * @method \App\Model\Entity\OdontogramaDetalle newEmptyEntity()
 * @method \App\Model\Entity\OdontogramaDetalle newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OdontogramaDetalle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OdontogramaDetalle get($primaryKey, $options = [])
 * @method \App\Model\Entity\OdontogramaDetalle findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OdontogramaDetalle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OdontogramaDetalle[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OdontogramaDetalle|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OdontogramaDetalle saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OdontogramaDetalle[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OdontogramaDetalle[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OdontogramaDetalle[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OdontogramaDetalle[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OdontogramaDetalleTable extends Table
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

        $this->setTable('odontograma_detalle');
        $this->setDisplayField('OdxDetCod');
        $this->setPrimaryKey('OdxDetCod');

        $this->belongsTo('Odontograma', [
            'foreignKey' => 'OdxCod',
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
            ->integer('OdxDetCod')
            ->requirePresence('OdxDetCod', 'create')
            ->notEmptyString('OdxDetCod');

        $validator
            ->integer('OdxCod')
            ->requirePresence('OdxCod', 'create')
            ->notEmptyString('OdxCod');

        $validator
            ->integer('OdxDetNum')
            ->requirePresence('OdxDetNum', 'create')
            ->allowEmptyString('OdxDetNum');

            $validator
            ->integer('OdxDetNumDie')
            ->allowEmptyString('OdxDetNumDie')
            ->add('OdxDetNumDie', 'custom', [
                'rule' => function ($value, $context) {
                    return $value > 10 && $value < 86;
                },
                'message' => 'Por favor, ingrese un valor entre 11 y 86.'
            ]);

        $validator
            ->boolean('OdxDetVes')
            ->allowEmptyString('OdxDetVes');

        $validator
            ->boolean('OdxDetPal')
            ->allowEmptyString('OdxDetPal');

        $validator
            ->boolean('OdxDetLin')
            ->allowEmptyString('OdxDetLin');

        $validator
            ->boolean('OdxDetDer')
            ->allowEmptyString('OdxDetDer');

        $validator
            ->boolean('OdxDetIzq')
            ->allowEmptyString('OdxDetIzq');

            $validator
            ->scalar('OdxDetDes')
            ->maxLength('OdxDetDes', 120)
            ->allowEmptyString('OdxDetDes')
            ->add('OdxDetDes', 'validFormat', [
                'rule' => ['custom', '/^[a-zA-Z0-9\s]*$/'], // Expresión regular para letras, números y espacios
                'message' => 'Por favor, ingrese solo letras y números.'
            ]);

        $validator
            ->scalar('EstReg')
            ->maxLength('EstReg', 1)
            ->allowEmptyString('EstReg');

        $validator
            ->scalar('CarFlaAct')
            ->maxLength('CarFlaAct', 20)
            ->allowEmptyString('CarFlaAct');

        return $validator;
    }
}
