<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransferProductionRecipe $transferProductionRecipe
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Transfer Production Recipe'), ['action' => 'edit', $transferProductionRecipe->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Transfer Production Recipe'), ['action' => 'delete', $transferProductionRecipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferProductionRecipe->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Transfer Production Recipes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Transfer Production Recipe'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transferProductionRecipes view content">
            <h3><?= h($transferProductionRecipe->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Transfer') ?></th>
                    <td><?= $transferProductionRecipe->has('transfer') ? $this->Html->link($transferProductionRecipe->transfer->id, ['controller' => 'Transfers', 'action' => 'view', $transferProductionRecipe->transfer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Prodrecipe Detail') ?></th>
                    <td><?= $transferProductionRecipe->has('prodrecipe_detail') ? $this->Html->link($transferProductionRecipe->prodrecipe_detail->id, ['controller' => 'ProdrecipeDetails', 'action' => 'view', $transferProductionRecipe->prodrecipe_detail->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($transferProductionRecipe->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($transferProductionRecipe->quantity) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
