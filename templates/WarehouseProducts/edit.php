<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WarehouseProduct $warehouseProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $warehouseProduct->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $warehouseProduct->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Warehouse Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="warehouseProducts form content">
            <?= $this->Form->create($warehouseProduct) ?>
            <fieldset>
                <legend><?= __('Edit Warehouse Product') ?></legend>
                <?php
                    echo $this->Form->control('branch_warehouse_id', ['options' => $branchWarehouses]);
                    echo $this->Form->control('current_stock');
                    echo $this->Form->control('unit');
                    echo $this->Form->control('date');
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('previous_stock');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
