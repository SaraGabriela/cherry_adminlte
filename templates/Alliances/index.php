<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Alliance[]|\Cake\Collection\CollectionInterface $alliances
 */
?>
<div class="alliances index content">
    <?= $this->Html->link(__('New Alliance'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Alliances') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('client') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('ticket_value') ?></th>
                    <th><?= $this->Paginator->sort('ticket_quantity') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alliances as $alliance): ?>
                <tr>
                    <td><?= $this->Number->format($alliance->id) ?></td>
                    <td><?= h($alliance->client) ?></td>
                    <td><?= h($alliance->date) ?></td>
                    <td><?= $this->Number->format($alliance->ticket_value) ?></td>
                    <td><?= $this->Number->format($alliance->ticket_quantity) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $alliance->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $alliance->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $alliance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alliance->id)]) ?>
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
