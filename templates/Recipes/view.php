<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Recipe'), ['action' => 'edit', $recipe->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Recipe'), ['action' => 'delete', $recipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Recipes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Recipe'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="recipes view content">
            <h3><?= h($recipe->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Raw') ?></th>
                    <td><?= $recipe->has('raw') ? $this->Html->link($recipe->raw->name, ['controller' => 'Raws', 'action' => 'view', $recipe->raw->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Raw Filling') ?></th>
                    <td><?= $recipe->has('raw_filling') ? $this->Html->link($recipe->raw_filling->name, ['controller' => 'RawFillings', 'action' => 'view', $recipe->raw_filling->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Decoration') ?></th>
                    <td><?= $recipe->has('decoration') ? $this->Html->link($recipe->decoration->id, ['controller' => 'Decorations', 'action' => 'view', $recipe->decoration->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Cooking Time') ?></th>
                    <td><?= h($recipe->cooking_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Observations') ?></th>
                    <td><?= h($recipe->observations) ?></td>
                </tr>
                <tr>
                    <th><?= __('Comercial Name') ?></th>
                    <td><?= h($recipe->comercial_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Photo') ?></th>
                    <td><?= h($recipe->photo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($recipe->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Contract Recipes') ?></h4>
                <?php if (!empty($recipe->contract_recipes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Contract Id') ?></th>
                            <th><?= __('Recipe Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($recipe->contract_recipes as $contractRecipes) : ?>
                        <tr>
                            <td><?= h($contractRecipes->id) ?></td>
                            <td><?= h($contractRecipes->contract_id) ?></td>
                            <td><?= h($contractRecipes->recipe_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ContractRecipes', 'action' => 'view', $contractRecipes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ContractRecipes', 'action' => 'edit', $contractRecipes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ContractRecipes', 'action' => 'delete', $contractRecipes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractRecipes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Recipe Dimensions') ?></h4>
                <?php if (!empty($recipe->recipe_dimensions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Recipe Dimensions Id') ?></th>
                            <th><?= __('Dimension Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Recipe Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($recipe->recipe_dimensions as $recipeDimensions) : ?>
                        <tr>
                            <td><?= h($recipeDimensions->recipe_dimensions_id) ?></td>
                            <td><?= h($recipeDimensions->dimension_id) ?></td>
                            <td><?= h($recipeDimensions->description) ?></td>
                            <td><?= h($recipeDimensions->recipe_id) ?></td>
                            <td><?= h($recipeDimensions->price) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'RecipeDimensions', 'action' => 'view', $recipeDimensions->recipe_dimensions_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'RecipeDimensions', 'action' => 'edit', $recipeDimensions->recipe_dimensions_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'RecipeDimensions', 'action' => 'delete', $recipeDimensions->recipe_dimensions_id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipeDimensions->recipe_dimensions_id)]) ?>
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
