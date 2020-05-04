<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RawFilling $rawFilling
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Raw Filling'), ['action' => 'edit', $rawFilling->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Raw Filling'), ['action' => 'delete', $rawFilling->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rawFilling->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Raw Fillings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Raw Filling'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rawFillings view content">
            <h3><?= h($rawFilling->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rawFilling->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= $this->Number->format($rawFilling->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= $this->Number->format($rawFilling->code) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Filling Dimensions') ?></h4>
                <?php if (!empty($rawFilling->filling_dimensions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Raw Filling Id') ?></th>
                            <th><?= __('Dimension Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($rawFilling->filling_dimensions as $fillingDimensions) : ?>
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
                <h4><?= __('Related Filling Products') ?></h4>
                <?php if (!empty($rawFilling->filling_products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Raw Filling Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($rawFilling->filling_products as $fillingProducts) : ?>
                        <tr>
                            <td><?= h($fillingProducts->id) ?></td>
                            <td><?= h($fillingProducts->raw_filling_id) ?></td>
                            <td><?= h($fillingProducts->product_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FillingProducts', 'action' => 'view', $fillingProducts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FillingProducts', 'action' => 'edit', $fillingProducts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FillingProducts', 'action' => 'delete', $fillingProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fillingProducts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Recipes') ?></h4>
                <?php if (!empty($rawFilling->recipes)) : ?>
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
                        <?php foreach ($rawFilling->recipes as $recipes) : ?>
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
