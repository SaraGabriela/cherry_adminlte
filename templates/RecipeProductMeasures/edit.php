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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recipeProductMeasure->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recipeProductMeasure->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Recipe Product Measures'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="recipeProductMeasures form content">
            <?= $this->Form->create($recipeProductMeasure) ?>
            <fieldset>
                <legend><?= __('Edit Recipe Product Measure') ?></legend>
                <?php
                    echo $this->Form->control('raw_product_id', ['options' => $rawProducts]);
                    echo $this->Form->control('raw_recipe_id', ['options' => $rawRecipes]);
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('unit');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
