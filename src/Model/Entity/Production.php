<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Production Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date
 * @property int|null $number_cakes
 * @property string|null $observations
 *
 * @property \App\Model\Entity\Contract[] $contracts
 * @property \App\Model\Entity\ProductionRecipe[] $production_recipes
 */
class Production extends Entity
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
        'date' => true,
        'number_cakes' => true,
        'observations' => true,
        'contracts' => true,
        'production_recipes' => true,
    ];
}
