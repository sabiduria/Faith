<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ChurchGroups Model
 *
 * @property \App\Model\Table\GroupMembersTable&\Cake\ORM\Association\HasMany $GroupMembers
 *
 * @method \App\Model\Entity\ChurchGroup newEmptyEntity()
 * @method \App\Model\Entity\ChurchGroup newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ChurchGroup> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ChurchGroup get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ChurchGroup findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ChurchGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ChurchGroup> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ChurchGroup|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ChurchGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ChurchGroup>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ChurchGroup>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ChurchGroup>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ChurchGroup> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ChurchGroup>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ChurchGroup>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ChurchGroup>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ChurchGroup> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChurchGroupsTable extends Table
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

        $this->setTable('church_groups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('GroupMembers', [
            'foreignKey' => 'church_group_id',
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
            ->scalar('name')
            ->maxLength('name', 45)
            ->allowEmptyString('name');

        $validator
            ->scalar('group_status')
            ->maxLength('group_status', 45)
            ->allowEmptyString('group_status');

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
}
