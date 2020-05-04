<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FillingDimension[]|\Cake\Collection\CollectionInterface $fillingDimensions
 */
?>
<div class="fillingDimensions index content">
    <?= $this->Html->link(__('New Filling Dimension'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Filling Dimensions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('raw_filling_id') ?></th>
                    <th><?= $this->Paginator->sort('dimension_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fillingDimensions as $fillingDimension): ?>
                <tr>
                    <td><?= $this->Number->format($fillingDimension->id) ?></td>
                    <td><?= $fillingDimension->has('raw_filling') ? $this->Html->link($fillingDimension->raw_filling->name, ['controller' => 'RawFillings', 'action' => 'view', $fillingDimension->raw_filling->id]) : '' ?></td>
                    <td><?= $fillingDimension->has('dimension') ? $this->Html->link($fillingDimension->dimension->id, ['controller' => 'Dimensions', 'action' => 'view', $fillingDimension->dimension->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fillingDimension->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fillingDimension->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fillingDimension->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fillingDimension->id)]) ?>
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
