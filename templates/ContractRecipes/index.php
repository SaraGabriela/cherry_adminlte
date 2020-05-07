<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContractRecipe[]|\Cake\Collection\CollectionInterface $contractRecipes
 */
?>
<div class="contractRecipes index content">
    <?= $this->Html->link(__('New Contract Recipe'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Contract Recipes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('contract_id') ?></th>
                    <th><?= $this->Paginator->sort('recipe_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contractRecipes as $contractRecipe): ?>
                <tr>
                    <td><?= $this->Number->format($contractRecipe->id) ?></td>
                    <td><?= $contractRecipe->has('contract') ? $this->Html->link($contractRecipe->contract->id, ['controller' => 'Contracts', 'action' => 'view', $contractRecipe->contract->id]) : '' ?></td>
                    <td><?= $contractRecipe->has('recipe') ? $this->Html->link($contractRecipe->recipe->id, ['controller' => 'Recipes', 'action' => 'view', $contractRecipe->recipe->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contractRecipe->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contractRecipe->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contractRecipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractRecipe->id)]) ?>
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
