<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FillingDimension $fillingDimension
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Filling Dimension'), ['action' => 'edit', $fillingDimension->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Filling Dimension'), ['action' => 'delete', $fillingDimension->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fillingDimension->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Filling Dimensions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Filling Dimension'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fillingDimensions view content">
            <h3><?= h($fillingDimension->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Raw Filling') ?></th>
                    <td><?= $fillingDimension->has('raw_filling') ? $this->Html->link($fillingDimension->raw_filling->name, ['controller' => 'RawFillings', 'action' => 'view', $fillingDimension->raw_filling->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Dimension') ?></th>
                    <td><?= $fillingDimension->has('dimension') ? $this->Html->link($fillingDimension->dimension->id, ['controller' => 'Dimensions', 'action' => 'view', $fillingDimension->dimension->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fillingDimension->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Filling Product Measures') ?></h4>
                <?php if (!empty($fillingDimension->filling_product_measures)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Filling Product Id') ?></th>
                            <th><?= __('Filling Dimension Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Unit') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($fillingDimension->filling_product_measures as $fillingProductMeasures) : ?>
                        <tr>
                            <td><?= h($fillingProductMeasures->id) ?></td>
                            <td><?= h($fillingProductMeasures->filling_product_id) ?></td>
                            <td><?= h($fillingProductMeasures->filling_dimension_id) ?></td>
                            <td><?= h($fillingProductMeasures->quantity) ?></td>
                            <td><?= h($fillingProductMeasures->unit) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FillingProductMeasures', 'action' => 'view', $fillingProductMeasures->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FillingProductMeasures', 'action' => 'edit', $fillingProductMeasures->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FillingProductMeasures', 'action' => 'delete', $fillingProductMeasures->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fillingProductMeasures->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
