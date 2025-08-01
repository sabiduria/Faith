<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TransactionTypes Model
 *
 * @property \App\Model\Table\TransactionsTable&\Cake\ORM\Association\HasMany $Transactions
 *
 * @method \App\Model\Entity\TransactionType newEmptyEntity()
 * @method \App\Model\Entity\TransactionType newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\TransactionType> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TransactionType get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\TransactionType findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\TransactionType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\TransactionType> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TransactionType|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\TransactionType saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\TransactionType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TransactionType>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TransactionType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TransactionType> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TransactionType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TransactionType>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TransactionType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TransactionType> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TransactionTypesTable extends Table
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

        $this->setTable('transaction_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Transactions', [
            'foreignKey' => 'transaction_type_id',
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
}
