<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>

<section class="content">
    <div class="row">
        <div class="col-md-6">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Cliente</h3>
            </div>
            <div class="box-body">
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <div class="input-group">
                  <label>Nombres:</label>
                    <dd class="form-control"><?= h($client->name) ?></dd>
                </div>
                <!-- /.input group -->
              </div>

              <!-- phone mask -->
              <div class="form-group">
                <label>Apellidos:</label>

                <div class="input-group">
                    <dd class="form-control"><?= h($client->lastname) ?></dd>
                </div>
                <!-- /.input group -->
              </div>
                            
              <div class="form-group">
                <label>Email:</label>

                <div class="input-group">
                  <dd class="form-control"><?= h($client->email) ?></dd>
                </div>
                <!-- /.input group -->
              </div>
            
              <div class="form-group">
                <label>User:</label>

                <div class="input-group">
                  <dd class="form-control"><?= h($client->user) ?></dd>
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label>Password:</label>

                <div class="input-group">
                  <dd class="form-control"><?= h($client->password) ?></dd>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                <label>Phone:</label>

                <div class="input-group">
                  <dd class="form-control"><?= h($client->phone) ?></dd>
                </div>
                <!-- /.input group -->
              </div>

        
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

</section>
