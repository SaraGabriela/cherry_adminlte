<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PreparationProduct $preparationProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Preparation Product'), ['action' => 'edit', $preparationProduct->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Preparation Product'), ['action' => 'delete', $preparationProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $preparationProduct->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Preparation Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Preparation Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="preparationProducts view content">
            <h3><?= h($preparationProduct->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Previous Preparation') ?></th>
                    <td><?= $preparationProduct->has('previous_preparation') ? $this->Html->link($preparationProduct->previous_preparation->id, ['controller' => 'PreviousPreparations', 'action' => 'view', $preparationProduct->previous_preparation->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $preparationProduct->has('product') ? $this->Html->link($preparationProduct->product->name, ['controller' => 'Products', 'action' => 'view', $preparationProduct->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit') ?></th>
                    <td><?= h($preparationProduct->unit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($preparationProduct->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($preparationProduct->quantity) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
