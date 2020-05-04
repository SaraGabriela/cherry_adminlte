<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RawProduct[]|\Cake\Collection\CollectionInterface $rawProducts
 */
?>
<div class="rawProducts index content">
    <?= $this->Html->link(__('New Raw Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Raw Products') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('raw_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rawProducts as $rawProduct): ?>
                <tr>
                    <td><?= $this->Number->format($rawProduct->id) ?></td>
                    <td><?= $rawProduct->has('raw') ? $this->Html->link($rawProduct->raw->name, ['controller' => 'Raws', 'action' => 'view', $rawProduct->raw->id]) : '' ?></td>
                    <td><?= $rawProduct->has('product') ? $this->Html->link($rawProduct->product->name, ['controller' => 'Products', 'action' => 'view', $rawProduct->product->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $rawProduct->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rawProduct->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rawProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rawProduct->id)]) ?>
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
