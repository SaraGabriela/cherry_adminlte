<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BranchWarehouse $branchWarehouse
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Branch Warehouse'), ['action' => 'edit', $branchWarehouse->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Branch Warehouse'), ['action' => 'delete', $branchWarehouse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branchWarehouse->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Branch Warehouses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Branch Warehouse'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="branchWarehouses view content">
            <h3><?= h($branchWarehouse->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Warehouse') ?></th>
                    <td><?= $branchWarehouse->has('warehouse') ? $this->Html->link($branchWarehouse->warehouse->id, ['controller' => 'Warehouses', 'action' => 'view', $branchWarehouse->warehouse->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Branch') ?></th>
                    <td><?= $branchWarehouse->has('branch') ? $this->Html->link($branchWarehouse->branch->name, ['controller' => 'Branches', 'action' => 'view', $branchWarehouse->branch->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($branchWarehouse->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Warehouse Products') ?></h4>
                <?php if (!empty($branchWarehouse->warehouse_products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Branch Warehouse Id') ?></th>
                            <th><?= __('Current Stock') ?></th>
                            <th><?= __('Unit') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Previous Stock') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($branchWarehouse->warehouse_products as $warehouseProducts) : ?>
                        <tr>
                            <td><?= h($warehouseProducts->id) ?></td>
                            <td><?= h($warehouseProducts->branch_warehouse_id) ?></td>
                            <td><?= h($warehouseProducts->current_stock) ?></td>
                            <td><?= h($warehouseProducts->unit) ?></td>
                            <td><?= h($warehouseProducts->date) ?></td>
                            <td><?= h($warehouseProducts->product_id) ?></td>
                            <td><?= h($warehouseProducts->previous_stock) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'WarehouseProducts', 'action' => 'view', $warehouseProducts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'WarehouseProducts', 'action' => 'edit', $warehouseProducts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'WarehouseProducts', 'action' => 'delete', $warehouseProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $warehouseProducts->id)]) ?>
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
