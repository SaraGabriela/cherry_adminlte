<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sale'), ['action' => 'edit', $sale->sale_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sale'), ['action' => 'delete', $sale->sale_id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->sale_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sale'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sales view content">
            <h3><?= h($sale->sale_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sales Type') ?></th>
                    <td><?= h($sale->sales_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Id') ?></th>
                    <td><?= $this->Number->format($sale->sale_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock Id') ?></th>
                    <td><?= $this->Number->format($sale->stock_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($sale->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($sale->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($sale->date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
