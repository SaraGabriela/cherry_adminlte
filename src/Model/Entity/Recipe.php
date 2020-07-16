<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recipe Entity
 *
 * @property int $id
 * @property int $raw_id
 * @property int $raw_filling_id
 * @property int $decoration_id
 * @property string|null $cooking_time
 * @property string|null $observations
 * @property string $comercial_name
 * @property string $photo
 *
 * @property \App\Model\Entity\Raw $raw
 * @property \App\Model\Entity\RawFilling $raw_filling
 * @property \App\Model\Entity\Decoration $decoration
 * @property \App\Model\Entity\ContractRecipe[] $contract_recipes
 * @property \App\Model\Entity\RecipeDimension[] $recipe_dimensions
 */
class Recipe extends Entity
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
        'raw_filling_id' => true,
        'decoration_id' => true,
        'cooking_time' => true,
        'observations' => true,
        'comercial_name' => true,
        'photo' => true,
        'raw' => true,
        'raw_filling' => true,
        'decoration' => true,
        'contract_recipes' => true,
        'recipe_dimensions' => true,
    ];
}