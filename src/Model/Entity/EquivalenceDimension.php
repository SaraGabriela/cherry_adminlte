<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EquivalenceDimension Entity
 *
 * @property int $id
 * @property int $equivalence_id
 * @property int $dimension_id
 * @property string $quantity_recipes
 *
 * @property \App\Model\Entity\Equivalence $equivalence
 * @property \App\Model\Entity\Dimension $dimension
 */
class EquivalenceDimension extends Entity
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
        'equivalence_id' => true,
        'dimension_id' => true,
        'quantity_recipes' => true,
        'equivalence' => true,
        'dimension' => true,
    ];
}
