<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Verses Model
 *
 * @property \App\Model\Table\SermonsTable&\Cake\ORM\Association\BelongsTo $Sermons
 *
 * @method \App\Model\Entity\Verse newEmptyEntity()
 * @method \App\Model\Entity\Verse newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Verse> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Verse get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Verse findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Verse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Verse> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Verse|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Verse saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Verse>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Verse>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Verse>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Verse> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Verse>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Verse>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Verse>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Verse> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VersesTable extends Table
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

        $this->setTable('verses');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sermons', [
            'foreignKey' => 'sermon_id',
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
            ->integer('sermon_id')
            ->notEmptyString('sermon_id');

        $validator
            ->scalar('title')
            ->maxLength('title', 45)
            ->allowEmptyString('title');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

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
        $rules->add($rules->existsIn(['sermon_id'], 'Sermons'), ['errorField' => 'sermon_id']);

        return $rules;
    }
}
