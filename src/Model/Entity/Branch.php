<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Branch Entity
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $person_in_charge
 *
 * @property \App\Model\Entity\BranchWarehouse[] $branch_warehouses
 * @property \App\Model\Entity\Contract[] $contracts
 */
class Branch extends Entity
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
        'name' => true,
        'address' => true,
        'person_in_charge' => true,
        'branch_warehouses' => true,
        'contracts' => true,
    ];
}
