<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Raw Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $code
 * @property int $equivalence_id
 *
 * @property \App\Model\Entity\Equivalence $equivalence
 * @property \App\Model\Entity\RawProduct[] $raw_products
 * @property \App\Model\Entity\Recipe[] $recipes
 */
class Raw extends Entity
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
        'equivalence_id' => true,
        'equivalence' => true,
        'raw_products' => true,
        'recipes' => true,
    ];
}
