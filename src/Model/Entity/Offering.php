<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Offering Entity
 *
 * @property int $id
 * @property int $service_id
 * @property \Cake\I18n\Date|null $service_date
 * @property int $offeringstype_id
 * @property float|null $amount
 * @property string|null $currency_id
 * @property int|null $church
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property bool|null $deleted
 *
 * @property \App\Model\Entity\Service $service
 * @property \App\Model\Entity\Offeringstype $offeringstype
 * @property \App\Model\Entity\Currency $currency
 */
class Offering extends Entity
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
        'service_id' => true,
        'service_date' => true,
        'offeringstype_id' => true,
        'amount' => true,
        'currency_id' => true,
        'church' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true,
        'modifiedby' => true,
        'deleted' => true,
        'service' => true,
        'offeringstype' => true,
        'currency' => true,
    ];
}
