<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Participations Model
 *
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsTo $Services
 *
 * @method \App\Model\Entity\Participation newEmptyEntity()
 * @method \App\Model\Entity\Participation newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Participation> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Participation get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Participation findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Participation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Participation> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Participation|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Participation saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Participation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Participation>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Participation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Participation> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Participation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Participation>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Participation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Participation> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ParticipationsTable extends Table
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

        $this->setTable('participations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
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
            ->integer('service_id')
            ->notEmptyString('service_id');

        $validator
            ->date('participation_date')
            ->allowEmptyDate('participation_date');

        $validator
            ->numeric('number_people')
            ->allowEmptyString('number_people');

        $validator
            ->numeric('male_people')
            ->allowEmptyString('male_people');

        $validator
            ->numeric('female_people')
            ->allowEmptyString('female_people');

        $validator
            ->numeric('children_people')
            ->allowEmptyString('children_people');

        $validator
            ->integer('church')
            ->allowEmptyString('church');

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
        $rules->add($rules->existsIn(['service_id'], 'Services'), ['errorField' => 'service_id']);

        return $rules;
    }
}
