<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Store Entity
 *
 * @property int $id
 * @property string $sale_type
 * @property int $alliance_id
 * @property int $branch_id
 *
 * @property \App\Model\Entity\Alliance $alliance
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\RecipeDimension[] $recipe_dimensions
 */
class Store extends Entity
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
        'sale_type' => true,
        'alliance_id' => true,
        'branch_id' => true,
        'alliance' => true,
        'branch' => true,
        'recipe_dimensions' => true,
    ];
}
