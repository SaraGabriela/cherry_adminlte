<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RawRecipe $rawRecipe
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Raw Recipes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rawRecipes form content">
            <?= $this->Form->create($rawRecipe) ?>
            <fieldset>
                <legend><?= __('Add Raw Recipe') ?></legend>
                <?php
                    echo $this->Form->control('recipes_quantity');
                    echo $this->Form->control('unit');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
