

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      Venta
      <small><?php echo __('Editar'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Detalle'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($sale, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('date',[
                  'label' => 'Fecha',
                ]);
                echo $this->Form->control('price',[
                  'label' => 'Precio',
                ]);
                echo $this->Form->control('sales_type',[
                  'label' => 'Tipo de Venta',
                ]);
                echo $this->Form->control('quantity',[
                    'label' => 'Cantidad',
                  ]);

              ?>
            </div>
            <!-- /.box-body -->

          <?php echo $this->Form->submit(__('Aceptar')); ?>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>
