<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Crudo Equivalencias
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
        <div class="input-group input-group-sm" style="width: 150px;">
        <input id="Search" onkeyup="myFunction()" placeholder="<?php echo __('Search'); ?>">
            <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
  </div>
  <?php foreach ($equivalences as $equivalence): ?>
  <div class="target box box-default collapsed-box">
  
    <div class="box-header with-border">
      <div class="column">
        <?php foreach ($equivalence->raws as $raw): ?>
            <strong> <?= h($raw->name) ?> |</strong>
        <?php endforeach; ?>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
          </div>
      </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <tr>
            <th><?= h("dimensiones") ?></th>
            <?php foreach ($equivalence->equivalence_dimensions as $equivalence_dimension): ?>
              
                    <td><?= h($equivalence_dimension->dimension->description) ?></td>
              
            <?php endforeach; ?>
            </tr>
          </thead>
            <tr>
            <th><?= h("equivalencias") ?></th>
            <?php foreach ($equivalence->equivalence_dimensions as $equivalence_dimension): ?>
                    <td><?= h($equivalence_dimension->quantity_recipes) ?></td>
            <?php endforeach; ?>
            </tr>
        </table>
      </div>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
    <?php endforeach; ?>
</section>