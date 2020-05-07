<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PreparationProduct[]|\Cake\Collection\CollectionInterface $preparationProducts
 */
?>
<div class="preparationProducts index content">
    <?= $this->Html->link(__('New Preparation Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Preparation Products') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('previous_preparation_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('unit') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($preparationProducts as $preparationProduct): ?>
                <tr>
                    <td><?= $this->Number->format($preparationProduct->id) ?></td>
                    <td><?= $preparationProduct->has('previous_preparation') ? $this->Html->link($preparationProduct->previous_preparation->id, ['controller' => 'PreviousPreparations', 'action' => 'view', $preparationProduct->previous_preparation->id]) : '' ?></td>
                    <td><?= $preparationProduct->has('product') ? $this->Html->link($preparationProduct->product->name, ['controller' => 'Products', 'action' => 'view', $preparationProduct->product->id]) : '' ?></td>
                    <td><?= $this->Number->format($preparationProduct->quantity) ?></td>
                    <td><?= h($preparationProduct->unit) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $preparationProduct->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $preparationProduct->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $preparationProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $preparationProduct->id)]) ?>
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
