<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Alliance $alliance
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Alliance'), ['action' => 'edit', $alliance->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Alliance'), ['action' => 'delete', $alliance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alliance->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Alliances'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Alliance'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="alliances view content">
            <h3><?= h($alliance->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= h($alliance->client) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($alliance->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ticket Value') ?></th>
                    <td><?= $this->Number->format($alliance->ticket_value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ticket Quantity') ?></th>
                    <td><?= $this->Number->format($alliance->ticket_quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($alliance->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Cake Sales') ?></h4>
                <?php if (!empty($alliance->cake_sales)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Cake Id') ?></th>
                            <th><?= __('Alliance Id') ?></th>
                            <th><?= __('Branch') ?></th>
                            <th><?= __('Sale Date') ?></th>
                            <th><?= __('Sale Price') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($alliance->cake_sales as $cakeSales) : ?>
                        <tr>
                            <td><?= h($cakeSales->id) ?></td>
                            <td><?= h($cakeSales->cake_id) ?></td>
                            <td><?= h($cakeSales->alliance_id) ?></td>
                            <td><?= h($cakeSales->branch) ?></td>
                            <td><?= h($cakeSales->sale_date) ?></td>
                            <td><?= h($cakeSales->sale_price) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CakeSales', 'action' => 'view', $cakeSales->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CakeSales', 'action' => 'edit', $cakeSales->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CakeSales', 'action' => 'delete', $cakeSales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cakeSales->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Contracts') ?></h4>
                <?php if (!empty($alliance->contracts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Production Id') ?></th>
                            <th><?= __('Alliance Id') ?></th>
                            <th><?= __('Order Date') ?></th>
                            <th><?= __('Delivery Date') ?></th>
                            <th><?= __('Total Price') ?></th>
                            <th><?= __('Account Price') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Ubication') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($alliance->contracts as $contracts) : ?>
                        <tr>
                            <td><?= h($contracts->id) ?></td>
                            <td><?= h($contracts->client_id) ?></td>
                            <td><?= h($contracts->production_id) ?></td>
                            <td><?= h($contracts->alliance_id) ?></td>
                            <td><?= h($contracts->order_date) ?></td>
                            <td><?= h($contracts->delivery_date) ?></td>
                            <td><?= h($contracts->total_price) ?></td>
                            <td><?= h($contracts->account_price) ?></td>
                            <td><?= h($contracts->description) ?></td>
                            <td><?= h($contracts->ubication) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Contracts', 'action' => 'view', $contracts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Contracts', 'action' => 'edit', $contracts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contracts', 'action' => 'delete', $contracts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contracts->id)]) ?>
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
