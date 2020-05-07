<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cake Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string|null $code
 *
 * @property \App\Model\Entity\CakeSale[] $cake_sales
 * @property \App\Model\Entity\FinalCake[] $final_cakes
 * @property \App\Model\Entity\Recipe[] $recipes
 */
class Cake extends Entity
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
        'description' => true,
        'code' => true,
        'cake_sales' => true,
        'final_cakes' => true,
        'recipes' => true,
    ];
}
