<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RecipeProductMeasure Entity
 *
 * @property int $id
 * @property int $raw_product_id
 * @property int $raw_recipe_id
 * @property string $quantity
 * @property string $unit
 *
 * @property \App\Model\Entity\RawProduct $raw_product
 * @property \App\Model\Entity\RawRecipe $raw_recipe
 */
class RecipeProductMeasure extends Entity
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
        'raw_product_id' => true,
        'raw_recipe_id' => true,
        'quantity' => true,
        'unit' => true,
        'raw_product' => true,
        'raw_recipe' => true,
    ];
}
