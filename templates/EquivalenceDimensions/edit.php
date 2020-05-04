<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EquivalenceDimension $equivalenceDimension
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $equivalenceDimension->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $equivalenceDimension->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Equivalence Dimensions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="equivalenceDimensions form content">
            <?= $this->Form->create($equivalenceDimension) ?>
            <fieldset>
                <legend><?= __('Edit Equivalence Dimension') ?></legend>
                <?php
                    echo $this->Form->control('equivalence_id', ['options' => $equivalences]);
                    echo $this->Form->control('dimension_id', ['options' => $dimensions]);
                    echo $this->Form->control('quantity_recipes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
