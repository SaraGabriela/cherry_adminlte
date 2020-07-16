





<section class="content-header">
  <h1>
    Stock Tortas
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
                    <dd class="form-control"><?= h($stock->recipe_dimension->recipe->comercial_name) ?></dd>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Dimensiones</label>
                    <dd class="form-control"><?= h($stock->recipe_dimension->dimension->description) ?></dd>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Cantidad</label>
                       <dd class="form-control"><?= h($stock->quantity) ?></dd>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sucursal</label>
                       <dd class="form-control"><?= h($stock->branch->name) ?></dd>
                  </div>
                </div>
                <!-- /.box-body -->
              </form>
            </div>
          </div>
        </div>

      </div>
</section>