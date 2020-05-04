<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Decoration Entity
 *
 * @property int $id
 * @property string $description
 * @property string|null $code
 *
 * @property \App\Model\Entity\DecorationDimension[] $decoration_dimensions
 * @property \App\Model\Entity\DecorationProduct[] $decoration_products
 * @property \App\Model\Entity\Recipe[] $recipes
 */
class Decoration extends Entity
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
        'code' => true,
        'decoration_dimensions' => true,
        'decoration_products' => true,
        'recipes' => true,
    ];
}
