<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contract Entity
 *
 * @property int $id
 * @property int|null $client_id
 * @property int $production_id
 * @property int|null $alliance_id
 * @property \Cake\I18n\FrozenDate $order_date
 * @property \Cake\I18n\FrozenDate $delivery_date
 * @property string $total_price
 * @property string $account_price
 * @property string $description
 * @property string $ubication
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Production $production
 * @property \App\Model\Entity\Alliance $alliance
 * @property \App\Model\Entity\ContractRecipe[] $contract_recipes
 */
class Contract extends Entity
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
        'client_id' => true,
        'production_id' => true,
        'alliance_id' => true,
        'order_date' => true,
        'delivery_date' => true,
        'total_price' => true,
        'account_price' => true,
        'description' => true,
        'ubication' => true,
        'client' => true,
        'production' => true,
        'alliance' => true,
        'contract_recipes' => true,
    ];
}
