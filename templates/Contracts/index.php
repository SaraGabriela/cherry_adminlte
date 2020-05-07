<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract[]|\Cake\Collection\CollectionInterface $contracts
 */
?>
<div class="contracts index content">
    <?= $this->Html->link(__('New Contract'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Contracts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <th><?= $this->Paginator->sort('production_id') ?></th>
                    <th><?= $this->Paginator->sort('alliance_id') ?></th>
                    <th><?= $this->Paginator->sort('order_date') ?></th>
                    <th><?= $this->Paginator->sort('delivery_date') ?></th>
                    <th><?= $this->Paginator->sort('total_price') ?></th>
                    <th><?= $this->Paginator->sort('account_price') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('ubication') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contracts as $contract): ?>
                <tr>
                    <td><?= $this->Number->format($contract->id) ?></td>
                    <td><?= $contract->has('client') ? $this->Html->link($contract->client->name, ['controller' => 'Clients', 'action' => 'view', $contract->client->id]) : '' ?></td>
                    <td><?= $contract->has('production') ? $this->Html->link($contract->production->id, ['controller' => 'Productions', 'action' => 'view', $contract->production->id]) : '' ?></td>
                    <td><?= $contract->has('alliance') ? $this->Html->link($contract->alliance->id, ['controller' => 'Alliances', 'action' => 'view', $contract->alliance->id]) : '' ?></td>
                    <td><?= h($contract->order_date) ?></td>
                    <td><?= h($contract->delivery_date) ?></td>
                    <td><?= $this->Number->format($contract->total_price) ?></td>
                    <td><?= $this->Number->format($contract->account_price) ?></td>
                    <td><?= h($contract->description) ?></td>
                    <td><?= h($contract->ubication) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contract->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contract->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id)]) ?>
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
