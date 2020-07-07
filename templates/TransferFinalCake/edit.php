<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransferFinalCake $transferFinalCake
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transferFinalCake->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transferFinalCake->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Transfer Final Cake'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transferFinalCake form content">
            <?= $this->Form->create($transferFinalCake) ?>
            <fieldset>
                <legend><?= __('Edit Transfer Final Cake') ?></legend>
                <?php
                    echo $this->Form->control('transfer_id', ['options' => $transfers]);
                    echo $this->Form->control('final_cake_id', ['options' => $finalCakes]);
                    echo $this->Form->control('quantity');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
