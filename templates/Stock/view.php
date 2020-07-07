<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Stock'), ['action' => 'edit', $stock->stock_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Stock'), ['action' => 'delete', $stock->stock_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stock->stock_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Stock'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Stock'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stock view content">
            <h3><?= h($stock->stock_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Stock Id') ?></th>
                    <td><?= $this->Number->format($stock->stock_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
