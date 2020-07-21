<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transfer[]|\Cake\Collection\CollectionInterface $transfers
 */
?>


<section class="content-header">
  <h1>
    Tranferencias
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

                  <th scope="col"><?= $this->Paginator->sort('date','Fecha') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('manager','Encargado') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('branch_warehouse_origin_id','Origen') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('branch_warehouse_destiny_id','Destino') ?></th>

                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($transfers as $transfer): ?>
                <tr>
                  <td><?= h($transfer->date) ?></td>
                  <td><?= h($transfer->manager) ?></td>
                  <td><?= h($transfer->branch_warehouse_origin_id) ?></td>
                  <td><?= h($transfer->branch_warehouse_destiny_id) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $transfer->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transfer->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transfer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transfer->id), 'class'=>'btn btn-danger btn-xs']) ?>
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