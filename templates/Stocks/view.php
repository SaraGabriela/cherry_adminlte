<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Stock'), ['action' => 'edit', $stock->stock_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Stock'), ['action' => 'delete', $stock->stock_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stock->stock_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Stocks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Stock'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stocks view content">
            <h3><?= h($stock->stock_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Recipe Dimension') ?></th>
                    <td><?= $stock->has('recipe_dimension') ? $this->Html->link($stock->recipe_dimension->recipe_dimensions_id, ['controller' => 'RecipeDimensions', 'action' => 'view', $stock->recipe_dimension->recipe_dimensions_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Branch') ?></th>
                    <td><?= $stock->has('branch') ? $this->Html->link($stock->branch->name, ['controller' => 'Branches', 'action' => 'view', $stock->branch->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock Id') ?></th>
                    <td><?= $this->Number->format($stock->stock_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($stock->quantity) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
