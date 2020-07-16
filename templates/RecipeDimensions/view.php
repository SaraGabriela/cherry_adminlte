<section class="content-header">
  <h1>
    Receta Dimensiones
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
                    <label for="exampleInputEmail1">Dimensiones:</label>
                    <dd class="form-control"><?= h($recipeDimension->dimension->description) ?></dd>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Receta:</label>
                    <dd class="form-control"><?= h($recipeDimension->recipe->id) ?></dd>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Precio:</label>
                       <dd class="form-control"><?= h($recipeDimension->price) ?></dd>
                  </div>        
                <div class="form-group">
                    <label for="exampleInputPassword1">Descripción:</label>
                       <dd class="form-control"><?= h($recipeDimension->description) ?></dd>
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
          <h3 class="box-title"><?= __('Produccion Receta') ?></h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($recipeDimension->production_recipes)): ?>
          <table class="table table-hover">
              <tr>
              <th scope="col"><?= $this->Paginator->sort('Dimension','Dimensiones') ?></th>

              <th scope="col"><?= $this->Paginator->sort('Price','Precio') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Description','Descripcion') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>


              </tr>
              <?php foreach ($recipeDimension->production_recipes as $productionRecipes): ?>
              <tr>

              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
      </div>






</section>