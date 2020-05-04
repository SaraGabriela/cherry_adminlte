<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FillingDimension $fillingDimension
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Filling Dimensions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fillingDimensions form content">
            <?= $this->Form->create($fillingDimension) ?>
            <fieldset>
                <legend><?= __('Add Filling Dimension') ?></legend>
                <?php
                    echo $this->Form->control('raw_filling_id', ['options' => $rawFillings]);
                    echo $this->Form->control('dimension_id', ['options' => $dimensions]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
