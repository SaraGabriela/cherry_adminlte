<section class="content-header">
  <h1>
    Compra
    <small><?php echo __('View'); ?></small>
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
                    <label for="exampleInputEmail1">Fecha:</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="<?= h($purchase->date) ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Proovedor</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="<?= h($purchase->supplier->name) ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Encargado</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="<?= h($purchase->person_in_charge) ?>">
                  </div>
                </div>
                <!-- /.box-body -->

              </form>
            </div>
          </div>
  <section class="content">
          <!-- /.box -->
        </div>

      <div class="col-md-9">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Lista de Productos') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($purchase->purchase_products)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Nombre') ?></th>
                    <th scope="col"><?= __('Cantidad') ?></th>
                    <th scope="col"><?= __('Observaciones') ?></th>
                    <th scope="col"><?= __('Costo') ?></th>

              </tr>
              <?=$total= 0?>
              <?php foreach ($purchase->purchase_products as $purchaseProducts): ?>
              <tr>
                    <td><?= h($purchaseProducts->product->name) ?></td>
                    <td><?= h($purchaseProducts->quantity) ?></td>

                    <td><?= h($purchaseProducts->observations) ?></td>

                    <td><?= h($purchaseProducts->cost_by_unit) ?></td>
                    
                    <?=$total = $total + $purchaseProducts->cost_by_unit?>
              </tr>
              <?php endforeach; ?>
          </table>
              <table class="table">
              <?php ?>
                <?php?>
                    <tr>
                      <td></td>
                      <td></td> 
                      <td></td>
                      <td></td> 
                      <td></td>
                      <td></td> 
                      <td></td> 
                      <td></td> 
                      <td></td> 
                      <td></td> 
                      <th style="width:35%">Subtotal:</th>
                      <td><?=$total?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td> 
                      <td></td>
                      <td></td> 
                      <td></td>
                      <td></td> 
                      <td></td> 
                      <td></td> 
                      <td></td> 
                      <td></td> 
                      <th>IGV (10.0%)</th>
                      <td>$10.34</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td> 
                      <td></td>
                      <td></td> 
                      <td></td>
                      <td></td> 
                      <td></td>
                      <td></td> 
                      <td></td> 
                      <td></td>  
                      <th>Shipping:</th>
                      <td>$5.80</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>  
                      <td></td> 
                      <td></td> 
                      <td></td> 
                      <td></td> 
                      <th>Total:</th>
                      <td><?=$total?></td>
                    </tr>
                </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>



 
</section>
</section>

