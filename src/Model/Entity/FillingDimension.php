<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FillingDimension Entity
 *
 * @property int $id
 * @property int $raw_filling_id
 * @property int $dimension_id
 *
 * @property \App\Model\Entity\RawFilling $raw_filling
 * @property \App\Model\Entity\Dimension $dimension
 * @property \App\Model\Entity\FillingProductMeasure[] $filling_product_measures
 */
class FillingDimension extends Entity
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
        'raw_filling_id' => true,
        'dimension_id' => true,
        'raw_filling' => true,
        'dimension' => true,
        'filling_product_measures' => true,
    ];
}
