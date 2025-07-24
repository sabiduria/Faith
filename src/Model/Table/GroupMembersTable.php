<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GroupMembers Model
 *
 * @property \App\Model\Table\ChurchGroupsTable&\Cake\ORM\Association\BelongsTo $ChurchGroups
 * @property \App\Model\Table\ChurchsTable&\Cake\ORM\Association\BelongsTo $Churchs
 *
 * @method \App\Model\Entity\GroupMember newEmptyEntity()
 * @method \App\Model\Entity\GroupMember newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\GroupMember> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GroupMember get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\GroupMember findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\GroupMember patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\GroupMember> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\GroupMember|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\GroupMember saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\GroupMember>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\GroupMember>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\GroupMember>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\GroupMember> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\GroupMember>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\GroupMember>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\GroupMember>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\GroupMember> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GroupMembersTable extends Table
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

        $this->setTable('group_members');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ChurchGroups', [
            'foreignKey' => 'church_group_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Churchs', [
            'foreignKey' => 'church_id',
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
            ->integer('church_group_id')
            ->notEmptyString('church_group_id');

        $validator
            ->integer('church_id')
            ->notEmptyString('church_id');

        $validator
            ->boolean('approved')
            ->allowEmptyString('approved');

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
        $rules->add($rules->existsIn(['church_group_id'], 'ChurchGroups'), ['errorField' => 'church_group_id']);
        $rules->add($rules->existsIn(['church_id'], 'Churchs'), ['errorField' => 'church_id']);

        return $rules;
    }
}
