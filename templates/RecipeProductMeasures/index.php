<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RecipeProductMeasure[]|\Cake\Collection\CollectionInterface $recipeProductMeasures
 */
?>
<div class="recipeProductMeasures index content">
    <?= $this->Html->link(__('New Recipe Product Measure'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Recipe Product Measures') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('raw_product_id') ?></th>
                    <th><?= $this->Paginator->sort('raw_recipe_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('unit') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recipeProductMeasures as $recipeProductMeasure): ?>
                <tr>
                    <td><?= $this->Number->format($recipeProductMeasure->id) ?></td>
                    <td><?= $recipeProductMeasure->has('raw_product') ? $this->Html->link($recipeProductMeasure->raw_product->id, ['controller' => 'RawProducts', 'action' => 'view', $recipeProductMeasure->raw_product->id]) : '' ?></td>
                    <td><?= $recipeProductMeasure->has('raw_recipe') ? $this->Html->link($recipeProductMeasure->raw_recipe->id, ['controller' => 'RawRecipes', 'action' => 'view', $recipeProductMeasure->raw_recipe->id]) : '' ?></td>
                    <td><?= $this->Number->format($recipeProductMeasure->quantity) ?></td>
                    <td><?= h($recipeProductMeasure->unit) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $recipeProductMeasure->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recipeProductMeasure->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recipeProductMeasure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipeProductMeasure->id)]) ?>
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
