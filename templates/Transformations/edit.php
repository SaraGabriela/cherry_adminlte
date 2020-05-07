<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transformation $transformation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transformation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transformation->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Transformations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transformations form content">
            <?= $this->Form->create($transformation) ?>
            <fieldset>
                <legend><?= __('Edit Transformation') ?></legend>
                <?php
                    echo $this->Form->control('final_cake_id', ['options' => $finalCakes]);
                    echo $this->Form->control('prodrecipe_detail_id', ['options' => $prodrecipeDetails]);
                    echo $this->Form->control('recipe');
                    echo $this->Form->control('date');
                    echo $this->Form->control('detail');
                    echo $this->Form->control('phase');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
