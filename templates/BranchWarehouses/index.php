<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BranchWarehouse[]|\Cake\Collection\CollectionInterface $branchWarehouses
 */
?>
<div class="branchWarehouses index content">
    <?= $this->Html->link(__('New Branch Warehouse'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Branch Warehouses') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('warehouse_id') ?></th>
                    <th><?= $this->Paginator->sort('branch_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($branchWarehouses as $branchWarehouse): ?>
                <tr>
                    <td><?= $this->Number->format($branchWarehouse->id) ?></td>
                    <td><?= $branchWarehouse->has('warehouse') ? $this->Html->link($branchWarehouse->warehouse->id, ['controller' => 'Warehouses', 'action' => 'view', $branchWarehouse->warehouse->id]) : '' ?></td>
                    <td><?= $branchWarehouse->has('branch') ? $this->Html->link($branchWarehouse->branch->name, ['controller' => 'Branches', 'action' => 'view', $branchWarehouse->branch->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $branchWarehouse->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $branchWarehouse->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $branchWarehouse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branchWarehouse->id)]) ?>
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
