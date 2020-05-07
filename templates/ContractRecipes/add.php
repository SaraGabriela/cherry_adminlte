<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContractRecipe $contractRecipe
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Contract Recipes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contractRecipes form content">
            <?= $this->Form->create($contractRecipe) ?>
            <fieldset>
                <legend><?= __('Add Contract Recipe') ?></legend>
                <?php
                    echo $this->Form->control('contract_id', ['options' => $contracts]);
                    echo $this->Form->control('recipe_id', ['options' => $recipes]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
