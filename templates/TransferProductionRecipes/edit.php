<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransferProductionRecipe $transferProductionRecipe
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transferProductionRecipe->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transferProductionRecipe->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Transfer Production Recipes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transferProductionRecipes form content">
            <?= $this->Form->create($transferProductionRecipe) ?>
            <fieldset>
                <legend><?= __('Edit Transfer Production Recipe') ?></legend>
                <?php
                    echo $this->Form->control('transfer_id', ['options' => $transfers]);
                    echo $this->Form->control('prodrecipe_details_id', ['options' => $prodrecipeDetails]);
                    echo $this->Form->control('quantity');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
