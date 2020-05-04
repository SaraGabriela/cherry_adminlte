<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DecorationProductMeasure $decorationProductMeasure
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $decorationProductMeasure->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $decorationProductMeasure->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Decoration Product Measures'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="decorationProductMeasures form content">
            <?= $this->Form->create($decorationProductMeasure) ?>
            <fieldset>
                <legend><?= __('Edit Decoration Product Measure') ?></legend>
                <?php
                    echo $this->Form->control('decoration_dimension_id', ['options' => $decorationDimensions]);
                    echo $this->Form->control('decoration_product_id', ['options' => $decorationProducts]);
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('unit');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
