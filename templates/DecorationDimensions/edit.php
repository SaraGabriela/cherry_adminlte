<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DecorationDimension $decorationDimension
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $decorationDimension->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $decorationDimension->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Decoration Dimensions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="decorationDimensions form content">
            <?= $this->Form->create($decorationDimension) ?>
            <fieldset>
                <legend><?= __('Edit Decoration Dimension') ?></legend>
                <?php
                    echo $this->Form->control('decoration_id', ['options' => $decorations]);
                    echo $this->Form->control('dimension_id', ['options' => $dimensions]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
