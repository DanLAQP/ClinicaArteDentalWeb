<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HistoriaClinica Model
 *
 * @method \App\Model\Entity\HistoriaClinica newEmptyEntity()
 * @method \App\Model\Entity\HistoriaClinica newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\HistoriaClinica[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HistoriaClinica get($primaryKey, $options = [])
 * @method \App\Model\Entity\HistoriaClinica findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\HistoriaClinica patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HistoriaClinica[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\HistoriaClinica|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HistoriaClinica saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HistoriaClinica[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HistoriaClinica[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\HistoriaClinica[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HistoriaClinica[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class HistoriaClinicaTable extends Table
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

        $this->setTable('historia_clinica');
        $this->setDisplayField('HisCliCod');
        $this->setPrimaryKey('HisCliCod');
         // Configuración de la relación con la tabla Paciente
    $this->belongsTo('Paciente', [
        'foreignKey' => 'PacCod',
        'joinType' => 'INNER',
    ]);

    $this->belongsTo('Odontologo', [
        'foreignKey' => 'OdoCod',
        'bindingKey' => 'OdoCod', // Clave primaria en la tabla odontologo
        'propertyName' => 'odontologo', // Nombre de la propiedad para la relación
    ]);

    // Configuración de la relación con la tabla HistoriaMedica
    $this->belongsTo('HistoriaMedica', [
        'foreignKey' => 'HisMedCod',
        'joinType' => 'INNER',
    ]);

     // Relación hasMany con Tratamiento
    $this->hasOne('Tratamiento', [
        'foreignKey' => 'HisCliCod', // Clave foránea en la tabla Tratamiento
        'propertyName' => 'tratamiento', // Nombre de la propiedad para la relación
    ]);
      // Relación hasMany con Odontograma
    $this->hasOne('Odontograma', [
        'foreignKey' => 'HisCliCod', // Clave foránea en la tabla Odontograma
        'propertyName' => 'odontograma', // Nombre de la propiedad para la relación
    ]);
          // Relación hasMany con HistorialTrabajo
    $this->hasMany('HistorialTrabajo', [
        'foreignKey' => 'HisCliCod', // Clave foránea en la tabla HistorialTrabajo
        'propertyName' => 'historial_trabajo', // Nombre de la propiedad para la relación
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
            ->integer('PacCod')
            ->requirePresence('PacCod', 'create')
            ->notEmptyString('PacCod');

            $validator
            ->integer('OdoCod')
            ->requirePresence('OdoCod', 'create')
            ->notEmptyString('OdoCod');

        $validator
            ->integer('HisMedCod')
            ->requirePresence('HisMedCod', 'create')
            ->notEmptyString('HisMedCod');


        $validator
            ->boolean('HisCliOdoAce')
            ->allowEmptyString('HisCliOdoAce');

        $validator
            ->boolean('HisCliPacAce')
            ->allowEmptyString('HisCliPacAce');

            $validator
            ->integer('HisCliAno')
            ->allowEmptyString('HisCliAno')
            ->add('HisCliAno', 'validYear', [
                'rule' => function ($value) {
                    return preg_match('/^\d{4}$/', $value) === 1;
                },
                'message' => 'Por favor ingrese un año válido (formato: YYYY)'
            ]);

            $validator
            ->integer('HisCliMes')
            ->allowEmptyString('HisCliMes')
            ->add('HisCliMes', 'validMonth', [
                'rule' => function ($value) {
                    return $value >= 1 && $value <= 12;
                },
                'message' => 'Por favor ingrese un mes válido (1 al 12)'
            ]);


            $validator
            ->integer('HisCliDia')
            ->allowEmptyString('HisCliDia')
            ->add('HisCliDia', 'validDay', [
                'rule' => function ($value) {
                    return $value >= 1 && $value <= 31;
                },
                'message' => 'Por favor ingrese un día válido (1 al 31)'
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
