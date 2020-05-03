<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchaseProduct Entity
 *
 * @property int $id
 * @property float $quantity
 * @property float $unit
 * @property string $observations
 * @property float $cost_by_unit
 * @property int $product_id
 * @property int $purchase_id
 * @property int $warehouse_id
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Purchase $purchase
 * @property \App\Model\Entity\Warehouse $warehouse
 */
class PurchaseProduct extends Entity
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
        'quantity' => true,
        'unit' => true,
        'observations' => true,
        'cost_by_unit' => true,
        'product_id' => true,
        'purchase_id' => true,
        'warehouse_id' => true,
        'product' => true,
        'purchase' => true,
        'warehouse' => true,
    ];
}
