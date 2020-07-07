<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RecipeDimension[]|\Cake\Collection\CollectionInterface $recipeDimensions
 */
?>
<div class="recipeDimensions index content">
    <?= $this->Html->link(__('New Recipe Dimension'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Recipe Dimensions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('recipe_dimensions_id') ?></th>
                    <th><?= $this->Paginator->sort('dimension_id') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('recipe_id') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recipeDimensions as $recipeDimension): ?>
                <tr>
                    <td><?= $this->Number->format($recipeDimension->recipe_dimensions_id) ?></td>
                    <td><?= $recipeDimension->has('dimension') ? $this->Html->link($recipeDimension->dimension->description, ['controller' => 'Dimensions', 'action' => 'view', $recipeDimension->dimension->id]) : '' ?></td>
                    <td><?= h($recipeDimension->description) ?></td>
                    <td><?= $recipeDimension->has('recipe') ? $this->Html->link($recipeDimension->recipe->id, ['controller' => 'Recipes', 'action' => 'view', $recipeDimension->recipe->id]) : '' ?></td>
                    <td><?= $this->Number->format($recipeDimension->price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $recipeDimension->recipe_dimensions_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recipeDimension->recipe_dimensions_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recipeDimension->recipe_dimensions_id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipeDimension->recipe_dimensions_id)]) ?>
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
