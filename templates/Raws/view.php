<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Raw $raw
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Raw'), ['action' => 'edit', $raw->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Raw'), ['action' => 'delete', $raw->id], ['confirm' => __('Are you sure you want to delete # {0}?', $raw->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Raws'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Raw'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="raws view content">
            <h3><?= h($raw->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($raw->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($raw->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equivalence') ?></th>
                    <td><?= $raw->has('equivalence') ? $this->Html->link($raw->equivalence->id, ['controller' => 'Equivalences', 'action' => 'view', $raw->equivalence->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($raw->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Raw Products') ?></h4>
                <?php if (!empty($raw->raw_products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Raw Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($raw->raw_products as $rawProducts) : ?>
                        <tr>
                            <td><?= h($rawProducts->id) ?></td>
                            <td><?= h($rawProducts->raw_id) ?></td>
                            <td><?= h($rawProducts->product_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'RawProducts', 'action' => 'view', $rawProducts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'RawProducts', 'action' => 'edit', $rawProducts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'RawProducts', 'action' => 'delete', $rawProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rawProducts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Recipes') ?></h4>
                <?php if (!empty($raw->recipes)) : ?>
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
                        <?php foreach ($raw->recipes as $recipes) : ?>
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
