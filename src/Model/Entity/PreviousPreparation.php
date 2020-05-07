<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PreviousPreparation Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $quantity_produced
 *int
 * @property \App\Model\Entity\PreparationProduct[] $preparation_products
 */
class PreviousPreparation extends Entity
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
        'description' => true,
        'quantity_produced' => true,
        'preparation_products' => true,
        
    ];
}
