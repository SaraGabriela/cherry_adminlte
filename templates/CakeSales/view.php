<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CakeSale $cakeSale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cake Sale'), ['action' => 'edit', $cakeSale->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cake Sale'), ['action' => 'delete', $cakeSale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cakeSale->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cake Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cake Sale'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cakeSales view content">
            <h3><?= h($cakeSale->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cake') ?></th>
                    <td><?= $cakeSale->has('cake') ? $this->Html->link($cakeSale->cake->name, ['controller' => 'Cakes', 'action' => 'view', $cakeSale->cake->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Alliance') ?></th>
                    <td><?= $cakeSale->has('alliance') ? $this->Html->link($cakeSale->alliance->id, ['controller' => 'Alliances', 'action' => 'view', $cakeSale->alliance->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Branch') ?></th>
                    <td><?= h($cakeSale->branch) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cakeSale->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Price') ?></th>
                    <td><?= $this->Number->format($cakeSale->sale_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Date') ?></th>
                    <td><?= h($cakeSale->sale_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
