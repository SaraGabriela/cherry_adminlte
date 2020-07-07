<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductionRecipe[]|\Cake\Collection\CollectionInterface $productionRecipes
 */
?>
<div class="productionRecipes index content">
    <?= $this->Html->link(__('New Production Recipe'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Production Recipes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('production_id') ?></th>
                    <th><?= $this->Paginator->sort('recipe_dimension_id') ?></th>
                    <th><?= $this->Paginator->sort('observations') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productionRecipes as $productionRecipe): ?>
                <tr>
                    <td><?= $this->Number->format($productionRecipe->id) ?></td>
                    <td><?= $productionRecipe->has('production') ? $this->Html->link($productionRecipe->production->id, ['controller' => 'Productions', 'action' => 'view', $productionRecipe->production->id]) : '' ?></td>
                    <td><?= $productionRecipe->has('recipe_dimension') ? $this->Html->link($productionRecipe->recipe_dimension->recipe_dimensions_id, ['controller' => 'RecipeDimensions', 'action' => 'view', $productionRecipe->recipe_dimension->recipe_dimensions_id]) : '' ?></td>
                    <td><?= h($productionRecipe->observations) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $productionRecipe->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productionRecipe->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productionRecipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productionRecipe->id)]) ?>
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
