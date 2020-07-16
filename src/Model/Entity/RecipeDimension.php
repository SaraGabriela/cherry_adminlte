<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RecipeDimension Entity
 *
 * @property int $recipe_dimensions_id
 * @property int $dimension_id
 * @property string $description
 * @property int $recipe_id
 * @property string $price
 *
 * @property \App\Model\Entity\Dimension $dimension
 * @property \App\Model\Entity\Recipe $recipe
 * @property \App\Model\Entity\ProductionRecipe[] $production_recipes
 */
class RecipeDimension extends Entity
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
        'dimension_id' => true,
        'description' => true,
        'recipe_id' => true,
        'price' => true,
        'dimension' => true,
        'recipe' => true,
        'production_recipes' => true,
    ];
}