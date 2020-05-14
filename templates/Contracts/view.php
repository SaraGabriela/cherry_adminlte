<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<section class="content">
    <div class="row">
        <div class="col-md-6">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Contrato</h3>
            </div>
            <div class="box-body">
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <div class="input-group">
                  <label for="exampleInputEmail1">Nombre cliente:</label>
                    <dd class="form-control"><?= $contract->has('client') ? $contract->client->name : ''  ?></dd>
                </div>
                <!-- /.input group -->
              </div>

              <!-- phone mask -->
              <div class="form-group">
                <label>Alianza:</label>

                <div class="input-group">
                     <dd class="form-control"><?= $contract->has('alliance') ? $contract->alliance->client : ''  ?></dd>
                </div>
                <!-- /.input group -->
              </div>
                            
              <div class="form-group">
                <label>Ubicacion:</label>

                <div class="input-group">
                  <dd class="form-control"><?= h($contract->branch->name) ?></dd>
                </div>
                <!-- /.input group -->
              </div>
            
              <div class="form-group">
                <label>Descripción:</label>

                <div class="input-group">
                  <dd class="form-control"><?= h($contract->description) ?></dd>
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label>Precio Total:</label>

                <div class="input-group">
                  <dd class="form-control">S/.<?= h($contract->total_price) ?></dd>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                <label>Precio Cancelado:</label>

                <div class="input-group">
                  <dd class="form-control">S/.<?= h($contract->account_price) ?></dd>
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Fecha de contrato:</label>

                <div class="input-group">
                  <dd class="form-control"><?= h($contract->order_date) ?></dd>
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Fecha de entrega:</label>

                <div class="input-group">
                  <dd class="form-control"><?= h($contract->delivery_date) ?></dd>
                </div>
                <!-- /.input group -->
              </div>

        
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

</section>