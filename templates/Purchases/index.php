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
                  <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('person_in_charge') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('delivery_date') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('provider_id') ?></th>
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
  <?php foreach ($purchases as $purchase): ?>
  <div class="target box box-default collapsed-box">
  
    <div class="box-header">
      <div class="row">
        <div class="col-sm-3"><?= h($purchase->date) ?></div>
        <div class="col-sm-2"><?= h($purchase->person_in_charge) ?></div>
        <div class="col-sm-3"><?= h($purchase->delivery_date) ?></div>
        <div class="col-sm-2"><?= $this->Number->format($purchase->provider_id) ?></div>
        <div class="col-sm-2 actions text-right">
          <?= $this->Html->link(__('View'), ['action' => 'view', $purchase->id], ['class'=>'btn btn-info btn-xs']) ?>
          <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchase->id], ['class'=>'btn btn-warning btn-xs']) ?>
          <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id), 'class'=>'btn btn-danger btn-xs']) ?>
          <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
          </div><!-- /.box-tools -->
        </div>
        
      </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      The body of the box
    </div><!-- /.box-body -->
  </div><!-- /.box -->
    <?php endforeach; ?>
</section>