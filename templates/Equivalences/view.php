<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equivalence $equivalence
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Equivalence'), ['action' => 'edit', $equivalence->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Equivalence'), ['action' => 'delete', $equivalence->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equivalence->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Equivalences'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Equivalence'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="equivalences view content">
            <h3><?= h($equivalence->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($equivalence->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($equivalence->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Equivalence Dimensions') ?></h4>
                <?php if (!empty($equivalence->equivalence_dimensions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Equivalence Id') ?></th>
                            <th><?= __('Dimension Id') ?></th>
                            <th><?= __('Quantity Recipes') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($equivalence->equivalence_dimensions as $equivalenceDimensions) : ?>
                        <tr>
                            <td><?= h($equivalenceDimensions->id) ?></td>
                            <td><?= h($equivalenceDimensions->equivalence_id) ?></td>
                            <td><?= h($equivalenceDimensions->dimension_id) ?></td>
                            <td><?= h($equivalenceDimensions->quantity_recipes) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'EquivalenceDimensions', 'action' => 'view', $equivalenceDimensions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'EquivalenceDimensions', 'action' => 'edit', $equivalenceDimensions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'EquivalenceDimensions', 'action' => 'delete', $equivalenceDimensions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equivalenceDimensions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Raws') ?></h4>
                <?php if (!empty($equivalence->raws)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Equivalence Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($equivalence->raws as $raws) : ?>
                        <tr>
                            <td><?= h($raws->id) ?></td>
                            <td><?= h($raws->name) ?></td>
                            <td><?= h($raws->code) ?></td>
                            <td><?= h($raws->equivalence_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Raws', 'action' => 'view', $raws->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Raws', 'action' => 'edit', $raws->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Raws', 'action' => 'delete', $raws->id], ['confirm' => __('Are you sure you want to delete # {0}?', $raws->id)]) ?>
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
