<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductionRecipe $productionRecipe
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Production Recipes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productionRecipes form content">
            <?= $this->Form->create($productionRecipe) ?>
            <fieldset>
                <legend><?= __('Add Production Recipe') ?></legend>
                <?php
                    echo $this->Form->control('production_id', ['options' => $productions]);
                    echo $this->Form->control('recipe_dimension_id', ['options' => $recipeDimensions]);
                    echo $this->Form->control('observations');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
