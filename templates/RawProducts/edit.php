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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rawProduct->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rawProduct->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Raw Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rawProducts form content">
            <?= $this->Form->create($rawProduct) ?>
            <fieldset>
                <legend><?= __('Edit Raw Product') ?></legend>
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
