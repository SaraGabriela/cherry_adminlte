<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RawRecipe Entity
 *
 * @property int $id
 * @property string $recipes_quantity
 * @property string $unit
 *
 * @property \App\Model\Entity\RecipeProductMeasure[] $recipe_product_measures
 */
class RawRecipe extends Entity
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
        'recipes_quantity' => true,
        'unit' => true,
        'recipe_product_measures' => true,
    ];
}
