<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransferWarehouseProduct $transferWarehouseProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Transfer Warehouse Product'), ['action' => 'edit', $transferWarehouseProduct->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Transfer Warehouse Product'), ['action' => 'delete', $transferWarehouseProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferWarehouseProduct->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Transfer Warehouse Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Transfer Warehouse Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transferWarehouseProducts view content">
            <h3><?= h($transferWarehouseProduct->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Warehouse Product') ?></th>
                    <td><?= $transferWarehouseProduct->has('warehouse_product') ? $this->Html->link($transferWarehouseProduct->warehouse_product->id, ['controller' => 'WarehouseProducts', 'action' => 'view', $transferWarehouseProduct->warehouse_product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Transfer') ?></th>
                    <td><?= $transferWarehouseProduct->has('transfer') ? $this->Html->link($transferWarehouseProduct->transfer->id, ['controller' => 'Transfers', 'action' => 'view', $transferWarehouseProduct->transfer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit') ?></th>
                    <td><?= h($transferWarehouseProduct->unit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($transferWarehouseProduct->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($transferWarehouseProduct->quantity) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
