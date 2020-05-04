<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FillingProductMeasure $fillingProductMeasure
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Filling Product Measures'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fillingProductMeasures form content">
            <?= $this->Form->create($fillingProductMeasure) ?>
            <fieldset>
                <legend><?= __('Add Filling Product Measure') ?></legend>
                <?php
                    echo $this->Form->control('filling_product_id', ['options' => $fillingProducts]);
                    echo $this->Form->control('filling_dimension_id', ['options' => $fillingDimensions]);
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('unit');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
