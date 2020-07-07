<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RecipeDimension $recipeDimension
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Recipe Dimensions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="recipeDimensions form content">
            <?= $this->Form->create($recipeDimension) ?>
            <fieldset>
                <legend><?= __('Add Recipe Dimension') ?></legend>
                <?php
                    echo $this->Form->control('dimension_id', ['options' => $dimensions]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('recipe_id', ['options' => $recipes]);
                    echo $this->Form->control('price');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
