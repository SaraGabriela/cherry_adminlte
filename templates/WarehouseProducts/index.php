<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WarehouseProduct[]|\Cake\Collection\CollectionInterface $warehouseProducts
 */
?>
<div class="warehouseProducts index content">
    <?= $this->Html->link(__('New Warehouse Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Warehouse Products') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('branch_warehouse_id') ?></th>
                    <th><?= $this->Paginator->sort('current_stock') ?></th>
                    <th><?= $this->Paginator->sort('unit') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('previous_stock') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($warehouseProducts as $warehouseProduct): ?>
                <tr>
                    <td><?= $this->Number->format($warehouseProduct->id) ?></td>
                    <td><?= $warehouseProduct->has('branch_warehouse') ? $this->Html->link($warehouseProduct->branch_warehouse->id, ['controller' => 'BranchWarehouses', 'action' => 'view', $warehouseProduct->branch_warehouse->id]) : '' ?></td>
                    <td><?= $this->Number->format($warehouseProduct->current_stock) ?></td>
                    <td><?= h($warehouseProduct->unit) ?></td>
                    <td><?= h($warehouseProduct->date) ?></td>
                    <td><?= $warehouseProduct->has('product') ? $this->Html->link($warehouseProduct->product->name, ['controller' => 'Products', 'action' => 'view', $warehouseProduct->product->id]) : '' ?></td>
                    <td><?= $this->Number->format($warehouseProduct->previous_stock) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $warehouseProduct->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $warehouseProduct->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $warehouseProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $warehouseProduct->id)]) ?>
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
