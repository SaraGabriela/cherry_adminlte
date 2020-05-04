<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DecorationDimension[]|\Cake\Collection\CollectionInterface $decorationDimensions
 */
?>
<div class="decorationDimensions index content">
    <?= $this->Html->link(__('New Decoration Dimension'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Decoration Dimensions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('decoration_id') ?></th>
                    <th><?= $this->Paginator->sort('dimension_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($decorationDimensions as $decorationDimension): ?>
                <tr>
                    <td><?= $this->Number->format($decorationDimension->id) ?></td>
                    <td><?= $decorationDimension->has('decoration') ? $this->Html->link($decorationDimension->decoration->id, ['controller' => 'Decorations', 'action' => 'view', $decorationDimension->decoration->id]) : '' ?></td>
                    <td><?= $decorationDimension->has('dimension') ? $this->Html->link($decorationDimension->dimension->id, ['controller' => 'Dimensions', 'action' => 'view', $decorationDimension->dimension->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $decorationDimension->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $decorationDimension->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $decorationDimension->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decorationDimension->id)]) ?>
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
