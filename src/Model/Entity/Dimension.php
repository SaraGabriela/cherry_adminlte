<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dimension Entity
 *
 * @property int $id
 * @property string $description
 *
 * @property \App\Model\Entity\DecorationDimension[] $decoration_dimensions
 * @property \App\Model\Entity\EquivalenceDimension[] $equivalence_dimensions
 * @property \App\Model\Entity\FillingDimension[] $filling_dimensions
 * @property \App\Model\Entity\RecipeDimension[] $recipe_dimensions
 */
class Dimension extends Entity
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
        'description' => true,
        'decoration_dimensions' => true,
        'equivalence_dimensions' => true,
        'filling_dimensions' => true,
        'recipe_dimensions' => true,
    ];
}
