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
            <?= $this->Html->link(__('Edit Decoration Product Measure'), ['action' => 'edit', $decorationProductMeasure->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Decoration Product Measure'), ['action' => 'delete', $decorationProductMeasure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decorationProductMeasure->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Decoration Product Measures'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Decoration Product Measure'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="decorationProductMeasures view content">
            <h3><?= h($decorationProductMeasure->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Decoration Dimension') ?></th>
                    <td><?= $decorationProductMeasure->has('decoration_dimension') ? $this->Html->link($decorationProductMeasure->decoration_dimension->id, ['controller' => 'DecorationDimensions', 'action' => 'view', $decorationProductMeasure->decoration_dimension->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Decoration Product') ?></th>
                    <td><?= $decorationProductMeasure->has('decoration_product') ? $this->Html->link($decorationProductMeasure->decoration_product->id, ['controller' => 'DecorationProducts', 'action' => 'view', $decorationProductMeasure->decoration_product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit') ?></th>
                    <td><?= h($decorationProductMeasure->unit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($decorationProductMeasure->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($decorationProductMeasure->quantity) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
