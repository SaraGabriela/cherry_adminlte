<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseProduct $purchaseProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Purchase Product'), ['action' => 'edit', $purchaseProduct->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Purchase Product'), ['action' => 'delete', $purchaseProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseProduct->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Purchase Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Purchase Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchaseProducts view content">
            <h3><?= h($purchaseProduct->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Observations') ?></th>
                    <td><?= h($purchaseProduct->observations) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $purchaseProduct->has('product') ? $this->Html->link($purchaseProduct->product->name, ['controller' => 'Products', 'action' => 'view', $purchaseProduct->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Purchase') ?></th>
                    <td><?= $purchaseProduct->has('purchase') ? $this->Html->link($purchaseProduct->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseProduct->purchase->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Warehouse') ?></th>
                    <td><?= $purchaseProduct->has('warehouse') ? $this->Html->link($purchaseProduct->warehouse->id, ['controller' => 'Warehouses', 'action' => 'view', $purchaseProduct->warehouse->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($purchaseProduct->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($purchaseProduct->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit') ?></th>
                    <td><?= $this->Number->format($purchaseProduct->unit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cost By Unit') ?></th>
                    <td><?= $this->Number->format($purchaseProduct->cost_by_unit) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
