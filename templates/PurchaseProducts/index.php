<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseProduct[]|\Cake\Collection\CollectionInterface $purchaseProducts
 */
?>
<div class="purchaseProducts index content">
    <?= $this->Html->link(__('New Purchase Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Purchase Products') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('unit') ?></th>
                    <th><?= $this->Paginator->sort('observations') ?></th>
                    <th><?= $this->Paginator->sort('cost_by_unit') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('purchase_id') ?></th>
                    <th><?= $this->Paginator->sort('warehouse_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchaseProducts as $purchaseProduct): ?>
                <tr>
                    <td><?= $this->Number->format($purchaseProduct->id) ?></td>
                    <td><?= $this->Number->format($purchaseProduct->quantity) ?></td>
                    <td><?= $this->Number->format($purchaseProduct->unit) ?></td>
                    <td><?= h($purchaseProduct->observations) ?></td>
                    <td><?= $this->Number->format($purchaseProduct->cost_by_unit) ?></td>
                    <td><?= $purchaseProduct->has('product') ? $this->Html->link($purchaseProduct->product->name, ['controller' => 'Products', 'action' => 'view', $purchaseProduct->product->id]) : '' ?></td>
                    <td><?= $purchaseProduct->has('purchase') ? $this->Html->link($purchaseProduct->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseProduct->purchase->id]) : '' ?></td>
                    <td><?= $purchaseProduct->has('warehouse') ? $this->Html->link($purchaseProduct->warehouse->id, ['controller' => 'Warehouses', 'action' => 'view', $purchaseProduct->warehouse->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseProduct->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseProduct->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseProduct->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
