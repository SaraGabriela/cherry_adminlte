<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransferWarehouseProduct[]|\Cake\Collection\CollectionInterface $transferWarehouseProducts
 */
?>
<div class="transferWarehouseProducts index content">
    <?= $this->Html->link(__('New Transfer Warehouse Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Transfer Warehouse Products') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('warehouse_product_id') ?></th>
                    <th><?= $this->Paginator->sort('transfer_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('unit') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transferWarehouseProducts as $transferWarehouseProduct): ?>
                <tr>
                    <td><?= $this->Number->format($transferWarehouseProduct->id) ?></td>
                    <td><?= $transferWarehouseProduct->has('warehouse_product') ? $this->Html->link($transferWarehouseProduct->warehouse_product->id, ['controller' => 'WarehouseProducts', 'action' => 'view', $transferWarehouseProduct->warehouse_product->id]) : '' ?></td>
                    <td><?= $transferWarehouseProduct->has('transfer') ? $this->Html->link($transferWarehouseProduct->transfer->id, ['controller' => 'Transfers', 'action' => 'view', $transferWarehouseProduct->transfer->id]) : '' ?></td>
                    <td><?= $this->Number->format($transferWarehouseProduct->quantity) ?></td>
                    <td><?= h($transferWarehouseProduct->unit) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $transferWarehouseProduct->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transferWarehouseProduct->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transferWarehouseProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferWarehouseProduct->id)]) ?>
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
