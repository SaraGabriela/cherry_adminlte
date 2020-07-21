<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Categoria
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
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($category, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
              echo $this->Form->control('name',[
                'label' => 'Nombre',
              ]);
              echo $this->Form->control('description',[
                'label' => 'Descripción',
              ]);
              echo $this->Form->control('image',[
                'label' => 'Imagen',
              ]);
                
              echo $this->Form->control('state',[
                'label' => 'Estado',
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
