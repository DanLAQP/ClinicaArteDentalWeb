<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tratamiento Model
 *
 * @method \App\Model\Entity\Tratamiento newEmptyEntity()
 * @method \App\Model\Entity\Tratamiento newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tratamiento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tratamiento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tratamiento findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tratamiento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tratamiento[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tratamiento|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tratamiento saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tratamiento[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tratamiento[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tratamiento[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tratamiento[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TratamientoTable extends Table
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

        $this->setTable('tratamiento');
        $this->setDisplayField('TraCod');
        $this->setPrimaryKey('TraCod');

        // Configuración de la relación con la tabla HistoriaMedica
        $this->belongsTo('HistoriaClinica', [
            'foreignKey' => 'HisCliCod',
            'joinType' => 'INNER',
        ]);

         //añadiendo esta linea de codigo
        $this->hasMany('DetalleTratamiento', [
            'foreignKey' => 'TraCod',
            'joinType' => 'INNER',
        ]);


        // $this->hasMany('DetalleTratamiento');
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
            ->integer('HisCliCod')
            ->requirePresence('HisCliCod', 'create')
            ->notEmptyString('HisCliCod');

            $validator
            ->scalar('TraDes')
            ->maxLength('TraDes', 50)
            ->allowEmptyString('TraDes')
            ->add('TraDes', 'validFormat', [
                'rule' => ['custom', '/^[a-zA-Z0-9\s]*$/'], // Expresión regular para letras, números y espacios
                'message' => 'Por favor, ingrese solo letras y números.'
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
