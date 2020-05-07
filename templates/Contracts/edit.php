<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contract->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Contracts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contracts form content">
            <?= $this->Form->create($contract) ?>
            <fieldset>
                <legend><?= __('Edit Contract') ?></legend>
                <?php
                    echo $this->Form->control('client_id', ['options' => $clients, 'empty' => true]);
                    echo $this->Form->control('production_id', ['options' => $productions]);
                    echo $this->Form->control('alliance_id', ['options' => $alliances, 'empty' => true]);
                    echo $this->Form->control('order_date');
                    echo $this->Form->control('delivery_date');
                    echo $this->Form->control('total_price');
                    echo $this->Form->control('account_price');
                    echo $this->Form->control('description');
                    echo $this->Form->control('ubication');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
