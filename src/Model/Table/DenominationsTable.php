<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Denominations Model
 *
 * @property \App\Model\Table\ChurchsTable&\Cake\ORM\Association\HasMany $Churchs
 *
 * @method \App\Model\Entity\Denomination newEmptyEntity()
 * @method \App\Model\Entity\Denomination newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Denomination> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Denomination get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Denomination findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Denomination patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Denomination> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Denomination|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Denomination saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Denomination>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Denomination>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Denomination>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Denomination> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Denomination>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Denomination>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Denomination>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Denomination> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DenominationsTable extends Table
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

        $this->setTable('denominations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Churchs', [
            'foreignKey' => 'denomination_id',
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
