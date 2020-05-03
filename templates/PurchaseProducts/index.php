<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Purchase Products

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
                  <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('unit') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('observations') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('cost_by_unit') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('purchase_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('warehouse_id') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($purchaseProducts as $purchaseProduct): ?>
                <tr>
                  <td><?= $this->Number->format($purchaseProduct->id) ?></td>
                  <td><?= $this->Number->format($purchaseProduct->quantity) ?></td>
                  <td><?= $this->Number->format($purchaseProduct->unit) ?></td>
                  <td><?= h($purchaseProduct->observations) ?></td>
                  <td><?= $this->Number->format($purchaseProduct->cost_by_unit) ?></td>
                  <td><?= $this->Number->format($purchaseProduct->product_id) ?></td>
                  <td><?= $this->Number->format($purchaseProduct->purchase_id) ?></td>
                  <td><?= $this->Number->format($purchaseProduct->warehouse_id) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseProduct->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseProduct->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseProduct->id), 'class'=>'btn btn-danger btn-xs']) ?>
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