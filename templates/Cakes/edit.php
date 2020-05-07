<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cake $cake
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cake->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cake->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cakes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cakes form content">
            <?= $this->Form->create($cake) ?>
            <fieldset>
                <legend><?= __('Edit Cake') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('code');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
