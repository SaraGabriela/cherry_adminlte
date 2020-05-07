<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transformation $transformation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Transformation'), ['action' => 'edit', $transformation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Transformation'), ['action' => 'delete', $transformation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transformation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Transformations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Transformation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transformations view content">
            <h3><?= h($transformation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Final Cake') ?></th>
                    <td><?= $transformation->has('final_cake') ? $this->Html->link($transformation->final_cake->id, ['controller' => 'FinalCakes', 'action' => 'view', $transformation->final_cake->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Prodrecipe Detail') ?></th>
                    <td><?= $transformation->has('prodrecipe_detail') ? $this->Html->link($transformation->prodrecipe_detail->id, ['controller' => 'ProdrecipeDetails', 'action' => 'view', $transformation->prodrecipe_detail->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Detail') ?></th>
                    <td><?= h($transformation->detail) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($transformation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Recipe') ?></th>
                    <td><?= $this->Number->format($transformation->recipe) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phase') ?></th>
                    <td><?= $this->Number->format($transformation->phase) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($transformation->date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
