<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProdrecipeDetail Entity
 *
 * @property int $id
 * @property int $production_recipe_id
 * @property string $priority
 * @property string $observations
 * @property string $phase
 * @property int $quantity
 * @property int $branch
 *
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\ProductionRecipe $production_recipe
 * @property \App\Model\Entity\Transformation[] $transformations
 */
class ProdrecipeDetail extends Entity
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
        'production_recipe_id' => true,
        'priority' => true,
        'branch' => true,
        'observations' => true,
        'phase' => true,
        'quantity' => true,
        'production_recipe' => true,
        'transformations' => true,
    ];
}
