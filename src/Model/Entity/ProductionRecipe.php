<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductionRecipe Entity
 *
 * @property int $id
 * @property int $production_id
 * @property int $recipe_dimension_id
 *
 * @property \App\Model\Entity\Production $production
 * @property \App\Model\Entity\RecipeDimension $recipe_dimension
 * @property \App\Model\Entity\FinalCake[] $final_cakes
 * @property \App\Model\Entity\ProdrecipeDetail[] $prodrecipe_details
 */
class ProductionRecipe extends Entity
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
        'production_id' => true,
        'recipe_dimension_id' => true,
        'production' => true,
        'recipe_dimension' => true,
        'final_cakes' => true,
        'prodrecipe_details' => true,
    ];
}
