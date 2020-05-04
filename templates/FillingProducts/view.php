<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FillingProduct $fillingProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Filling Product'), ['action' => 'edit', $fillingProduct->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Filling Product'), ['action' => 'delete', $fillingProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fillingProduct->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Filling Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Filling Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fillingProducts view content">
            <h3><?= h($fillingProduct->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Raw Filling') ?></th>
                    <td><?= $fillingProduct->has('raw_filling') ? $this->Html->link($fillingProduct->raw_filling->name, ['controller' => 'RawFillings', 'action' => 'view', $fillingProduct->raw_filling->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $fillingProduct->has('product') ? $this->Html->link($fillingProduct->product->name, ['controller' => 'Products', 'action' => 'view', $fillingProduct->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fillingProduct->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Filling Product Measures') ?></h4>
                <?php if (!empty($fillingProduct->filling_product_measures)) : ?>
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
                        <?php foreach ($fillingProduct->filling_product_measures as $fillingProductMeasures) : ?>
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
