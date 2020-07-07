<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transfer[]|\Cake\Collection\CollectionInterface $transfers
 */
?>
<div class="transfers index content">
    <?= $this->Html->link(__('New Transfer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Transfers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('manager') ?></th>
                    <th><?= $this->Paginator->sort('branch_warehouse_origin_id') ?></th>
                    <th><?= $this->Paginator->sort('branch_warehouse_destiny_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transfers as $transfer): ?>
                <tr>
                    <td><?= $this->Number->format($transfer->id) ?></td>
                    <td><?= h($transfer->date) ?></td>
                    <td><?= h($transfer->manager) ?></td>
                    <td><?= $this->Number->format($transfer->branch_warehouse_origin_id) ?></td>
                    <td><?= $transfer->has('branch_warehouse') ? $this->Html->link($transfer->branch_warehouse->id, ['controller' => 'BranchWarehouses', 'action' => 'view', $transfer->branch_warehouse->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $transfer->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transfer->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transfer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transfer->id)]) ?>
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
