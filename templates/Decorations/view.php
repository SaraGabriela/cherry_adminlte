<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Decoration $decoration
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Decoration'), ['action' => 'edit', $decoration->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Decoration'), ['action' => 'delete', $decoration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decoration->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Decorations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Decoration'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="decorations view content">
            <h3><?= h($decoration->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($decoration->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($decoration->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($decoration->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Decoration Dimensions') ?></h4>
                <?php if (!empty($decoration->decoration_dimensions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Decoration Id') ?></th>
                            <th><?= __('Dimension Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($decoration->decoration_dimensions as $decorationDimensions) : ?>
                        <tr>
                            <td><?= h($decorationDimensions->id) ?></td>
                            <td><?= h($decorationDimensions->decoration_id) ?></td>
                            <td><?= h($decorationDimensions->dimension_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DecorationDimensions', 'action' => 'view', $decorationDimensions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DecorationDimensions', 'action' => 'edit', $decorationDimensions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DecorationDimensions', 'action' => 'delete', $decorationDimensions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decorationDimensions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Decoration Products') ?></h4>
                <?php if (!empty($decoration->decoration_products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Decoration Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($decoration->decoration_products as $decorationProducts) : ?>
                        <tr>
                            <td><?= h($decorationProducts->id) ?></td>
                            <td><?= h($decorationProducts->decoration_id) ?></td>
                            <td><?= h($decorationProducts->product_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DecorationProducts', 'action' => 'view', $decorationProducts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DecorationProducts', 'action' => 'edit', $decorationProducts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DecorationProducts', 'action' => 'delete', $decorationProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decorationProducts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Recipes') ?></h4>
                <?php if (!empty($decoration->recipes)) : ?>
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
                        <?php foreach ($decoration->recipes as $recipes) : ?>
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
