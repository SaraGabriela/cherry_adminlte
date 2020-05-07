<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdrecipeDetail $prodrecipeDetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Prodrecipe Detail'), ['action' => 'edit', $prodrecipeDetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Prodrecipe Detail'), ['action' => 'delete', $prodrecipeDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodrecipeDetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Prodrecipe Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Prodrecipe Detail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="prodrecipeDetails view content">
            <h3><?= h($prodrecipeDetail->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Production Recipe') ?></th>
                    <td><?= $prodrecipeDetail->has('production_recipe') ? $this->Html->link($prodrecipeDetail->production_recipe->id, ['controller' => 'ProductionRecipes', 'action' => 'view', $prodrecipeDetail->production_recipe->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Branch Warehouse') ?></th>
                    <td><?= $prodrecipeDetail->has('branch_warehouse') ? $this->Html->link($prodrecipeDetail->branch_warehouse->id, ['controller' => 'BranchWarehouses', 'action' => 'view', $prodrecipeDetail->branch_warehouse->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Current Ubication') ?></th>
                    <td><?= h($prodrecipeDetail->current_ubication) ?></td>
                </tr>
                <tr>
                    <th><?= __('Branch') ?></th>
                    <td><?= h($prodrecipeDetail->branch) ?></td>
                </tr>
                <tr>
                    <th><?= __('Observations') ?></th>
                    <td><?= h($prodrecipeDetail->observations) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($prodrecipeDetail->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cake Phase') ?></th>
                    <td><?= $this->Number->format($prodrecipeDetail->cake_phase) ?></td>
                </tr>
                <tr>
                    <th><?= __('Priority') ?></th>
                    <td><?= $this->Number->format($prodrecipeDetail->priority) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Phase Change') ?></th>
                    <td><?= h($prodrecipeDetail->date_phase_change) ?></td>
                </tr>
                <tr>
                    <th><?= __('Special Order') ?></th>
                    <td><?= $prodrecipeDetail->special_order ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Transformations') ?></h4>
                <?php if (!empty($prodrecipeDetail->transformations)) : ?>
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
                        <?php foreach ($prodrecipeDetail->transformations as $transformations) : ?>
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
