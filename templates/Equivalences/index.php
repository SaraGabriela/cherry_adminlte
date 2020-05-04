<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equivalence[]|\Cake\Collection\CollectionInterface $equivalences
 */
?>
<div class="equivalences index content">
    <?= $this->Html->link(__('New Equivalence'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Equivalences') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equivalences as $equivalence): ?>
                <tr>
                    <td><?= $this->Number->format($equivalence->id) ?></td>
                    <td><?= h($equivalence->description) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $equivalence->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $equivalence->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $equivalence->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equivalence->id)]) ?>
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
