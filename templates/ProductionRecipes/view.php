<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductionRecipe $productionRecipe
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Production Recipe'), ['action' => 'edit', $productionRecipe->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Production Recipe'), ['action' => 'delete', $productionRecipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productionRecipe->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Production Recipes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Production Recipe'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productionRecipes view content">
            <h3><?= h($productionRecipe->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Production') ?></th>
                    <td><?= $productionRecipe->has('production') ? $this->Html->link($productionRecipe->production->id, ['controller' => 'Productions', 'action' => 'view', $productionRecipe->production->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Recipe Dimension') ?></th>
                    <td><?= $productionRecipe->has('recipe_dimension') ? $this->Html->link($productionRecipe->recipe_dimension->recipe_dimensions_id, ['controller' => 'RecipeDimensions', 'action' => 'view', $productionRecipe->recipe_dimension->recipe_dimensions_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Observations') ?></th>
                    <td><?= h($productionRecipe->observations) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productionRecipe->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Final Cakes') ?></h4>
                <?php if (!empty($productionRecipe->final_cakes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Cake Id') ?></th>
                            <th><?= __('Production Recipe Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Arrival Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($productionRecipe->final_cakes as $finalCakes) : ?>
                        <tr>
                            <td><?= h($finalCakes->id) ?></td>
                            <td><?= h($finalCakes->cake_id) ?></td>
                            <td><?= h($finalCakes->production_recipe_id) ?></td>
                            <td><?= h($finalCakes->price) ?></td>
                            <td><?= h($finalCakes->arrival_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FinalCakes', 'action' => 'view', $finalCakes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FinalCakes', 'action' => 'edit', $finalCakes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FinalCakes', 'action' => 'delete', $finalCakes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $finalCakes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Prodrecipe Details') ?></h4>
                <?php if (!empty($productionRecipe->prodrecipe_details)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Production Recipe Id') ?></th>
                            <th><?= __('Priority') ?></th>
                            <th><?= __('Branch') ?></th>
                            <th><?= __('Observations') ?></th>
                            <th><?= __('Phase') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($productionRecipe->prodrecipe_details as $prodrecipeDetails) : ?>
                        <tr>
                            <td><?= h($prodrecipeDetails->id) ?></td>
                            <td><?= h($prodrecipeDetails->production_recipe_id) ?></td>
                            <td><?= h($prodrecipeDetails->priority) ?></td>
                            <td><?= h($prodrecipeDetails->branch) ?></td>
                            <td><?= h($prodrecipeDetails->observations) ?></td>
                            <td><?= h($prodrecipeDetails->phase) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ProdrecipeDetails', 'action' => 'view', $prodrecipeDetails->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ProdrecipeDetails', 'action' => 'edit', $prodrecipeDetails->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProdrecipeDetails', 'action' => 'delete', $prodrecipeDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodrecipeDetails->id)]) ?>
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
