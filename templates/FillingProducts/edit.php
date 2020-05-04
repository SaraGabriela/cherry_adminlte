<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FillingProduct $fillingProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fillingProduct->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fillingProduct->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Filling Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fillingProducts form content">
            <?= $this->Form->create($fillingProduct) ?>
            <fieldset>
                <legend><?= __('Edit Filling Product') ?></legend>
                <?php
                    echo $this->Form->control('raw_filling_id', ['options' => $rawFillings]);
                    echo $this->Form->control('product_id', ['options' => $products]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
