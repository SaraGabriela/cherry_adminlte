<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdrecipeDetail[]|\Cake\Collection\CollectionInterface $prodrecipeDetails
 */
?>
<div class="prodrecipeDetails index content">
    <?= $this->Html->link(__('New Prodrecipe Detail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Prodrecipe Details') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('production_recipe_id') ?></th>
                    <th><?= $this->Paginator->sort('branch_warehouse_id') ?></th>
                    <th><?= $this->Paginator->sort('cake_phase') ?></th>
                    <th><?= $this->Paginator->sort('current_ubication') ?></th>
                    <th><?= $this->Paginator->sort('special_order') ?></th>
                    <th><?= $this->Paginator->sort('priority') ?></th>
                    <th><?= $this->Paginator->sort('branch') ?></th>
                    <th><?= $this->Paginator->sort('observations') ?></th>
                    <th><?= $this->Paginator->sort('date_phase_change') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prodrecipeDetails as $prodrecipeDetail): ?>
                <tr>
                    <td><?= $this->Number->format($prodrecipeDetail->id) ?></td>
                    <td><?= $prodrecipeDetail->has('production_recipe') ? $this->Html->link($prodrecipeDetail->production_recipe->id, ['controller' => 'ProductionRecipes', 'action' => 'view', $prodrecipeDetail->production_recipe->id]) : '' ?></td>
                    <td><?= $prodrecipeDetail->has('branch_warehouse') ? $this->Html->link($prodrecipeDetail->branch_warehouse->id, ['controller' => 'BranchWarehouses', 'action' => 'view', $prodrecipeDetail->branch_warehouse->id]) : '' ?></td>
                    <td><?= $this->Number->format($prodrecipeDetail->cake_phase) ?></td>
                    <td><?= h($prodrecipeDetail->current_ubication) ?></td>
                    <td><?= h($prodrecipeDetail->special_order) ?></td>
                    <td><?= $this->Number->format($prodrecipeDetail->priority) ?></td>
                    <td><?= h($prodrecipeDetail->branch) ?></td>
                    <td><?= h($prodrecipeDetail->observations) ?></td>
                    <td><?= h($prodrecipeDetail->date_phase_change) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $prodrecipeDetail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prodrecipeDetail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prodrecipeDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodrecipeDetail->id)]) ?>
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
