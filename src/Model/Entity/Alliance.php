<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Alliance Entity
 *
 * @property int $id
 * @property string $client
 * @property \Cake\I18n\FrozenDate $date
 * @property string $ticket_value
 * @property int $ticket_quantity
 *
 * @property \App\Model\Entity\Contract[] $contracts
 */
class Alliance extends Entity
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
        'client' => true,
        'date' => true,
        'ticket_value' => true,
        'ticket_quantity' => true,
        'contracts' => true,
    ];
}
