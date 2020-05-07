<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FinalCake[]|\Cake\Collection\CollectionInterface $finalCakes
 */
?>
<div class="finalCakes index content">
    <?= $this->Html->link(__('New Final Cake'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Final Cakes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('cake_id') ?></th>
                    <th><?= $this->Paginator->sort('production_recipe_id') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('arrival_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($finalCakes as $finalCake): ?>
                <tr>
                    <td><?= $this->Number->format($finalCake->id) ?></td>
                    <td><?= $finalCake->has('cake') ? $this->Html->link($finalCake->cake->name, ['controller' => 'Cakes', 'action' => 'view', $finalCake->cake->id]) : '' ?></td>
                    <td><?= $finalCake->has('production_recipe') ? $this->Html->link($finalCake->production_recipe->id, ['controller' => 'ProductionRecipes', 'action' => 'view', $finalCake->production_recipe->id]) : '' ?></td>
                    <td><?= $this->Number->format($finalCake->price) ?></td>
                    <td><?= h($finalCake->arrival_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $finalCake->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $finalCake->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $finalCake->id], ['confirm' => __('Are you sure you want to delete # {0}?', $finalCake->id)]) ?>
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
