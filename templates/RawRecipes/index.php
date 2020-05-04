<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RawRecipe[]|\Cake\Collection\CollectionInterface $rawRecipes
 */
?>
<div class="rawRecipes index content">
    <?= $this->Html->link(__('New Raw Recipe'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Raw Recipes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('recipes_quantity') ?></th>
                    <th><?= $this->Paginator->sort('unit') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rawRecipes as $rawRecipe): ?>
                <tr>
                    <td><?= $this->Number->format($rawRecipe->id) ?></td>
                    <td><?= $this->Number->format($rawRecipe->recipes_quantity) ?></td>
                    <td><?= h($rawRecipe->unit) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $rawRecipe->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rawRecipe->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rawRecipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rawRecipe->id)]) ?>
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
