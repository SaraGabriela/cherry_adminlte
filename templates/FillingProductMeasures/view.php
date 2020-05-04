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
            <?= $this->Html->link(__('Edit Filling Product Measure'), ['action' => 'edit', $fillingProductMeasure->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Filling Product Measure'), ['action' => 'delete', $fillingProductMeasure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fillingProductMeasure->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Filling Product Measures'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Filling Product Measure'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fillingProductMeasures view content">
            <h3><?= h($fillingProductMeasure->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Filling Product') ?></th>
                    <td><?= $fillingProductMeasure->has('filling_product') ? $this->Html->link($fillingProductMeasure->filling_product->id, ['controller' => 'FillingProducts', 'action' => 'view', $fillingProductMeasure->filling_product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Filling Dimension') ?></th>
                    <td><?= $fillingProductMeasure->has('filling_dimension') ? $this->Html->link($fillingProductMeasure->filling_dimension->id, ['controller' => 'FillingDimensions', 'action' => 'view', $fillingProductMeasure->filling_dimension->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit') ?></th>
                    <td><?= h($fillingProductMeasure->unit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fillingProductMeasure->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($fillingProductMeasure->quantity) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
