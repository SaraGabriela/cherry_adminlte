<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PreparationProduct Entity
 *
 * @property int $id
 * @property int $previous_preparation_id
 * @property int $product_id
 * @property string $quantity
 * @property string $unit
 *
 * @property \App\Model\Entity\PreviousPreparation $previous_preparation
 * @property \App\Model\Entity\Product $product
 */
class PreparationProduct extends Entity
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
        'previous_preparation_id' => true,
        'product_id' => true,
        'quantity' => true,
        'unit' => true,
        'previous_preparation' => true,
        'product' => true,
    ];
}
