<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransferWarehouseProduct $transferWarehouseProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Transfer Warehouse Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transferWarehouseProducts form content">
            <?= $this->Form->create($transferWarehouseProduct) ?>
            <fieldset>
                <legend><?= __('Add Transfer Warehouse Product') ?></legend>
                <?php
                    echo $this->Form->control('warehouse_product_id', ['options' => $warehouseProducts]);
                    echo $this->Form->control('transfer_id', ['options' => $transfers]);
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('unit');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
