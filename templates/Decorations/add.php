<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Decoration $decoration
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Decorations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="decorations form content">
            <?= $this->Form->create($decoration) ?>
            <fieldset>
                <legend><?= __('Add Decoration') ?></legend>
                <?php
                    echo $this->Form->control('description');
                    echo $this->Form->control('code');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
