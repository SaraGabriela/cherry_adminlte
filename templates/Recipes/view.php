





<section class="content-header">
  <h1>
    Receta
    <small><?php echo __('Ver'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-2">
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
                    <label for="exampleInputEmail1">Crudo:</label>
                    <dd class="form-control"><?= h($recipe->raw->name) ?></dd>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Crudo relleno:</label>
                    <dd class="form-control"><?= h($recipe->raw_filling->name) ?></dd>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Decorado:</label>
                       <dd class="form-control"><?= h($recipe->decoration->description) ?></dd>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Tiempo de preparado:</label>
                       <dd class="form-control"><?= h($recipe->cooking_time) ?></dd>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Observaciones:</label>
                       <dd class="form-control"><?= h($recipe->observations) ?></dd>
                  </div>
            
                <div class="form-group">
                    <label for="exampleInputPassword1">Nombre Comercial:</label>
                       <dd class="form-control"><?= h($recipe->comercial_name) ?></dd>
                  </div>
                

                <div class="form-group">
                    <label for="exampleInputPassword1">Foto:</label>
                       <dd class="form-control"><?= h($recipe->photo) ?></dd>
                  </div>
                </div>
                <!-- /.box-body -->
              </form>
            </div>
          </div>
        </div>


    <div class="col-md-6">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Dimensiones') ?></h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($recipe->recipe_dimensions)): ?>
          <table class="table table-hover">
              <tr>
              <th scope="col"><?= $this->Paginator->sort('Dimension','Dimensiones') ?></th>

              <th scope="col"><?= $this->Paginator->sort('Price','Precio') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Description','Descripcion') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>


              </tr>
              <?php foreach ($recipe->recipe_dimensions as $recipeDimensions): ?>
              <tr>

                            <td><?= h($recipeDimensions->dimension->description) ?></td>
               
                            <td><?= h($recipeDimensions->price) ?></td>
                            <td><?= h($recipeDimensions->description) ?></td>

                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'RecipeDimensions', 'action' => 'view', $recipeDimensions->recipe_dimensions_id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'RecipeDimensions', 'action' => 'edit', $recipeDimensions->recipe_dimensions_id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(  _('Delete'), ['controller' => 'RecipeDimensions', 'action' => 'delete', $recipeDimensions->recipe_dimensions_id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipeDimensions->recipe_dimensions_id), 'class'=>'btn btn-danger btn-xs']) ?>
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