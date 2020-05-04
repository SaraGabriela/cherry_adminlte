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
            <?= $this->Html->link(__('Edit Decoration Dimension'), ['action' => 'edit', $decorationDimension->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Decoration Dimension'), ['action' => 'delete', $decorationDimension->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decorationDimension->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Decoration Dimensions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Decoration Dimension'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="decorationDimensions view content">
            <h3><?= h($decorationDimension->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Decoration') ?></th>
                    <td><?= $decorationDimension->has('decoration') ? $this->Html->link($decorationDimension->decoration->id, ['controller' => 'Decorations', 'action' => 'view', $decorationDimension->decoration->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Dimension') ?></th>
                    <td><?= $decorationDimension->has('dimension') ? $this->Html->link($decorationDimension->dimension->id, ['controller' => 'Dimensions', 'action' => 'view', $decorationDimension->dimension->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($decorationDimension->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Decoration Product Measures') ?></h4>
                <?php if (!empty($decorationDimension->decoration_product_measures)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Decoration Dimension Id') ?></th>
                            <th><?= __('Decoration Product Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Unit') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($decorationDimension->decoration_product_measures as $decorationProductMeasures) : ?>
                        <tr>
                            <td><?= h($decorationProductMeasures->id) ?></td>
                            <td><?= h($decorationProductMeasures->decoration_dimension_id) ?></td>
                            <td><?= h($decorationProductMeasures->decoration_product_id) ?></td>
                            <td><?= h($decorationProductMeasures->quantity) ?></td>
                            <td><?= h($decorationProductMeasures->unit) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DecorationProductMeasures', 'action' => 'view', $decorationProductMeasures->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DecorationProductMeasures', 'action' => 'edit', $decorationProductMeasures->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DecorationProductMeasures', 'action' => 'delete', $decorationProductMeasures->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decorationProductMeasures->id)]) ?>
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
