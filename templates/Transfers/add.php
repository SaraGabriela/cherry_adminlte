<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transfer $transfer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Transfers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transfers form content">
            <?= $this->Form->create($transfer) ?>
            <fieldset>
                <legend><?= __('Add Transfer') ?></legend>
                <?php
                    echo $this->Form->control('date');
                    echo $this->Form->control('manager');
                    echo $this->Form->control('branch_warehouse_origin_id');
                    echo $this->Form->control('branch_warehouse_destiny_id', ['options' => $branchWarehouses]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
