<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FinalCake $finalCake
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Final Cake'), ['action' => 'edit', $finalCake->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Final Cake'), ['action' => 'delete', $finalCake->id], ['confirm' => __('Are you sure you want to delete # {0}?', $finalCake->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Final Cakes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Final Cake'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="finalCakes view content">
            <h3><?= h($finalCake->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cake') ?></th>
                    <td><?= $finalCake->has('cake') ? $this->Html->link($finalCake->cake->name, ['controller' => 'Cakes', 'action' => 'view', $finalCake->cake->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Production Recipe') ?></th>
                    <td><?= $finalCake->has('production_recipe') ? $this->Html->link($finalCake->production_recipe->id, ['controller' => 'ProductionRecipes', 'action' => 'view', $finalCake->production_recipe->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($finalCake->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($finalCake->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Arrival Date') ?></th>
                    <td><?= h($finalCake->arrival_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Transformations') ?></h4>
                <?php if (!empty($finalCake->transformations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Final Cake Id') ?></th>
                            <th><?= __('Prodrecipe Detail Id') ?></th>
                            <th><?= __('Recipe') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Detail') ?></th>
                            <th><?= __('Phase') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($finalCake->transformations as $transformations) : ?>
                        <tr>
                            <td><?= h($transformations->id) ?></td>
                            <td><?= h($transformations->final_cake_id) ?></td>
                            <td><?= h($transformations->prodrecipe_detail_id) ?></td>
                            <td><?= h($transformations->recipe) ?></td>
                            <td><?= h($transformations->date) ?></td>
                            <td><?= h($transformations->detail) ?></td>
                            <td><?= h($transformations->phase) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Transformations', 'action' => 'view', $transformations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Transformations', 'action' => 'edit', $transformations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transformations', 'action' => 'delete', $transformations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transformations->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
