<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CakeSale[]|\Cake\Collection\CollectionInterface $cakeSales
 */
?>
<div class="cakeSales index content">
    <?= $this->Html->link(__('New Cake Sale'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cake Sales') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('cake_id') ?></th>
                    <th><?= $this->Paginator->sort('alliance_id') ?></th>
                    <th><?= $this->Paginator->sort('branch') ?></th>
                    <th><?= $this->Paginator->sort('sale_date') ?></th>
                    <th><?= $this->Paginator->sort('sale_price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cakeSales as $cakeSale): ?>
                <tr>
                    <td><?= $this->Number->format($cakeSale->id) ?></td>
                    <td><?= $cakeSale->has('cake') ? $this->Html->link($cakeSale->cake->name, ['controller' => 'Cakes', 'action' => 'view', $cakeSale->cake->id]) : '' ?></td>
                    <td><?= $cakeSale->has('alliance') ? $this->Html->link($cakeSale->alliance->id, ['controller' => 'Alliances', 'action' => 'view', $cakeSale->alliance->id]) : '' ?></td>
                    <td><?= h($cakeSale->branch) ?></td>
                    <td><?= h($cakeSale->sale_date) ?></td>
                    <td><?= $this->Number->format($cakeSale->sale_price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cakeSale->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cakeSale->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cakeSale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cakeSale->id)]) ?>
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
