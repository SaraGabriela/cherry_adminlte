<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FinalCake Entity
 *
 * @property int $id
 * @property int $cake_id
 * @property int $production_recipe_id
 * @property string $price
 * @property \Cake\I18n\FrozenDate $arrival_date
 *
 * @property \App\Model\Entity\Cake $cake
 * @property \App\Model\Entity\ProductionRecipe $production_recipe
 * @property \App\Model\Entity\TransferFinalCake[] $transfer_final_cake
 * @property \App\Model\Entity\Transformation[] $transformations
 */
class FinalCake extends Entity
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
        'cake_id' => true,
        'production_recipe_id' => true,
        'price' => true,
        'arrival_date' => true,
        'cake' => true,
        'production_recipe' => true,
        'transfer_final_cake' => true,
        'transformations' => true,
    ];
}
