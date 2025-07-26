<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Churchs Model
 *
 * @property \App\Model\Table\DenominationsTable&\Cake\ORM\Association\BelongsTo $Denominations
 * @property \App\Model\Table\AffecationsTable&\Cake\ORM\Association\HasMany $Affecations
 * @property \App\Model\Table\EquipmentsTable&\Cake\ORM\Association\HasMany $Equipments
 * @property \App\Model\Table\GroupMembersTable&\Cake\ORM\Association\HasMany $GroupMembers
 * @property \App\Model\Table\MembersTable&\Cake\ORM\Association\HasMany $Members
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\HasMany $Projects
 * @property \App\Model\Table\SermonsTable&\Cake\ORM\Association\HasMany $Sermons
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\HasMany $Services
 * @property \App\Model\Table\TransactionsTable&\Cake\ORM\Association\HasMany $Transactions
 *
 * @method \App\Model\Entity\Church newEmptyEntity()
 * @method \App\Model\Entity\Church newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Church> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Church get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Church findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Church patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Church> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Church|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Church saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Church>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Church>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Church>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Church> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Church>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Church>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Church>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Church> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChurchsTable extends Table
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

        $this->setTable('churchs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Denominations', [
            'foreignKey' => 'denomination_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Affecations', [
            'foreignKey' => 'church_id',
        ]);
        $this->hasMany('Equipments', [
            'foreignKey' => 'church_id',
        ]);
        $this->hasMany('GroupMembers', [
            'foreignKey' => 'church_id',
        ]);
        $this->hasMany('Members', [
            'foreignKey' => 'church_id',
        ]);
        $this->hasMany('Projects', [
            'foreignKey' => 'church_id',
        ]);
        $this->hasMany('Sermons', [
            'foreignKey' => 'church_id',
        ]);
        $this->hasMany('Services', [
            'foreignKey' => 'church_id',
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'church_id',
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
            ->scalar('reference')
            ->maxLength('reference', 15)
            ->allowEmptyString('reference');

        $validator
            ->integer('denomination_id')
            ->notEmptyString('denomination_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 45)
            ->allowEmptyString('name');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('address')
            ->maxLength('address', 45)
            ->allowEmptyString('address');

        $validator
            ->scalar('phone1')
            ->maxLength('phone1', 15)
            ->allowEmptyString('phone1');

        $validator
            ->scalar('phone2')
            ->maxLength('phone2', 15)
            ->allowEmptyString('phone2');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('website')
            ->maxLength('website', 45)
            ->allowEmptyString('website');

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
        $rules->add($rules->existsIn(['denomination_id'], 'Denominations'), ['errorField' => 'denomination_id']);

        return $rules;
    }
}
