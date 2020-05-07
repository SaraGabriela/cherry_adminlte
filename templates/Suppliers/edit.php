<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Proveedor
      <small><?php echo __('Editar'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Tabla'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Form'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($supplier, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('name',[
                  'label' => 'Nombre',
                ]);
                echo $this->Form->control('address',[
                  'label' => 'Dirección de Proveedor'
                ]);
                echo $this->Form->control('contact_name',[
                  'label' => 'Nombre de contacto'
                ]);
                echo $this->Form->control('contact_phone',[
                  'label' => 'Telefono de contacto'
                ]);
              ?>
            </div>
            <!-- /.box-body -->

          <?php echo $this->Form->submit(__('Editar')); ?>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>
