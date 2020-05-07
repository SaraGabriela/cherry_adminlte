<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Alliance $alliance
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $alliance->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $alliance->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Alliances'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="alliances form content">
            <?= $this->Form->create($alliance) ?>
            <fieldset>
                <legend><?= __('Edit Alliance') ?></legend>
                <?php
                    echo $this->Form->control('client');
                    echo $this->Form->control('date');
                    echo $this->Form->control('ticket_value');
                    echo $this->Form->control('ticket_quantity');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
