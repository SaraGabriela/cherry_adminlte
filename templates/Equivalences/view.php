<section class="content-header">
  <h1>
    Branch
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        
        <div class="box-body">
            <h3><?= h($equivalence->description) ?></h3>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Dimensiones') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($equivalence->equivalence_dimensions)): ?>
          <table class="table table-hover">
                <tr>

                    <th><?= __('Dimension') ?></th>
                    <th><?= __('Cantidad Equvalencia') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($equivalence->equivalence_dimensions as $equivalenceDimensions) : ?>
                <tr>
                    <td><?= h($equivalenceDimensions->dimension->description) ?></td>
                    <td><?= h($equivalenceDimensions->quantity_recipes) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'EquivalenceDimensions', 'action' => 'view', $equivalenceDimensions->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'EquivalenceDimensions', 'action' => 'edit', $equivalenceDimensions->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'EquivalenceDimensions', 'action' => 'delete', $equivalenceDimensions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equivalenceDimensions->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Crudos') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($equivalence->raws)): ?>
          <table class="table table-hover">
                <tr>
                    <th><?= __('Name') ?></th>
                    <th><?= __('Code') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($equivalence->raws as $raws) : ?>
                <tr>
                    <td><?= h($raws->name) ?></td>
                    <td><?= h($raws->code) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Raws', 'action' => 'view', $raws->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Raws', 'action' => 'edit', $raws->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Raws', 'action' => 'delete', $raws->id], ['confirm' => __('Are you sure you want to delete # {0}?', $raws->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>


