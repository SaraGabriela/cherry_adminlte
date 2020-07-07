<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Store'), ['action' => 'edit', $store->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Store'), ['action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Store'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Store'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="store view content">
            <h3><?= h($store->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sale Type') ?></th>
                    <td><?= h($store->sale_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Alliance') ?></th>
                    <td><?= $store->has('alliance') ? $this->Html->link($store->alliance->id, ['controller' => 'Alliances', 'action' => 'view', $store->alliance->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Branch') ?></th>
                    <td><?= $store->has('branch') ? $this->Html->link($store->branch->name, ['controller' => 'Branches', 'action' => 'view', $store->branch->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($store->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Recipe Dimensions') ?></h4>
                <?php if (!empty($store->recipe_dimensions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Recipe Dimensions Id') ?></th>
                            <th><?= __('Dimension Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Stock') ?></th>
                            <th><?= __('Stock Store') ?></th>
                            <th><?= __('State') ?></th>
                            <th><?= __('Store Id') ?></th>
                            <th><?= __('Recipe Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($store->recipe_dimensions as $recipeDimensions) : ?>
                        <tr>
                            <td><?= h($recipeDimensions->recipe_dimensions_id) ?></td>
                            <td><?= h($recipeDimensions->dimension_id) ?></td>
                            <td><?= h($recipeDimensions->description) ?></td>
                            <td><?= h($recipeDimensions->price) ?></td>
                            <td><?= h($recipeDimensions->stock) ?></td>
                            <td><?= h($recipeDimensions->stock_store) ?></td>
                            <td><?= h($recipeDimensions->state) ?></td>
                            <td><?= h($recipeDimensions->store_id) ?></td>
                            <td><?= h($recipeDimensions->recipe_id) ?></td>
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
