<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PreviousPreparation $previousPreparation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $previousPreparation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $previousPreparation->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Previous Preparations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="previousPreparations form content">
            <?= $this->Form->create($previousPreparation) ?>
            <fieldset>
                <legend><?= __('Edit Previous Preparation') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('quantity_produced');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
