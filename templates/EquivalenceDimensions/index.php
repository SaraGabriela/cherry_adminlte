<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EquivalenceDimension[]|\Cake\Collection\CollectionInterface $equivalenceDimensions
 */
?>
<div class="equivalenceDimensions index content">
    <?= $this->Html->link(__('New Equivalence Dimension'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Equivalence Dimensions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('equivalence_id') ?></th>
                    <th><?= $this->Paginator->sort('dimension_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity_recipes') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equivalenceDimensions as $equivalenceDimension): ?>
                <tr>
                    <td><?= $this->Number->format($equivalenceDimension->id) ?></td>
                    <td><?= $equivalenceDimension->has('equivalence') ? $this->Html->link($equivalenceDimension->equivalence->id, ['controller' => 'Equivalences', 'action' => 'view', $equivalenceDimension->equivalence->id]) : '' ?></td>
                    <td><?= $equivalenceDimension->has('dimension') ? $this->Html->link($equivalenceDimension->dimension->id, ['controller' => 'Dimensions', 'action' => 'view', $equivalenceDimension->dimension->id]) : '' ?></td>
                    <td><?= $this->Number->format($equivalenceDimension->quantity_recipes) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $equivalenceDimension->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $equivalenceDimension->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $equivalenceDimension->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equivalenceDimension->id)]) ?>
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
