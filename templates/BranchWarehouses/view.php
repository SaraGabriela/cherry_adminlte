<section class="content-header">
  <h1>
    Almacén
    <small><?php echo __('Ver'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <!-- /.box-body -->
              <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Detalle</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sucursal:</label>
                    <dd class="form-control"><?= h($branchWarehouse->branch->name) ?></dd>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Almacen</label>
                       <dd class="form-control"><?= h($branchWarehouse->warehouse->type) ?></dd>
                  </div>
                </div>
                <!-- /.box-body -->

              </form>
            </div>
          </div>
        </div>

        <div class="col-md-9">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Productos') ?></h3>   
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($branchWarehouse->warehouse_products)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Nombre') ?></th>
                    <th scope="col"><?= __('Marca') ?></th>
                    <th scope="col"><?= __('Stock') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($branchWarehouse->warehouse_products as $warehouseProducts): ?>
              <tr>

                    <td><?= h($warehouseProducts->product->name) ?></td>
                    <td><?= h($warehouseProducts->product->brand) ?></td>
                    <td><?= h($warehouseProducts->current_stock) ?> <?= h($warehouseProducts->unit) ?> </td>


                    <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $warehouseProducts->product->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $warehouseProducts->product->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(  _('Delete'), ['controller' => 'Products', 'action' => 'delete', $warehouseProducts->product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $warehouseProducts->product->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>

    
</section>