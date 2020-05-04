<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WarehouseProduct $warehouseProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Warehouse Product'), ['action' => 'edit', $warehouseProduct->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Warehouse Product'), ['action' => 'delete', $warehouseProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $warehouseProduct->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Warehouse Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Warehouse Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="warehouseProducts view content">
            <h3><?= h($warehouseProduct->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Branch Warehouse') ?></th>
                    <td><?= $warehouseProduct->has('branch_warehouse') ? $this->Html->link($warehouseProduct->branch_warehouse->id, ['controller' => 'BranchWarehouses', 'action' => 'view', $warehouseProduct->branch_warehouse->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit') ?></th>
                    <td><?= h($warehouseProduct->unit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $warehouseProduct->has('product') ? $this->Html->link($warehouseProduct->product->name, ['controller' => 'Products', 'action' => 'view', $warehouseProduct->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($warehouseProduct->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Current Stock') ?></th>
                    <td><?= $this->Number->format($warehouseProduct->current_stock) ?></td>
                </tr>
                <tr>
                    <th><?= __('Previous Stock') ?></th>
                    <td><?= $this->Number->format($warehouseProduct->previous_stock) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($warehouseProduct->date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
