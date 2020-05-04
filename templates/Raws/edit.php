<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Raw $raw
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $raw->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $raw->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Raws'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="raws form content">
            <?= $this->Form->create($raw) ?>
            <fieldset>
                <legend><?= __('Edit Raw') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('code');
                    echo $this->Form->control('equivalence_id', ['options' => $equivalences]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
