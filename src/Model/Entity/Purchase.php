<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Purchase Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date
 * @property string $person_in_charge
 * @property \Cake\I18n\FrozenDate $delivery_date
 * @property int $provider_id
 *
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\PurchaseProduct[] $purchase_products
 */
class Purchase extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'person_in_charge' => true,
        'delivery_date' => true,
        'provider_id' => true,
        'supplier' => true,
        'purchase_products' => true,
    ];
}
