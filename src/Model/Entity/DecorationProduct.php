<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DecorationProduct Entity
 *
 * @property int $id
 * @property int $decoration_id
 * @property int $product_id
 *
 * @property \App\Model\Entity\Decoration $decoration
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\DecorationProductMeasure[] $decoration_product_measures
 */
class DecorationProduct extends Entity
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
        'decoration_id' => true,
        'product_id' => true,
        'decoration' => true,
        'product' => true,
        'decoration_product_measures' => true,
    ];
}
