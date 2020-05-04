<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dimension $dimension
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Dimension'), ['action' => 'edit', $dimension->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Dimension'), ['action' => 'delete', $dimension->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dimension->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Dimensions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Dimension'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="dimensions view content">
            <h3><?= h($dimension->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($dimension->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($dimension->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Decoration Dimensions') ?></h4>
                <?php if (!empty($dimension->decoration_dimensions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Decoration Id') ?></th>
                            <th><?= __('Dimension Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($dimension->decoration_dimensions as $decorationDimensions) : ?>
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
                <h4><?= __('Related Equivalence Dimensions') ?></h4>
                <?php if (!empty($dimension->equivalence_dimensions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Equivalence Id') ?></th>
                            <th><?= __('Dimension Id') ?></th>
                            <th><?= __('Quantity Recipes') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($dimension->equivalence_dimensions as $equivalenceDimensions) : ?>
                        <tr>
                            <td><?= h($equivalenceDimensions->id) ?></td>
                            <td><?= h($equivalenceDimensions->equivalence_id) ?></td>
                            <td><?= h($equivalenceDimensions->dimension_id) ?></td>
                            <td><?= h($equivalenceDimensions->quantity_recipes) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'EquivalenceDimensions', 'action' => 'view', $equivalenceDimensions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'EquivalenceDimensions', 'action' => 'edit', $equivalenceDimensions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'EquivalenceDimensions', 'action' => 'delete', $equivalenceDimensions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equivalenceDimensions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Filling Dimensions') ?></h4>
                <?php if (!empty($dimension->filling_dimensions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Raw Filling Id') ?></th>
                            <th><?= __('Dimension Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($dimension->filling_dimensions as $fillingDimensions) : ?>
                        <tr>
                            <td><?= h($fillingDimensions->id) ?></td>
                            <td><?= h($fillingDimensions->raw_filling_id) ?></td>
                            <td><?= h($fillingDimensions->dimension_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FillingDimensions', 'action' => 'view', $fillingDimensions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FillingDimensions', 'action' => 'edit', $fillingDimensions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FillingDimensions', 'action' => 'delete', $fillingDimensions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fillingDimensions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Recipes') ?></h4>
                <?php if (!empty($dimension->recipes)) : ?>
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
                        <?php foreach ($dimension->recipes as $recipes) : ?>
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
