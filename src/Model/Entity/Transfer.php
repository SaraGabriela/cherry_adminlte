<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transfer Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $date
 * @property string|null $manager
 * @property int $branch_warehouse_origin_id
 * @property int $branch_warehouse_destiny_id
 *
 * @property \App\Model\Entity\BranchWarehouse $branch_warehouse
 * @property \App\Model\Entity\TransferFinalCake[] $transfer_final_cake
 * @property \App\Model\Entity\TransferProductionRecipe[] $transfer_production_recipes
 * @property \App\Model\Entity\TransferWarehouseProduct[] $transfer_warehouse_products
 */
class Transfer extends Entity
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
        'manager' => true,
        'branch_warehouse_origin_id' => true,
        'branch_warehouse_destiny_id' => true,
        'branch_warehouse' => true,
        'transfer_final_cake' => true,
        'transfer_production_recipes' => true,
        'transfer_warehouse_products' => true,
    ];
}
