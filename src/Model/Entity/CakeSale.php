<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CakeSale Entity
 *
 * @property int $id
 * @property int $cake_id
 * @property int $alliance_id
 * @property string $branch
 * @property \Cake\I18n\FrozenDate $sale_date
 * @property string $sale_price
 *
 * @property \App\Model\Entity\Cake $cake
 * @property \App\Model\Entity\Alliance $alliance
 */
class CakeSale extends Entity
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
        'alliance_id' => true,
        'branch' => true,
        'sale_date' => true,
        'sale_price' => true,
        'cake' => true,
        'alliance' => true,
    ];
}
