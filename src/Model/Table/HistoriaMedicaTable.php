<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HistoriaMedica Model
 *
 * @method \App\Model\Entity\HistoriaMedica newEmptyEntity()
 * @method \App\Model\Entity\HistoriaMedica newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\HistoriaMedica[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HistoriaMedica get($primaryKey, $options = [])
 * @method \App\Model\Entity\HistoriaMedica findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\HistoriaMedica patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HistoriaMedica[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\HistoriaMedica|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HistoriaMedica saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HistoriaMedica[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HistoriaMedica[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\HistoriaMedica[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HistoriaMedica[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class HistoriaMedicaTable extends Table
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

        $this->setTable('historia_medica');
        $this->setDisplayField('HisMedCod');
        $this->setPrimaryKey('HisMedCod');
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
            ->boolean('HisMedProCar')
            ->allowEmptyString('HisMedProCar');

        $validator
            ->boolean('HisMedEnfRen')
            ->allowEmptyString('HisMedEnfRen');

        $validator
            ->boolean('HisMedDia')
            ->allowEmptyString('HisMedDia');

        $validator
            ->boolean('HisMedHip')
            ->allowEmptyString('HisMedHip');

        $validator
            ->boolean('HisMedEpi')
            ->allowEmptyString('HisMedEpi');

        $validator
            ->boolean('HisMedVIH')
            ->allowEmptyString('HisMedVIH');

        $validator
            ->boolean('HisMedHep')
            ->allowEmptyString('HisMedHep');

        $validator
            ->boolean('HisMedPro')
            ->allowEmptyString('HisMedPro');

        $validator
            ->boolean('HisMedAle')
            ->allowEmptyString('HisMedAle');

        $validator
            ->boolean('HisMedProCoa')
            ->allowEmptyString('HisMedProCoa');

        $validator
            ->boolean('HisMedTomMed')
            ->allowEmptyString('HisMedTomMed');

        $validator
            ->boolean('HisMedEmb')
            ->allowEmptyString('HisMedEmb');

        $validator
            ->boolean('HisMedProTraDen')
            ->allowEmptyString('HisMedProTraDen');

        $validator
            ->boolean('HisMedHab')
            ->allowEmptyString('HisMedHab');

        $validator
            ->boolean('HisMedEsp')
            ->allowEmptyString('HisMedEsp');

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
