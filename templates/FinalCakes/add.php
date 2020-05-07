<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FinalCake $finalCake
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Final Cakes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="finalCakes form content">
            <?= $this->Form->create($finalCake) ?>
            <fieldset>
                <legend><?= __('Add Final Cake') ?></legend>
                <?php
                    echo $this->Form->control('cake_id', ['options' => $cakes]);
                    echo $this->Form->control('production_recipe_id', ['options' => $productionRecipes]);
                    echo $this->Form->control('price');
                    echo $this->Form->control('arrival_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
