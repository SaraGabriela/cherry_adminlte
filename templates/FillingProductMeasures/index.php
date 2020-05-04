<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FillingProductMeasure[]|\Cake\Collection\CollectionInterface $fillingProductMeasures
 */
?>
<div class="fillingProductMeasures index content">
    <?= $this->Html->link(__('New Filling Product Measure'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Filling Product Measures') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('filling_product_id') ?></th>
                    <th><?= $this->Paginator->sort('filling_dimension_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('unit') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fillingProductMeasures as $fillingProductMeasure): ?>
                <tr>
                    <td><?= $this->Number->format($fillingProductMeasure->id) ?></td>
                    <td><?= $fillingProductMeasure->has('filling_product') ? $this->Html->link($fillingProductMeasure->filling_product->id, ['controller' => 'FillingProducts', 'action' => 'view', $fillingProductMeasure->filling_product->id]) : '' ?></td>
                    <td><?= $fillingProductMeasure->has('filling_dimension') ? $this->Html->link($fillingProductMeasure->filling_dimension->id, ['controller' => 'FillingDimensions', 'action' => 'view', $fillingProductMeasure->filling_dimension->id]) : '' ?></td>
                    <td><?= $this->Number->format($fillingProductMeasure->quantity) ?></td>
                    <td><?= h($fillingProductMeasure->unit) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fillingProductMeasure->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fillingProductMeasure->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fillingProductMeasure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fillingProductMeasure->id)]) ?>
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
