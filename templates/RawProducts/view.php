<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RawProduct $rawProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Raw Product'), ['action' => 'edit', $rawProduct->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Raw Product'), ['action' => 'delete', $rawProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rawProduct->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Raw Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Raw Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rawProducts view content">
            <h3><?= h($rawProduct->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Raw') ?></th>
                    <td><?= $rawProduct->has('raw') ? $this->Html->link($rawProduct->raw->name, ['controller' => 'Raws', 'action' => 'view', $rawProduct->raw->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $rawProduct->has('product') ? $this->Html->link($rawProduct->product->name, ['controller' => 'Products', 'action' => 'view', $rawProduct->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rawProduct->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Recipe Product Measures') ?></h4>
                <?php if (!empty($rawProduct->recipe_product_measures)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Raw Product Id') ?></th>
                            <th><?= __('Raw Recipe Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Unit') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($rawProduct->recipe_product_measures as $recipeProductMeasures) : ?>
                        <tr>
                            <td><?= h($recipeProductMeasures->id) ?></td>
                            <td><?= h($recipeProductMeasures->raw_product_id) ?></td>
                            <td><?= h($recipeProductMeasures->raw_recipe_id) ?></td>
                            <td><?= h($recipeProductMeasures->quantity) ?></td>
                            <td><?= h($recipeProductMeasures->unit) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'RecipeProductMeasures', 'action' => 'view', $recipeProductMeasures->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'RecipeProductMeasures', 'action' => 'edit', $recipeProductMeasures->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'RecipeProductMeasures', 'action' => 'delete', $recipeProductMeasures->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipeProductMeasures->id)]) ?>
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
