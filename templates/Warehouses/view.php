<section class="content-header">
  <h1>
    Warehouse
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
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Type') ?></dt>
            <dd><?= h($warehouse->type) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($warehouse->id) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Branch Warehouses') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($warehouse->branch_warehouses)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Warehouse Id') ?></th>
                    <th scope="col"><?= __('Branch Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($warehouse->branch_warehouses as $branchWarehouses): ?>
              <tr>
                    <td><?= h($branchWarehouses->id) ?></td>
                    <td><?= h($branchWarehouses->warehouse_id) ?></td>
                    <td><?= h($branchWarehouses->branch_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'BranchWarehouses', 'action' => 'view', $branchWarehouses->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'BranchWarehouses', 'action' => 'edit', $branchWarehouses->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'BranchWarehouses', 'action' => 'delete', $branchWarehouses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branchWarehouses->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Purchase Products') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($warehouse->purchase_products)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Quantity') ?></th>
                    <th scope="col"><?= __('Unit') ?></th>
                    <th scope="col"><?= __('Observations') ?></th>
                    <th scope="col"><?= __('Cost By Unit') ?></th>
                    <th scope="col"><?= __('Product Id') ?></th>
                    <th scope="col"><?= __('Purchase Id') ?></th>
                    <th scope="col"><?= __('Warehouse Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($warehouse->purchase_products as $purchaseProducts): ?>
              <tr>
                    <td><?= h($purchaseProducts->id) ?></td>
                    <td><?= h($purchaseProducts->quantity) ?></td>
                    <td><?= h($purchaseProducts->unit) ?></td>
                    <td><?= h($purchaseProducts->observations) ?></td>
                    <td><?= h($purchaseProducts->cost_by_unit) ?></td>
                    <td><?= h($purchaseProducts->product_id) ?></td>
                    <td><?= h($purchaseProducts->purchase_id) ?></td>
                    <td><?= h($purchaseProducts->warehouse_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'PurchaseProducts', 'action' => 'view', $purchaseProducts->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseProducts', 'action' => 'edit', $purchaseProducts->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseProducts', 'action' => 'delete', $purchaseProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseProducts->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
