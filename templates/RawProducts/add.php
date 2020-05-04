<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RawProduct $rawProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Raw Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rawProducts form content">
            <?= $this->Form->create($rawProduct) ?>
            <fieldset>
                <legend><?= __('Add Raw Product') ?></legend>
                <?php
                    echo $this->Form->control('raw_id', ['options' => $raws]);
                    echo $this->Form->control('product_id', ['options' => $products]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
