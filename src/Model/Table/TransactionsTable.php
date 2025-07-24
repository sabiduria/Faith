<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transactions Model
 *
 * @property \App\Model\Table\TransactionTypesTable&\Cake\ORM\Association\BelongsTo $TransactionTypes
 * @property \App\Model\Table\ChurchsTable&\Cake\ORM\Association\BelongsTo $Churchs
 * @property \App\Model\Table\CurrenciesTable&\Cake\ORM\Association\BelongsTo $Currencies
 *
 * @method \App\Model\Entity\Transaction newEmptyEntity()
 * @method \App\Model\Entity\Transaction newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Transaction> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transaction get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Transaction findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Transaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Transaction> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Transaction saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Transaction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaction>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Transaction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaction> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Transaction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaction>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Transaction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaction> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TransactionsTable extends Table
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

        $this->setTable('transactions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TransactionTypes', [
            'foreignKey' => 'transaction_type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Churchs', [
            'foreignKey' => 'church_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Currencies', [
            'foreignKey' => 'currency_id',
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
            ->integer('transaction_type_id')
            ->notEmptyString('transaction_type_id');

        $validator
            ->integer('church_id')
            ->notEmptyString('church_id');

        $validator
            ->numeric('amount')
            ->allowEmptyString('amount');

        $validator
            ->date('transaction_date')
            ->allowEmptyDate('transaction_date');

        $validator
            ->scalar('donator')
            ->maxLength('donator', 45)
            ->allowEmptyString('donator');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->integer('currency_id')
            ->allowEmptyString('currency_id');

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
        $rules->add($rules->existsIn(['transaction_type_id'], 'TransactionTypes'), ['errorField' => 'transaction_type_id']);
        $rules->add($rules->existsIn(['church_id'], 'Churchs'), ['errorField' => 'church_id']);
        $rules->add($rules->existsIn(['currency_id'], 'Currencies'), ['errorField' => 'currency_id']);

        return $rules;
    }
}
