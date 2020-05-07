<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transformation[]|\Cake\Collection\CollectionInterface $transformations
 */
?>
<div class="transformations index content">
    <?= $this->Html->link(__('New Transformation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Transformations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('final_cake_id') ?></th>
                    <th><?= $this->Paginator->sort('prodrecipe_detail_id') ?></th>
                    <th><?= $this->Paginator->sort('recipe') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('detail') ?></th>
                    <th><?= $this->Paginator->sort('phase') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transformations as $transformation): ?>
                <tr>
                    <td><?= $this->Number->format($transformation->id) ?></td>
                    <td><?= $transformation->has('final_cake') ? $this->Html->link($transformation->final_cake->id, ['controller' => 'FinalCakes', 'action' => 'view', $transformation->final_cake->id]) : '' ?></td>
                    <td><?= $transformation->has('prodrecipe_detail') ? $this->Html->link($transformation->prodrecipe_detail->id, ['controller' => 'ProdrecipeDetails', 'action' => 'view', $transformation->prodrecipe_detail->id]) : '' ?></td>
                    <td><?= $this->Number->format($transformation->recipe) ?></td>
                    <td><?= h($transformation->date) ?></td>
                    <td><?= h($transformation->detail) ?></td>
                    <td><?= $this->Number->format($transformation->phase) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $transformation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transformation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transformation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transformation->id)]) ?>
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
