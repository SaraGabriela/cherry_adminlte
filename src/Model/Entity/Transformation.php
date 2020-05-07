<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transformation Entity
 *
 * @property int $id
 * @property int $final_cake_id
 * @property int $prodrecipe_detail_id
 * @property int $recipe
 * @property \Cake\I18n\FrozenDate $date
 * @property string $detail
 * @property int $phase
 *
 * @property \App\Model\Entity\FinalCake $final_cake
 * @property \App\Model\Entity\ProdrecipeDetail $prodrecipe_detail
 */
class Transformation extends Entity
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
        'final_cake_id' => true,
        'prodrecipe_detail_id' => true,
        'recipe' => true,
        'date' => true,
        'detail' => true,
        'phase' => true,
        'final_cake' => true,
        'prodrecipe_detail' => true,
    ];
}
