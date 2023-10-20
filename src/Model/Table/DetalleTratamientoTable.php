<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetalleTratamiento Model
 *
 * @method \App\Model\Entity\DetalleTratamiento newEmptyEntity()
 * @method \App\Model\Entity\DetalleTratamiento newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DetalleTratamiento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetalleTratamiento get($primaryKey, $options = [])
 * @method \App\Model\Entity\DetalleTratamiento findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DetalleTratamiento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DetalleTratamiento[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetalleTratamiento|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DetalleTratamiento saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DetalleTratamiento[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DetalleTratamiento[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DetalleTratamiento[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DetalleTratamiento[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DetalleTratamientoTable extends Table
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

        $this->setTable('detalle_tratamiento');
        $this->setDisplayField('DetTraCod');
        $this->setPrimaryKey('DetTraCod');

        $this->belongsTo('Tratamiento', [
            'foreignKey' => 'TraCod',
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
        ->integer('DetTraCod')
        ->notEmptyString('DetTraCod');

        $validator
        ->integer('TraCod')
        ->requirePresence('TraCod', 'create')
        ->notEmptyString('TraCod');

        $validator
        ->integer('DetTraCan')
        ->requirePresence('DetTraCan', 'create')
        ->notEmptyString('DetTraCan')
        ->add('DetTraCan', 'maxDigits', [
        'rule' => function ($value) {
        return is_numeric($value) && $value >= 0 && strlen((string)$value) <= 8;
        },
        'message' => 'Por favor ingrese un número mayor o igual a 0 y de máximo 8 cifras (Ejemplo: 12345678)'
        ]);

        $validator
        ->integer('DetTraCosUni')
        ->requirePresence('DetTraCosUni', 'create')
        ->notEmptyString('DetTraCosUni')
        ->add('DetTraCosUni', 'maxDigits', [
        'rule' => function ($value) {
        return is_numeric($value) && $value >= 0 && strlen((string)$value) <= 8;
        },
        'message' => 'Por favor ingrese un número mayor o igual a 0 y de máximo 8 cifras (Ejemplo: 12345678)'
        ]);

        $validator
        ->integer('DetTraCosTot')
        ->allowEmptyString('DetTraCosTot');


        $validator
        ->scalar('DetTraDes')
        ->maxLength('DetTraDes', 120)
        ->allowEmptyString('DetTraDes')
        ->add('DetTraDes', 'validFormat', [
            'rule' => ['custom', '/^[a-zA-Z0-9\s]*$/'], // Expresión regular para letras, números y espacios
            'message' => 'Por favor, ingrese solo letras y números.'
        ]);

        $validator
        ->scalar('DetTraEst')
        ->maxLength('DetTraEst', 50)
        ->notEmptyString('DetTraEst');

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
