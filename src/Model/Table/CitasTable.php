<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Citas Model
 *
 * @method \App\Model\Entity\Cita newEmptyEntity()
 * @method \App\Model\Entity\Cita newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Cita[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cita get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cita findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Cita patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cita[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cita|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cita saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cita[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cita[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cita[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cita[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CitasTable extends Table
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

        $this->setTable('citas');
        $this->setDisplayField('CitCod');
        $this->setPrimaryKey('CitCod');

        $this->belongsTo('Paciente', [
            'foreignKey' => 'PacCod',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Odontologo', [
            'foreignKey' => 'OdoCod',
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
            ->integer('CitCod')
            ->notEmptyString('PacCod');

        $validator
            ->integer('PacCod')
            ->notEmptyString('PacCod');

        $validator
            ->integer('OdoCod')
            ->notEmptyString('OdoCod');

        $validator
            ->dateTime('CitFecHor')
            ->allowEmptyDateTime('CitFecHor');

        $validator
            ->scalar('Duracion')
            ->allowEmptyString('Duracion');

        $validator
            ->scalar('CitEst')
            ->allowEmptyString('CitEst');

        return $validator;
    }
}
