
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Raws

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('List'); ?></h3>

          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('name','Nombre') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('equivalence_id') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($raws as $raw): ?>
                    <tr>
                        <td><?= $this->Number->format($raw->id) ?></td>
                        <td><?= h($raw->name) ?></td>
                        <td><?= h($raw->code) ?></td>
                        <td><?= $raw->has('equivalence') ? $this->Html->link($raw->equivalence->id, ['controller' => 'Equivalences', 'action' => 'view', $raw->equivalence->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $raw->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $raw->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $raw->id], ['confirm' => __('Are you sure you want to delete # {0}?', $raw->id)]) ?>
                        </td>
                    </tr>   
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>










<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Purchases

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>
<script>
function myFunction() {
  var input = document.getElementById("Search");
  var filter = input.value.toLowerCase();
  var nodes = document.getElementsByClassName('target');

  for (i = 0; i < nodes.length; i++) {
    if (nodes[i].innerText.toLowerCase().includes(filter)) {
      nodes[i].style.display = "block";
    } else {
      nodes[i].style.display = "none";
    }
  }
}
</script>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('List'); ?></h3>

          <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input id="Search" onkeyup="myFunction()" placeholder="<?php echo __('Search'); ?>">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>

                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('name','Nombre') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('equivalence_id') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <?php foreach ($purchase as $purchas): ?>
  <div class="target box box-default collapsed-box">
  
    <div class="box-header with-border">
      <div class="row">
        <div class="col-sm-2"><?= h($purchas->date) ?></div>
        <div class="col-sm-2"><?= h($purchas->person_in_charge) ?></div>
        <div class="col-sm-2"><?= h($purchas->delivery_date) ?></div>
        <div class="col-sm-2"><?= h($purchas->supplier->name) ?></div>

        <div class="col-sm-2 actions text-right">
          <?= $this->Html->link(__('View'), ['action' => 'view', $purchas->id], ['class'=>'btn btn-info btn-xs']) ?>
          <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchas->id], ['class'=>'btn btn-warning btn-xs']) ?>
          <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchas->id), 'class'=>'btn btn-danger btn-xs']) ?>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
          </div><!-- /.box-tools -->
        </div>
        
      </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Cantidad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Tipo Almacen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Observaciones') ?></th>
            </tr>
          </thead>
          <?php foreach ($purchas->purchase_products as $purchaseProducts): ?>
              <tr>
                    <td><?= h($purchaseProducts->product->name) ?></td>
                    <td><?= h($purchaseProducts->quantity) ?></td>
                    <td><?= h($purchaseProducts->warehouse->type) ?></td>
                    <td><?= h($purchaseProducts->observations) ?></td>
              </tr>
              <?php endforeach; ?>
        </table>
      </div>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
    <?php endforeach; ?>
</section>