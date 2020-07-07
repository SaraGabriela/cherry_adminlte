<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransferProductionRecipe[]|\Cake\Collection\CollectionInterface $transferProductionRecipes
 */
?>
<div class="transferProductionRecipes index content">
    <?= $this->Html->link(__('New Transfer Production Recipe'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Transfer Production Recipes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('transfer_id') ?></th>
                    <th><?= $this->Paginator->sort('prodrecipe_details_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transferProductionRecipes as $transferProductionRecipe): ?>
                <tr>
                    <td><?= $this->Number->format($transferProductionRecipe->id) ?></td>
                    <td><?= $transferProductionRecipe->has('transfer') ? $this->Html->link($transferProductionRecipe->transfer->id, ['controller' => 'Transfers', 'action' => 'view', $transferProductionRecipe->transfer->id]) : '' ?></td>
                    <td><?= $transferProductionRecipe->has('prodrecipe_detail') ? $this->Html->link($transferProductionRecipe->prodrecipe_detail->id, ['controller' => 'ProdrecipeDetails', 'action' => 'view', $transferProductionRecipe->prodrecipe_detail->id]) : '' ?></td>
                    <td><?= $this->Number->format($transferProductionRecipe->quantity) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $transferProductionRecipe->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transferProductionRecipe->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transferProductionRecipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferProductionRecipe->id)]) ?>
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
