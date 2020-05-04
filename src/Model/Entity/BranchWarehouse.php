<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BranchWarehouse Entity
 *
 * @property int $id
 * @property int $warehouse_id
 * @property int $branch_id
 *
 * @property \App\Model\Entity\Warehouse $warehouse
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\WarehouseProduct[] $warehouse_products
 */
class BranchWarehouse extends Entity
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
        'warehouse_id' => true,
        'branch_id' => true,
        'warehouse' => true,
        'branch' => true,
        'warehouse_products' => true,
    ];
}
