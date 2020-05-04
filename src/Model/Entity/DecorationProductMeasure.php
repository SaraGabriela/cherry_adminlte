<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DecorationProductMeasure Entity
 *
 * @property int $id
 * @property int $decoration_dimension_id
 * @property int $decoration_product_id
 * @property string $quantity
 * @property string $unit
 *
 * @property \App\Model\Entity\DecorationDimension $decoration_dimension
 * @property \App\Model\Entity\DecorationProduct $decoration_product
 */
class DecorationProductMeasure extends Entity
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
        'decoration_dimension_id' => true,
        'decoration_product_id' => true,
        'quantity' => true,
        'unit' => true,
        'decoration_dimension' => true,
        'decoration_product' => true,
    ];
}
