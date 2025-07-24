<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Followings Model
 *
 * @property \App\Model\Table\MembersTable&\Cake\ORM\Association\BelongsTo $Members
 *
 * @method \App\Model\Entity\Following newEmptyEntity()
 * @method \App\Model\Entity\Following newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Following> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Following get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Following findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Following patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Following> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Following|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Following saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Following>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Following>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Following>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Following> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Following>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Following>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Following>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Following> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FollowingsTable extends Table
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

        $this->setTable('followings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Members', [
            'foreignKey' => 'member_id',
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
            ->integer('member_id')
            ->notEmptyString('member_id');

        $validator
            ->integer('church')
            ->allowEmptyString('church');

        $validator
            ->date('following_date')
            ->allowEmptyDate('following_date');

        $validator
            ->boolean('following_status')
            ->allowEmptyString('following_status');

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
        $rules->add($rules->existsIn(['member_id'], 'Members'), ['errorField' => 'member_id']);

        return $rules;
    }
}
