<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RecipeProductMeasure $recipeProductMeasure
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Recipe Product Measure'), ['action' => 'edit', $recipeProductMeasure->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Recipe Product Measure'), ['action' => 'delete', $recipeProductMeasure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipeProductMeasure->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Recipe Product Measures'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Recipe Product Measure'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="recipeProductMeasures view content">
            <h3><?= h($recipeProductMeasure->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Raw Product') ?></th>
                    <td><?= $recipeProductMeasure->has('raw_product') ? $this->Html->link($recipeProductMeasure->raw_product->id, ['controller' => 'RawProducts', 'action' => 'view', $recipeProductMeasure->raw_product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Raw Recipe') ?></th>
                    <td><?= $recipeProductMeasure->has('raw_recipe') ? $this->Html->link($recipeProductMeasure->raw_recipe->id, ['controller' => 'RawRecipes', 'action' => 'view', $recipeProductMeasure->raw_recipe->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit') ?></th>
                    <td><?= h($recipeProductMeasure->unit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($recipeProductMeasure->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($recipeProductMeasure->quantity) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
