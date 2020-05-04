<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dimension $dimension
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dimension->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dimension->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Dimensions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="dimensions form content">
            <?= $this->Form->create($dimension) ?>
            <fieldset>
                <legend><?= __('Edit Dimension') ?></legend>
                <?php
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
