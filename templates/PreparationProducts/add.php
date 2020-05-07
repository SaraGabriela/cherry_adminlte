<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PreparationProduct $preparationProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Preparation Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="preparationProducts form content">
            <?= $this->Form->create($preparationProduct) ?>
            <fieldset>
                <legend><?= __('Add Preparation Product') ?></legend>
                <?php
                    echo $this->Form->control('previous_preparation_id', ['options' => $previousPreparations]);
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('unit');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
