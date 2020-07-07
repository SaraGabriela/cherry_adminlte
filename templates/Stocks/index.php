<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock[]|\Cake\Collection\CollectionInterface $stocks
 */
?>
<div class="stocks index content">
    <?= $this->Html->link(__('New Stock'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Stocks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('stock_id') ?></th>
                    <th><?= $this->Paginator->sort('recipe_dimensions_id') ?></th>
                    <th><?= $this->Paginator->sort('branch_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stocks as $stock): ?>
                <tr>
                    <td><?= $this->Number->format($stock->stock_id) ?></td>
                    <td><?= $stock->has('recipe_dimension') ? $this->Html->link($stock->recipe_dimension->recipe_dimensions_id, ['controller' => 'RecipeDimensions', 'action' => 'view', $stock->recipe_dimension->recipe_dimensions_id]) : '' ?></td>
                    <td><?= $stock->has('branch') ? $this->Html->link($stock->branch->name, ['controller' => 'Branches', 'action' => 'view', $stock->branch->id]) : '' ?></td>
                    <td><?= $this->Number->format($stock->quantity) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $stock->stock_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stock->stock_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stock->stock_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stock->stock_id)]) ?>
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
