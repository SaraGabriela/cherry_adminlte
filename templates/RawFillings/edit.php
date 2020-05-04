<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RawFilling $rawFilling
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rawFilling->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rawFilling->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Raw Fillings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rawFillings form content">
            <?= $this->Form->create($rawFilling) ?>
            <fieldset>
                <legend><?= __('Edit Raw Filling') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('code');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
