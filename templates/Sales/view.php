
<section class="content-header">
  <h1>
    Venta
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
                    <label for="exampleInputEmail1">Tipo de venta:</label>
                    <dd class="form-control"><?= h($sale->sales_type) ?></dd>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Precio</label>
                    <dd class="form-control"><?= h($sale->price) ?></dd>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Cantidad</label>
                       <dd class="form-control"><?= h($sale->quantity) ?></dd>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fecha</label>
                       <dd class="form-control"><?= h($sale->date) ?></dd>
                  </div>
                </div>
                <!-- /.box-body -->
              </form>
            </div>
          </div>
        </div>
      </div>
</section>











