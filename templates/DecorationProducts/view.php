<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DecorationProduct $decorationProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Decoration Product'), ['action' => 'edit', $decorationProduct->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Decoration Product'), ['action' => 'delete', $decorationProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decorationProduct->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Decoration Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Decoration Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="decorationProducts view content">
            <h3><?= h($decorationProduct->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Decoration') ?></th>
                    <td><?= $decorationProduct->has('decoration') ? $this->Html->link($decorationProduct->decoration->id, ['controller' => 'Decorations', 'action' => 'view', $decorationProduct->decoration->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $decorationProduct->has('product') ? $this->Html->link($decorationProduct->product->name, ['controller' => 'Products', 'action' => 'view', $decorationProduct->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($decorationProduct->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Decoration Product Measures') ?></h4>
                <?php if (!empty($decorationProduct->decoration_product_measures)) : ?>
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
                        <?php foreach ($decorationProduct->decoration_product_measures as $decorationProductMeasures) : ?>
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
