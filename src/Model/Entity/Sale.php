<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity
 *
 * @property int $sale_id
 * @property int $stock_id
 * @property \Cake\I18n\FrozenDate $date
 * @property string $price
 * @property string $sales_type
 * @property int $quantity
 *
 * @property \App\Model\Entity\Stock $stock
 */
class Sale extends Entity
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
        'stock_id' => true,
        'date' => true,
        'price' => true,
        'sales_type' => true,
        'quantity' => true,
        'stock' => true,
    ];
}
