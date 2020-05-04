<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EquivalenceDimension $equivalenceDimension
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Equivalence Dimension'), ['action' => 'edit', $equivalenceDimension->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Equivalence Dimension'), ['action' => 'delete', $equivalenceDimension->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equivalenceDimension->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Equivalence Dimensions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Equivalence Dimension'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="equivalenceDimensions view content">
            <h3><?= h($equivalenceDimension->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Equivalence') ?></th>
                    <td><?= $equivalenceDimension->has('equivalence') ? $this->Html->link($equivalenceDimension->equivalence->id, ['controller' => 'Equivalences', 'action' => 'view', $equivalenceDimension->equivalence->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Dimension') ?></th>
                    <td><?= $equivalenceDimension->has('dimension') ? $this->Html->link($equivalenceDimension->dimension->id, ['controller' => 'Dimensions', 'action' => 'view', $equivalenceDimension->dimension->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($equivalenceDimension->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity Recipes') ?></th>
                    <td><?= $this->Number->format($equivalenceDimension->quantity_recipes) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
