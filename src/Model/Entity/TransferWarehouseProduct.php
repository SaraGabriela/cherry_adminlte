<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TransferWarehouseProduct Entity
 *
 * @property int $id
 * @property int $warehouse_product_id
 * @property int $transfer_id
 * @property int $quantity
 * @property string $unit
 *
 * @property \App\Model\Entity\WarehouseProduct $warehouse_product
 * @property \App\Model\Entity\Transfer $transfer
 */
class TransferWarehouseProduct extends Entity
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
        'warehouse_product_id' => true,
        'transfer_id' => true,
        'quantity' => true,
        'unit' => true,
        'warehouse_product' => true,
        'transfer' => true,
    ];
}
