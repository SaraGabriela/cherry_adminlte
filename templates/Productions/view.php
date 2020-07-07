<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Production $production
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Production'), ['action' => 'edit', $production->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Production'), ['action' => 'delete', $production->id], ['confirm' => __('Are you sure you want to delete # {0}?', $production->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Productions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Production'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productions view content">
            <h3><?= h($production->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Observations') ?></th>
                    <td><?= h($production->observations) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($production->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Number Cakes') ?></th>
                    <td><?= $this->Number->format($production->number_cakes) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($production->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Contracts') ?></h4>
                <?php if (!empty($production->contracts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Production Id') ?></th>
                            <th><?= __('Alliance Id') ?></th>
                            <th><?= __('Order Date') ?></th>
                            <th><?= __('Delivery Date') ?></th>
                            <th><?= __('Total Price') ?></th>
                            <th><?= __('Account Price') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Ubication') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($production->contracts as $contracts) : ?>
                        <tr>
                            <td><?= h($contracts->id) ?></td>
                            <td><?= h($contracts->client_id) ?></td>
                            <td><?= h($contracts->production_id) ?></td>
                            <td><?= h($contracts->alliance_id) ?></td>
                            <td><?= h($contracts->order_date) ?></td>
                            <td><?= h($contracts->delivery_date) ?></td>
                            <td><?= h($contracts->total_price) ?></td>
                            <td><?= h($contracts->account_price) ?></td>
                            <td><?= h($contracts->description) ?></td>
                            <td><?= h($contracts->ubication) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Contracts', 'action' => 'view', $contracts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Contracts', 'action' => 'edit', $contracts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contracts', 'action' => 'delete', $contracts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contracts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Production Recipes') ?></h4>
                <?php if (!empty($production->production_recipes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Production Id') ?></th>
                            <th><?= __('Recipe Dimension Id') ?></th>
                            <th><?= __('Observations') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($production->production_recipes as $productionRecipes) : ?>
                        <tr>
                            <td><?= h($productionRecipes->id) ?></td>
                            <td><?= h($productionRecipes->production_id) ?></td>
                            <td><?= h($productionRecipes->recipe_dimension_id) ?></td>
                            <td><?= h($productionRecipes->observations) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ProductionRecipes', 'action' => 'view', $productionRecipes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ProductionRecipes', 'action' => 'edit', $productionRecipes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductionRecipes', 'action' => 'delete', $productionRecipes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productionRecipes->id)]) ?>
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
