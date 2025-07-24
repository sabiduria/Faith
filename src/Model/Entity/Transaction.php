<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $transaction_type_id
 * @property int $church_id
 * @property float|null $amount
 * @property \Cake\I18n\Date|null $transaction_date
 * @property string|null $donator
 * @property string|null $description
 * @property int|null $currency_id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property bool|null $deleted
 *
 * @property \App\Model\Entity\TransactionType $transaction_type
 * @property \App\Model\Entity\Church $church
 * @property \App\Model\Entity\Currency $currency
 */
class Transaction extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'transaction_type_id' => true,
        'church_id' => true,
        'amount' => true,
        'transaction_date' => true,
        'donator' => true,
        'description' => true,
        'currency_id' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true,
        'modifiedby' => true,
        'deleted' => true,
        'transaction_type' => true,
        'church' => true,
        'currency' => true,
    ];
}
