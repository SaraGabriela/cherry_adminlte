<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DecorationProductMeasure[]|\Cake\Collection\CollectionInterface $decorationProductMeasures
 */
?>
<div class="decorationProductMeasures index content">
    <?= $this->Html->link(__('New Decoration Product Measure'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Decoration Product Measures') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('decoration_dimension_id') ?></th>
                    <th><?= $this->Paginator->sort('decoration_product_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('unit') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($decorationProductMeasures as $decorationProductMeasure): ?>
                <tr>
                    <td><?= $this->Number->format($decorationProductMeasure->id) ?></td>
                    <td><?= $decorationProductMeasure->has('decoration_dimension') ? $this->Html->link($decorationProductMeasure->decoration_dimension->id, ['controller' => 'DecorationDimensions', 'action' => 'view', $decorationProductMeasure->decoration_dimension->id]) : '' ?></td>
                    <td><?= $decorationProductMeasure->has('decoration_product') ? $this->Html->link($decorationProductMeasure->decoration_product->id, ['controller' => 'DecorationProducts', 'action' => 'view', $decorationProductMeasure->decoration_product->id]) : '' ?></td>
                    <td><?= $this->Number->format($decorationProductMeasure->quantity) ?></td>
                    <td><?= h($decorationProductMeasure->unit) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $decorationProductMeasure->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $decorationProductMeasure->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $decorationProductMeasure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decorationProductMeasure->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
