<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BranchWarehouse $branchWarehouse
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $branchWarehouse->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $branchWarehouse->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Branch Warehouses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="branchWarehouses form content">
            <?= $this->Form->create($branchWarehouse) ?>
            <fieldset>
                <legend><?= __('Edit Branch Warehouse') ?></legend>
                <?php
                    echo $this->Form->control('warehouse_id', ['options' => $warehouses]);
                    echo $this->Form->control('branch_id', ['options' => $branches]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
