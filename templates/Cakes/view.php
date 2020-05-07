<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cake $cake
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cake'), ['action' => 'edit', $cake->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cake'), ['action' => 'delete', $cake->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cake->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cakes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cake'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cakes view content">
            <h3><?= h($cake->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($cake->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($cake->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($cake->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cake->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Cake Sales') ?></h4>
                <?php if (!empty($cake->cake_sales)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Cake Id') ?></th>
                            <th><?= __('Alliance Id') ?></th>
                            <th><?= __('Branch') ?></th>
                            <th><?= __('Sale Date') ?></th>
                            <th><?= __('Sale Price') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($cake->cake_sales as $cakeSales) : ?>
                        <tr>
                            <td><?= h($cakeSales->id) ?></td>
                            <td><?= h($cakeSales->cake_id) ?></td>
                            <td><?= h($cakeSales->alliance_id) ?></td>
                            <td><?= h($cakeSales->branch) ?></td>
                            <td><?= h($cakeSales->sale_date) ?></td>
                            <td><?= h($cakeSales->sale_price) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CakeSales', 'action' => 'view', $cakeSales->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CakeSales', 'action' => 'edit', $cakeSales->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CakeSales', 'action' => 'delete', $cakeSales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cakeSales->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Final Cakes') ?></h4>
                <?php if (!empty($cake->final_cakes)) : ?>
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
                        <?php foreach ($cake->final_cakes as $finalCakes) : ?>
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
                <h4><?= __('Related Recipes') ?></h4>
                <?php if (!empty($cake->recipes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Dimension Id') ?></th>
                            <th><?= __('Raw Id') ?></th>
                            <th><?= __('Raw Filling Id') ?></th>
                            <th><?= __('Decoration Id') ?></th>
                            <th><?= __('Cake Id') ?></th>
                            <th><?= __('Cooking Time') ?></th>
                            <th><?= __('Special Order') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Observations') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($cake->recipes as $recipes) : ?>
                        <tr>
                            <td><?= h($recipes->id) ?></td>
                            <td><?= h($recipes->dimension_id) ?></td>
                            <td><?= h($recipes->raw_id) ?></td>
                            <td><?= h($recipes->raw_filling_id) ?></td>
                            <td><?= h($recipes->decoration_id) ?></td>
                            <td><?= h($recipes->cake_id) ?></td>
                            <td><?= h($recipes->cooking_time) ?></td>
                            <td><?= h($recipes->special_order) ?></td>
                            <td><?= h($recipes->price) ?></td>
                            <td><?= h($recipes->observations) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Recipes', 'action' => 'view', $recipes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Recipes', 'action' => 'edit', $recipes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recipes', 'action' => 'delete', $recipes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipes->id)]) ?>
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
