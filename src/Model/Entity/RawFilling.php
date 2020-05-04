<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RawFilling Entity
 *
 * @property int $id
 * @property int $name
 * @property int $code
 *
 * @property \App\Model\Entity\FillingDimension[] $filling_dimensions
 * @property \App\Model\Entity\FillingProduct[] $filling_products
 * @property \App\Model\Entity\Recipe[] $recipes
 */
class RawFilling extends Entity
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
        'name' => true,
        'code' => true,
        'filling_dimensions' => true,
        'filling_products' => true,
        'recipes' => true,
    ];
}
