<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TransferFinalCake Entity
 *
 * @property int $id
 * @property int $transfer_id
 * @property int $final_cake_id
 * @property int $quantity
 *
 * @property \App\Model\Entity\Transfer $transfer
 * @property \App\Model\Entity\FinalCake $final_cake
 */
class TransferFinalCake extends Entity
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
        'transfer_id' => true,
        'final_cake_id' => true,
        'quantity' => true,
        'transfer' => true,
        'final_cake' => true,
    ];
}
