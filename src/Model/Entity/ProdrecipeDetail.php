<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProdrecipeDetail Entity
 *
 * @property int $id
 * @property int $production_recipe_id
 * @property int $branch_warehouse_id
 * @property int $cake_phase
 * @property string $current_ubication
 * @property bool $special_order
 * @property int $priority
 * @property string $branch
 * @property string $observations
 * @property \Cake\I18n\FrozenDate $date_phase_change
 *
 * @property \App\Model\Entity\ProductionRecipe $production_recipe
 * @property \App\Model\Entity\BranchWarehouse $branch_warehouse
 * @property \App\Model\Entity\Transformation[] $transformations
 */
class ProdrecipeDetail extends Entity
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
        'production_recipe_id' => true,
        'branch_warehouse_id' => true,
        'cake_phase' => true,
        'current_ubication' => true,
        'special_order' => true,
        'priority' => true,
        'branch' => true,
        'observations' => true,
        'date_phase_change' => true,
        'production_recipe' => true,
        'branch_warehouse' => true,
        'transformations' => true,
    ];
}
