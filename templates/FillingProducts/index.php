<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FillingProduct[]|\Cake\Collection\CollectionInterface $fillingProducts
 */
?>
<div class="fillingProducts index content">
    <?= $this->Html->link(__('New Filling Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Filling Products') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('raw_filling_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fillingProducts as $fillingProduct): ?>
                <tr>
                    <td><?= $this->Number->format($fillingProduct->id) ?></td>
                    <td><?= $fillingProduct->has('raw_filling') ? $this->Html->link($fillingProduct->raw_filling->name, ['controller' => 'RawFillings', 'action' => 'view', $fillingProduct->raw_filling->id]) : '' ?></td>
                    <td><?= $fillingProduct->has('product') ? $this->Html->link($fillingProduct->product->name, ['controller' => 'Products', 'action' => 'view', $fillingProduct->product->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fillingProduct->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fillingProduct->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fillingProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fillingProduct->id)]) ?>
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
