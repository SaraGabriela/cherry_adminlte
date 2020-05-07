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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productionRecipe->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productionRecipe->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Production Recipes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productionRecipes form content">
            <?= $this->Form->create($productionRecipe) ?>
            <fieldset>
                <legend><?= __('Edit Production Recipe') ?></legend>
                <?php
                    echo $this->Form->control('production_id', ['options' => $productions]);
                    echo $this->Form->control('recipe_id', ['options' => $recipes]);
                    echo $this->Form->control('observations');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
