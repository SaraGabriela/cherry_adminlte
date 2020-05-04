<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Recipe'), ['action' => 'edit', $recipe->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Recipe'), ['action' => 'delete', $recipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Recipes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Recipe'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="recipes view content">
            <h3><?= h($recipe->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Dimension') ?></th>
                    <td><?= $recipe->has('dimension') ? $this->Html->link($recipe->dimension->id, ['controller' => 'Dimensions', 'action' => 'view', $recipe->dimension->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Raw') ?></th>
                    <td><?= $recipe->has('raw') ? $this->Html->link($recipe->raw->name, ['controller' => 'Raws', 'action' => 'view', $recipe->raw->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Raw Filling') ?></th>
                    <td><?= $recipe->has('raw_filling') ? $this->Html->link($recipe->raw_filling->name, ['controller' => 'RawFillings', 'action' => 'view', $recipe->raw_filling->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Decoration') ?></th>
                    <td><?= $recipe->has('decoration') ? $this->Html->link($recipe->decoration->id, ['controller' => 'Decorations', 'action' => 'view', $recipe->decoration->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Cooking Time') ?></th>
                    <td><?= h($recipe->cooking_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Special Order') ?></th>
                    <td><?= h($recipe->special_order) ?></td>
                </tr>
                <tr>
                    <th><?= __('Observations') ?></th>
                    <td><?= h($recipe->observations) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($recipe->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cake Id') ?></th>
                    <td><?= $this->Number->format($recipe->cake_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($recipe->price) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
