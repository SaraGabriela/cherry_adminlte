





<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Receta
      <small><?php echo __('Editar'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-5">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Detalle'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($recipe, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('raw_id',['options' => $raws,
                  'label' => 'Crudo:',
                ]);
                echo $this->Form->control('raw_filling_id',['options' => $rawFillings,
                  'label' => 'Crudo relleno:',
                ]);
                echo $this->Form->control('decoration_id',['options' => $decorations,
                  'label' => 'Decorado:',
                ]);
                echo $this->Form->control('cooking_time',[
                  'label' => 'Tiempo de cocina:',
                ]);
                echo $this->Form->control('observations',[
                'label' => 'Observaciones',
                ]);
                echo $this->Form->control('comercial_name',[
                    'label' => 'Nombre comercial:',
                ]);
                echo $this->Form->control('photo',[
                    'label' => 'Imagen',
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