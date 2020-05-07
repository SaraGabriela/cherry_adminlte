<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContractRecipe $contractRecipe
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Contract Recipe'), ['action' => 'edit', $contractRecipe->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contract Recipe'), ['action' => 'delete', $contractRecipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractRecipe->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contract Recipes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contract Recipe'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contractRecipes view content">
            <h3><?= h($contractRecipe->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Contract') ?></th>
                    <td><?= $contractRecipe->has('contract') ? $this->Html->link($contractRecipe->contract->id, ['controller' => 'Contracts', 'action' => 'view', $contractRecipe->contract->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Recipe') ?></th>
                    <td><?= $contractRecipe->has('recipe') ? $this->Html->link($contractRecipe->recipe->id, ['controller' => 'Recipes', 'action' => 'view', $contractRecipe->recipe->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contractRecipe->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
