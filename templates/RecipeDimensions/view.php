<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RecipeDimension $recipeDimension
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Recipe Dimension'), ['action' => 'edit', $recipeDimension->recipe_dimensions_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Recipe Dimension'), ['action' => 'delete', $recipeDimension->recipe_dimensions_id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipeDimension->recipe_dimensions_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Recipe Dimensions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Recipe Dimension'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="recipeDimensions view content">
            <h3><?= h($recipeDimension->recipe_dimensions_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Dimension') ?></th>
                    <td><?= $recipeDimension->has('dimension') ? $this->Html->link($recipeDimension->dimension->description, ['controller' => 'Dimensions', 'action' => 'view', $recipeDimension->dimension->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($recipeDimension->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Recipe') ?></th>
                    <td><?= $recipeDimension->has('recipe') ? $this->Html->link($recipeDimension->recipe->id, ['controller' => 'Recipes', 'action' => 'view', $recipeDimension->recipe->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Recipe Dimensions Id') ?></th>
                    <td><?= $this->Number->format($recipeDimension->recipe_dimensions_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($recipeDimension->price) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Production Recipes') ?></h4>
                <?php if (!empty($recipeDimension->production_recipes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Production Id') ?></th>
                            <th><?= __('Recipe Dimension Id') ?></th>
                            <th><?= __('Observations') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($recipeDimension->production_recipes as $productionRecipes) : ?>
                        <tr>
                            <td><?= h($productionRecipes->id) ?></td>
                            <td><?= h($productionRecipes->production_id) ?></td>
                            <td><?= h($productionRecipes->recipe_dimension_id) ?></td>
                            <td><?= h($productionRecipes->observations) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ProductionRecipes', 'action' => 'view', $productionRecipes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ProductionRecipes', 'action' => 'edit', $productionRecipes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductionRecipes', 'action' => 'delete', $productionRecipes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productionRecipes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
