<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Offerings Model
 *
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsTo $Services
 * @property \App\Model\Table\OfferingstypesTable&\Cake\ORM\Association\BelongsTo $Offeringstypes
 * @property \App\Model\Table\CurrenciesTable&\Cake\ORM\Association\BelongsTo $Currencies
 *
 * @method \App\Model\Entity\Offering newEmptyEntity()
 * @method \App\Model\Entity\Offering newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Offering> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Offering get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Offering findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Offering patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Offering> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Offering|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Offering saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Offering>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Offering>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Offering>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Offering> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Offering>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Offering>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Offering>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Offering> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OfferingsTable extends Table
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

        $this->setTable('offerings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Offeringstypes', [
            'foreignKey' => 'offeringstype_id',
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
            ->integer('service_id')
            ->notEmptyString('service_id');

        $validator
            ->date('service_date')
            ->allowEmptyDate('service_date');

        $validator
            ->integer('offeringstype_id')
            ->notEmptyString('offeringstype_id');

        $validator
            ->numeric('amount')
            ->allowEmptyString('amount');

        $validator
            ->scalar('currency_id')
            ->maxLength('currency_id', 45)
            ->allowEmptyString('currency_id');

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
        $rules->add($rules->existsIn(['offeringstype_id'], 'Offeringstypes'), ['errorField' => 'offeringstype_id']);
        $rules->add($rules->existsIn(['currency_id'], 'Currencies'), ['errorField' => 'currency_id']);

        return $rules;
    }
}
