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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recipeDimension->recipe_dimensions_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recipeDimension->recipe_dimensions_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Recipe Dimensions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="recipeDimensions form content">
            <?= $this->Form->create($recipeDimension) ?>
            <fieldset>
                <legend><?= __('Edit Recipe Dimension') ?></legend>
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
