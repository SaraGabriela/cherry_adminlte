<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stock Entity
 *
 * @property int $stock_id
 * @property int $recipe_dimensions_id
 * @property int $branch_id
 * @property int $quantity
 *
 * @property \App\Model\Entity\RecipeDimension $recipe_dimension
 * @property \App\Model\Entity\Branch $branch
 */
class Stock extends Entity
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
        'recipe_dimensions_id' => true,
        'branch_id' => true,
        'quantity' => true,
        'recipe_dimension' => true,
        'branch' => true,
    ];
}