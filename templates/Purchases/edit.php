<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Compra
      <small><?php echo __('Editar'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Detalle Compra'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($purchase, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('date');
                echo $this->Form->control('person_in_charge');
                echo $this->Form->control('delivery_date');
                echo $this->Form->control('provider_id', ['options' => $suppliers]);
              ?>
            </div>
            <!-- /.box-body -->

          <?php echo $this->Form->submit(__('Submit')); ?>

          <?php echo $this->Form->end(); ?>
          
        </div>
        <!-- /.box -->
          
        
      </div>
      <div class="col-md-9">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Lista de Productos') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($purchase->purchase_products)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Nombre') ?></th>
                    <th scope="col"><?= __('Cantidad') ?></th>
                    <th scope="col"><?= __('Observaciones') ?></th>
                    <th scope="col"><?= __('Costo') ?></th>
                    
              </tr>
              <?php foreach ($purchase->purchase_products as $purchaseProducts): ?>
              <tr>
                    <td><?= h($purchaseProducts->product->name) ?></td>

                    <td><?= h($purchaseProducts->quantity) ?></td>

                    <td><?= h($purchaseProducts->observations) ?></td>

                    <td>S/.<?= h($purchaseProducts->cost_by_unit) ?></td>
                    <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseProducts->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseProducts->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseProducts->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
    </div>
    <!-- /.row -->
  </section>


