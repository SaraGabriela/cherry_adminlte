<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Production[]|\Cake\Collection\CollectionInterface $productions
 */
?>
<div class="productions index content">
    <?= $this->Html->link(__('New Production'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Productions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('number_cakes') ?></th>
                    <th><?= $this->Paginator->sort('observations') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productions as $production): ?>
                <tr>
                    <td><?= $this->Number->format($production->id) ?></td>
                    <td><?= h($production->date) ?></td>
                    <td><?= $this->Number->format($production->number_cakes) ?></td>
                    <td><?= h($production->observations) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $production->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $production->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $production->id], ['confirm' => __('Are you sure you want to delete # {0}?', $production->id)]) ?>
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
