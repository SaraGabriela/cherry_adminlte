<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RawProduct Entity
 *
 * @property int $id
 * @property int $raw_id
 * @property int $product_id
 *
 * @property \App\Model\Entity\Raw $raw
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\RecipeProductMeasure[] $recipe_product_measures
 */
class RawProduct extends Entity
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
        'raw_id' => true,
        'product_id' => true,
        'raw' => true,
        'product' => true,
        'recipe_product_measures' => true,
    ];
}
