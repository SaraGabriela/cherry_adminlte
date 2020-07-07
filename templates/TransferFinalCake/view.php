<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransferFinalCake $transferFinalCake
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Transfer Final Cake'), ['action' => 'edit', $transferFinalCake->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Transfer Final Cake'), ['action' => 'delete', $transferFinalCake->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferFinalCake->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Transfer Final Cake'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Transfer Final Cake'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transferFinalCake view content">
            <h3><?= h($transferFinalCake->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Transfer') ?></th>
                    <td><?= $transferFinalCake->has('transfer') ? $this->Html->link($transferFinalCake->transfer->id, ['controller' => 'Transfers', 'action' => 'view', $transferFinalCake->transfer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Final Cake') ?></th>
                    <td><?= $transferFinalCake->has('final_cake') ? $this->Html->link($transferFinalCake->final_cake->id, ['controller' => 'FinalCakes', 'action' => 'view', $transferFinalCake->final_cake->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($transferFinalCake->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($transferFinalCake->quantity) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
