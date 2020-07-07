<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseProduct $purchaseProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $purchaseProduct->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseProduct->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Purchase Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchaseProducts form content">
            <?= $this->Form->create($purchaseProduct) ?>
            <fieldset>
                <legend><?= __('Edit Purchase Product') ?></legend>
                <?php
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('unit');
                    echo $this->Form->control('observations');
                    echo $this->Form->control('cost_by_unit');
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('purchase_id', ['options' => $purchases]);
                    echo $this->Form->control('warehouse_id', ['options' => $warehouses]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
