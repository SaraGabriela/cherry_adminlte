<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CakeSale $cakeSale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cakeSale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cakeSale->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cake Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cakeSales form content">
            <?= $this->Form->create($cakeSale) ?>
            <fieldset>
                <legend><?= __('Edit Cake Sale') ?></legend>
                <?php
                    echo $this->Form->control('cake_id', ['options' => $cakes]);
                    echo $this->Form->control('alliance_id', ['options' => $alliances]);
                    echo $this->Form->control('branch');
                    echo $this->Form->control('sale_date');
                    echo $this->Form->control('sale_price');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
