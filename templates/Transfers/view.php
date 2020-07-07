<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transfer $transfer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Transfer'), ['action' => 'edit', $transfer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Transfer'), ['action' => 'delete', $transfer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transfer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Transfers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Transfer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transfers view content">
            <h3><?= h($transfer->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Manager') ?></th>
                    <td><?= h($transfer->manager) ?></td>
                </tr>
                <tr>
                    <th><?= __('Branch Warehouse') ?></th>
                    <td><?= $transfer->has('branch_warehouse') ? $this->Html->link($transfer->branch_warehouse->id, ['controller' => 'BranchWarehouses', 'action' => 'view', $transfer->branch_warehouse->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($transfer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Branch Warehouse Origin Id') ?></th>
                    <td><?= $this->Number->format($transfer->branch_warehouse_origin_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($transfer->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Transfer Final Cake') ?></h4>
                <?php if (!empty($transfer->transfer_final_cake)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Transfer Id') ?></th>
                            <th><?= __('Final Cake Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($transfer->transfer_final_cake as $transferFinalCake) : ?>
                        <tr>
                            <td><?= h($transferFinalCake->id) ?></td>
                            <td><?= h($transferFinalCake->transfer_id) ?></td>
                            <td><?= h($transferFinalCake->final_cake_id) ?></td>
                            <td><?= h($transferFinalCake->quantity) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'TransferFinalCake', 'action' => 'view', $transferFinalCake->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'TransferFinalCake', 'action' => 'edit', $transferFinalCake->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TransferFinalCake', 'action' => 'delete', $transferFinalCake->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferFinalCake->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Transfer Production Recipes') ?></h4>
                <?php if (!empty($transfer->transfer_production_recipes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Transfer Id') ?></th>
                            <th><?= __('Prodrecipe Details Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($transfer->transfer_production_recipes as $transferProductionRecipes) : ?>
                        <tr>
                            <td><?= h($transferProductionRecipes->id) ?></td>
                            <td><?= h($transferProductionRecipes->transfer_id) ?></td>
                            <td><?= h($transferProductionRecipes->prodrecipe_details_id) ?></td>
                            <td><?= h($transferProductionRecipes->quantity) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'TransferProductionRecipes', 'action' => 'view', $transferProductionRecipes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'TransferProductionRecipes', 'action' => 'edit', $transferProductionRecipes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TransferProductionRecipes', 'action' => 'delete', $transferProductionRecipes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferProductionRecipes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Transfer Warehouse Products') ?></h4>
                <?php if (!empty($transfer->transfer_warehouse_products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Warehouse Product Id') ?></th>
                            <th><?= __('Transfer Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Unit') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($transfer->transfer_warehouse_products as $transferWarehouseProducts) : ?>
                        <tr>
                            <td><?= h($transferWarehouseProducts->id) ?></td>
                            <td><?= h($transferWarehouseProducts->warehouse_product_id) ?></td>
                            <td><?= h($transferWarehouseProducts->transfer_id) ?></td>
                            <td><?= h($transferWarehouseProducts->quantity) ?></td>
                            <td><?= h($transferWarehouseProducts->unit) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'TransferWarehouseProducts', 'action' => 'view', $transferWarehouseProducts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'TransferWarehouseProducts', 'action' => 'edit', $transferWarehouseProducts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TransferWarehouseProducts', 'action' => 'delete', $transferWarehouseProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferWarehouseProducts->id)]) ?>
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
