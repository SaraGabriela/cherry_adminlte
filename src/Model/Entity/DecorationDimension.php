<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DecorationDimension Entity
 *
 * @property int $id
 * @property int $decoration_id
 * @property int $dimension_id
 *
 * @property \App\Model\Entity\Decoration $decoration
 * @property \App\Model\Entity\Dimension $dimension
 * @property \App\Model\Entity\DecorationProductMeasure[] $decoration_product_measures
 */
class DecorationDimension extends Entity
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
        'decoration_id' => true,
        'dimension_id' => true,
        'decoration' => true,
        'dimension' => true,
        'decoration_product_measures' => true,
    ];
}
