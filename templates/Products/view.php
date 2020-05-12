<section class="content-header">
  <h1>
    Producto
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
                    <label for="exampleInputPassword1">Nombre</label>
                       <dd class="form-control"><?= h($product->name) ?></dd>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Categoria:</label>
                    <dd class="form-control"><?= h($product->category->name) ?></dd>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Presentacion:</label>
                    <dd class="form-control"><?= h($product->presentation) ?></dd>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Marca:</label>
                    <dd class="form-control"><?= h($product->brand) ?></dd>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ultimo precio:</label>
                    <dd class="form-control">S/. <?= h($product->price) ?></dd>

                  </div>
                <!-- /.box-body -->

              </form>
            </div>
          </div>
        </div>
  </div>

</section>
