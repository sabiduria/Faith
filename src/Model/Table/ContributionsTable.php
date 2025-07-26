<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contributions Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\Contribution newEmptyEntity()
 * @method \App\Model\Entity\Contribution newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Contribution> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contribution get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Contribution findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Contribution patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Contribution> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contribution|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Contribution saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Contribution>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contribution>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contribution>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contribution> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contribution>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contribution>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contribution>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contribution> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContributionsTable extends Table
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

        $this->setTable('contributions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
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
            ->integer('project_id')
            ->notEmptyString('project_id');

        $validator
            ->scalar('donator')
            ->maxLength('donator', 45)
            ->allowEmptyString('donator');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 15)
            ->allowEmptyString('phone');

        $validator
            ->numeric('amount')
            ->allowEmptyString('amount');

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'), ['errorField' => 'project_id']);

        return $rules;
    }
}
