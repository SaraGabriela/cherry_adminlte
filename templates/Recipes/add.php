<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Recipes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="recipes form content">
            <?= $this->Form->create($recipe) ?>
            <fieldset>
                <legend><?= __('Add Recipe') ?></legend>
                <?php
                    echo $this->Form->control('dimension_id', ['options' => $dimensions]);
                    echo $this->Form->control('raw_id', ['options' => $raws]);
                    echo $this->Form->control('raw_filling_id', ['options' => $rawFillings]);
                    echo $this->Form->control('decoration_id', ['options' => $decorations]);
                    echo $this->Form->control('cake_id');
                    echo $this->Form->control('cooking_time');
                    echo $this->Form->control('special_order');
                    echo $this->Form->control('price');
                    echo $this->Form->control('observations');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
