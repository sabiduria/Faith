<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sermons Model
 *
 * @property \App\Model\Table\TopicsTable&\Cake\ORM\Association\BelongsTo $Topics
 * @property \App\Model\Table\ChurchsTable&\Cake\ORM\Association\BelongsTo $Churchs
 * @property \App\Model\Table\CommentsTable&\Cake\ORM\Association\HasMany $Comments
 * @property \App\Model\Table\LikesTable&\Cake\ORM\Association\HasMany $Likes
 * @property \App\Model\Table\MediasTable&\Cake\ORM\Association\HasMany $Medias
 * @property \App\Model\Table\VersesTable&\Cake\ORM\Association\HasMany $Verses
 *
 * @method \App\Model\Entity\Sermon newEmptyEntity()
 * @method \App\Model\Entity\Sermon newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Sermon> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sermon get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Sermon findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Sermon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Sermon> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sermon|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Sermon saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Sermon>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sermon>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Sermon>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sermon> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Sermon>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sermon>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Sermon>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sermon> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SermonsTable extends Table
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

        $this->setTable('sermons');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Topics', [
            'foreignKey' => 'topic_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Churchs', [
            'foreignKey' => 'church_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'sermon_id',
        ]);
        $this->hasMany('Likes', [
            'foreignKey' => 'sermon_id',
        ]);
        $this->hasMany('Medias', [
            'foreignKey' => 'sermon_id',
        ]);
        $this->hasMany('Verses', [
            'foreignKey' => 'sermon_id',
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
            ->integer('topic_id')
            ->notEmptyString('topic_id');

        $validator
            ->integer('church_id')
            ->notEmptyString('church_id');

        $validator
            ->scalar('banner')
            ->allowEmptyString('banner');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->allowEmptyString('title');

        $validator
            ->scalar('verse')
            ->maxLength('verse', 255)
            ->allowEmptyString('verse');

        $validator
            ->scalar('summary')
            ->allowEmptyString('summary');

        $validator
            ->scalar('sermon')
            ->allowEmptyString('sermon');

        $validator
            ->scalar('contributor')
            ->maxLength('contributor', 45)
            ->allowEmptyString('contributor');

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
        $rules->add($rules->existsIn(['topic_id'], 'Topics'), ['errorField' => 'topic_id']);
        $rules->add($rules->existsIn(['church_id'], 'Churchs'), ['errorField' => 'church_id']);

        return $rules;
    }
}
