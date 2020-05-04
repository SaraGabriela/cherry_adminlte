<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FillingProduct Entity
 *
 * @property int $id
 * @property int $raw_filling_id
 * @property int $product_id
 *
 * @property \App\Model\Entity\RawFilling $raw_filling
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\FillingProductMeasure[] $filling_product_measures
 */
class FillingProduct extends Entity
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
        'raw_filling_id' => true,
        'product_id' => true,
        'raw_filling' => true,
        'product' => true,
        'filling_product_measures' => true,
    ];
}
