
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Raws

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('List'); ?></h3>

          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('equivalence_id') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($raws as $raw): ?>
                    <tr>
                        <td><?= $this->Number->format($raw->id) ?></td>
                        <td><?= h($raw->name) ?></td>
                        <td><?= h($raw->code) ?></td>
                        <td><?= $raw->has('equivalence') ? $this->Html->link($raw->equivalence->id, ['controller' => 'Equivalences', 'action' => 'view', $raw->equivalence->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $raw->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $raw->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $raw->id], ['confirm' => __('Are you sure you want to delete # {0}?', $raw->id)]) ?>
                        </td>
                    </tr>   
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>