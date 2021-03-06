
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Branch $branch
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Stock Tortas
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
          <?php echo $this->Form->create($stock, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('recipe_dimensions_id',['options' => $recipeDimensions,
                  'label' => 'Receta',
                ]);
                echo $this->Form->control('branch_id', ['options' => $branches,
                  'label' => 'Dirección',
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

