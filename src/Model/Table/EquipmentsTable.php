<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Equipments Model
 *
 * @property \App\Model\Table\ChurchsTable&\Cake\ORM\Association\BelongsTo $Churchs
 * @property \App\Model\Table\MaintenancesTable&\Cake\ORM\Association\HasMany $Maintenances
 *
 * @method \App\Model\Entity\Equipment newEmptyEntity()
 * @method \App\Model\Entity\Equipment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Equipment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Equipment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Equipment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Equipment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Equipment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Equipment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Equipment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Equipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Equipment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Equipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Equipment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Equipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Equipment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Equipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Equipment> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EquipmentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('equipments');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Churchs', [
            'foreignKey' => 'church_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Maintenances', [
            'foreignKey' => 'equipment_id',
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
            ->integer('church_id')
            ->notEmptyString('church_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 45)
            ->allowEmptyString('name');

        $validator
            ->scalar('notes')
            ->allowEmptyString('notes');

        $validator
            ->numeric('price')
            ->allowEmptyString('price');

        $validator
            ->scalar('equipment_status')
            ->maxLength('equipment_status', 45)
            ->allowEmptyString('equipment_status');

        $validator
            ->date('acquisition_date')
            ->allowEmptyDate('acquisition_date');

        $validator
            ->scalar('createdby')
            ->maxLength('createdby', 45)
            ->allowEmptyString('createdby');

        $validator
            ->scalar('modifiedby')
            ->maxLength('modifiedby', 45)
            ->allowEmptyString('modifiedby');

        $validator
            ->boolean('deleted')
            ->allowEmptyString('deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['church_id'], 'Churchs'), ['errorField' => 'church_id']);

        return $rules;
    }
}
