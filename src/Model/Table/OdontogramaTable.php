<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Odontograma Model
 *
 * @method \App\Model\Entity\Odontograma newEmptyEntity()
 * @method \App\Model\Entity\Odontograma newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Odontograma[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Odontograma get($primaryKey, $options = [])
 * @method \App\Model\Entity\Odontograma findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Odontograma patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Odontograma[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Odontograma|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Odontograma saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Odontograma[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Odontograma[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Odontograma[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Odontograma[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OdontogramaTable extends Table
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

        $this->setTable('odontograma');
        $this->setDisplayField('OdxCod');
        $this->setPrimaryKey('OdxCod');

        //añadiendo esta linea de codigo
        // $this->hasMany('OdontogramaDetalle');
        // Configuración de la relación con la tabla HistoriaMedica
        $this->belongsTo('HistoriaClinica', [
            'foreignKey' => 'HisCliCod',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('OdontogramaDetalle', [
            'foreignKey' => 'OdxCod', // La clave foránea en la tabla OdontogramaDetalle
            'propertyName' => 'odontograma_detalles' // El nombre de la propiedad para acceder a los detalles del odontograma
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
        ->integer('OdxCod')
        ->requirePresence('OdxCod', 'create')
        ->notEmptyString('OdxCod', 'Este campo no puede estar vacío.');

        $validator
            ->integer('HisCliCod')
            ->requirePresence('HisCliCod', 'create')
            ->notEmptyString('HisCliCod');

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
