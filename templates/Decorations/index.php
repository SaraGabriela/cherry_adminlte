<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Decoration[]|\Cake\Collection\CollectionInterface $decorations
 */
?>
<div class="decorations index content">
    <?= $this->Html->link(__('New Decoration'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Decorations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($decorations as $decoration): ?>
                <tr>
                    <td><?= $this->Number->format($decoration->id) ?></td>
                    <td><?= h($decoration->description) ?></td>
                    <td><?= h($decoration->code) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $decoration->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $decoration->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $decoration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decoration->id)]) ?>
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
