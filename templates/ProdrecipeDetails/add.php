<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdrecipeDetail $prodrecipeDetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Prodrecipe Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="prodrecipeDetails form content">
            <?= $this->Form->create($prodrecipeDetail) ?>
            <fieldset>
                <legend><?= __('Add Prodrecipe Detail') ?></legend>
                <?php
                    echo $this->Form->control('production_recipe_id', ['options' => $productionRecipes]);
                    echo $this->Form->control('priority');
                    echo $this->Form->control('branch');
                    echo $this->Form->control('observations');
                    echo $this->Form->control('phase');
                    echo $this->Form->control('quantity');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
