<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Maintenances Model
 *
 * @property \App\Model\Table\EquipmentsTable&\Cake\ORM\Association\BelongsTo $Equipments
 *
 * @method \App\Model\Entity\Maintenance newEmptyEntity()
 * @method \App\Model\Entity\Maintenance newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Maintenance> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Maintenance get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Maintenance findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Maintenance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Maintenance> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Maintenance|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Maintenance saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Maintenance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Maintenance>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Maintenance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Maintenance> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Maintenance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Maintenance>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Maintenance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Maintenance> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MaintenancesTable extends Table
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

        $this->setTable('maintenances');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Equipments', [
            'foreignKey' => 'equipment_id',
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
            ->integer('equipment_id')
            ->notEmptyString('equipment_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 45)
            ->allowEmptyString('name');

        $validator
            ->scalar('problem')
            ->allowEmptyString('problem');

        $validator
            ->scalar('resolution')
            ->allowEmptyString('resolution');

        $validator
            ->numeric('expense')
            ->allowEmptyString('expense');

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
        $rules->add($rules->existsIn(['equipment_id'], 'Equipments'), ['errorField' => 'equipment_id']);

        return $rules;
    }
}
