<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DecorationProduct $decorationProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Decoration Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="decorationProducts form content">
            <?= $this->Form->create($decorationProduct) ?>
            <fieldset>
                <legend><?= __('Add Decoration Product') ?></legend>
                <?php
                    echo $this->Form->control('decoration_id', ['options' => $decorations]);
                    echo $this->Form->control('product_id', ['options' => $products]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
