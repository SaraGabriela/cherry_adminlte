<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Contract'), ['action' => 'edit', $contract->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contract'), ['action' => 'delete', $contract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contracts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contract'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contracts view content">
            <h3><?= h($contract->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $contract->has('client') ? $this->Html->link($contract->client->name, ['controller' => 'Clients', 'action' => 'view', $contract->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Production') ?></th>
                    <td><?= $contract->has('production') ? $this->Html->link($contract->production->id, ['controller' => 'Productions', 'action' => 'view', $contract->production->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Alliance') ?></th>
                    <td><?= $contract->has('alliance') ? $this->Html->link($contract->alliance->id, ['controller' => 'Alliances', 'action' => 'view', $contract->alliance->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($contract->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ubication') ?></th>
                    <td><?= h($contract->ubication) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contract->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Price') ?></th>
                    <td><?= $this->Number->format($contract->total_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Account Price') ?></th>
                    <td><?= $this->Number->format($contract->account_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Order Date') ?></th>
                    <td><?= h($contract->order_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delivery Date') ?></th>
                    <td><?= h($contract->delivery_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Contract Recipes') ?></h4>
                <?php if (!empty($contract->contract_recipes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Contract Id') ?></th>
                            <th><?= __('Recipe Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($contract->contract_recipes as $contractRecipes) : ?>
                        <tr>
                            <td><?= h($contractRecipes->id) ?></td>
                            <td><?= h($contractRecipes->contract_id) ?></td>
                            <td><?= h($contractRecipes->recipe_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ContractRecipes', 'action' => 'view', $contractRecipes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ContractRecipes', 'action' => 'edit', $contractRecipes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ContractRecipes', 'action' => 'delete', $contractRecipes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractRecipes->id)]) ?>
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
