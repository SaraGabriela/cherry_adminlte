<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cake[]|\Cake\Collection\CollectionInterface $cakes
 */
?>
<div class="cakes index content">
    <?= $this->Html->link(__('New Cake'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cakes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cakes as $cake): ?>
                <tr>
                    <td><?= $this->Number->format($cake->id) ?></td>
                    <td><?= h($cake->name) ?></td>
                    <td><?= h($cake->description) ?></td>
                    <td><?= h($cake->code) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cake->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cake->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cake->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cake->id)]) ?>
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
