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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $decoration->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $decoration->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Decorations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="decorations form content">
            <?= $this->Form->create($decoration) ?>
            <fieldset>
                <legend><?= __('Edit Decoration') ?></legend>
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
