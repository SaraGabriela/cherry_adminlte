<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recipe Entity
 *
 * @property int $id
 * @property int $dimension_id
 * @property int $raw_id
 * @property int $raw_filling_id
 * @property int $decoration_id
 * @property int $cake_id
 * @property string|null $cooking_time
 * @property string $special_order
 * @property string $price
 * @property string|null $observations
 *
 * @property \App\Model\Entity\Dimension $dimension
 * @property \App\Model\Entity\Raw $raw
 * @property \App\Model\Entity\RawFilling $raw_filling
 * @property \App\Model\Entity\Decoration $decoration
 * @property \App\Model\Entity\Cake $cake
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
        'dimension_id' => true,
        'raw_id' => true,
        'raw_filling_id' => true,
        'decoration_id' => true,
        'cake_id' => true,
        'cooking_time' => true,
        'special_order' => true,
        'price' => true,
        'observations' => true,
        'dimension' => true,
        'raw' => true,
        'raw_filling' => true,
        'decoration' => true,
        'cake' => true,
    ];
}
