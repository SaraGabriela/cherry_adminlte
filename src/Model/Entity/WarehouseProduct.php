<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WarehouseProduct Entity
 *
 * @property int $id
 * @property int $branch_warehouse_id
 * @property float $current_stock
 * @property string $unit
 * @property \Cake\I18n\FrozenDate $date
 * @property int $product_id
 * @property int $previous_stock
 *
 * @property \App\Model\Entity\BranchWarehouse $branch_warehouse
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\TransferWarehouseProduct[] $transfer_warehouse_products
 */
class WarehouseProduct extends Entity
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
        'branch_warehouse_id' => true,
        'current_stock' => true,
        'unit' => true,
        'date' => true,
        'product_id' => true,
        'previous_stock' => true,
        'branch_warehouse' => true,
        'product' => true,
        'transfer_warehouse_products' => true,
    ];
}
