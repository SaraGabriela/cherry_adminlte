<section class="content-header">
  <h1>
    Sucursal
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
                    <label for="exampleInputEmail1">Nombre:</label>
                    <dd class="form-control"><?= h($branch->name) ?></dd>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Direccion</label>
                    <dd class="form-control"><?= h($branch->address) ?></dd>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Encargado</label>
                       <dd class="form-control"><?= h($branch->person_in_charge) ?></dd>
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
          <h3 class="box-title"><?= __('Almacenes') ?></h3>
         <div class="pull-right"><?php echo $this->Html->link(__('Crear almacen'), ['controller' => 'Warehouses','action' => 'add'], ['class'=>'btn btn-success btn-xs-1']) ?></div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($branch->branch_warehouses)): ?>
          <table class="table table-hover">
              <tr>

                    <th scope="col"><?= __('Tipo') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($branch->branch_warehouses as $branchWarehouses): ?>
              <tr>
                    <td><?= h($branchWarehouses->warehouse->type) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'BranchWarehouses', 'action' => 'view', $branchWarehouses->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'BranchWarehouses', 'action' => 'edit', $branchWarehouses->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(  _('Delete'), ['controller' => 'BranchWarehouses', 'action' => 'delete', $branchWarehouses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branchWarehouses->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
