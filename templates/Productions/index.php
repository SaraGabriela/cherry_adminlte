<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Production[]|\Cake\Collection\CollectionInterface $productions
 */
?>

<section class="content-header">
  <h1 class="text-center">
     <b>PANEL DE CONTROL "PRODUCCIONES"</b>
    <div class="pull-right"><?php echo $this->Html->link(__('NUEVO'), ['action' => 'add'], ['class'=>'text-bold btn btn-success']) ?></div>
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
  <?php foreach ($productions as $production): ?>
  <div class="target box box-default collapsed-box">
  
    <div class="box-header with-border">
      <div class="column">
            <strong> <?= h("Fecha: ") ?></strong>
            <strong> <?= h($production->date) ?></strong>
            <strong> <?= h("|") ?></strong>
            <strong> <?= h("Numero de tortas: ") ?></strong>
            <strong> <?= h($production->number_cakes) ?></strong>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
      </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <th><?= h("Tortas") ?></th>
            <th><?= h("Sucursal") ?></th>
            <th><?= h("Prioridad") ?></th>
            <th><?= h("Cantidad") ?></th>
            <?php foreach ($production->production_recipes as $production_recipe): ?>
              <tr>
              <td><?= h($production_recipe->recipe_dimension->recipe->comercial_name) ?>
              <?= h("X")?> 
              <?= h($production_recipe->recipe_dimension->dimension->description)?>
              <?= h("cm")?>  
              </td>
              <?php foreach ($production_recipe->prodrecipe_details as $prodrecipe_detail): ?>
                <td><?= h($prodrecipe_detail->branch->name) ?></td>
                <td><?= h($prodrecipe_detail->priority) ?></td>
                <td><?= h($prodrecipe_detail->quantity) ?></td>
              <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
          </thead>
        </table>
      </div>
       <div class="text-right">
         <br>
          <?= $this->Html->link(__("DETALLES"), ['action' => 'view', $production->id], ['class'=>'text-bold btn btn-primary btn-sm']) ?>
          <?= $this->Html->link(__("EDITAR"), ['action' => 'edit', $production->id], ['class'=>'text-bold btn btn-warning btn-sm']) ?>
          <?= $this->Form->postLink(__("ELIMINAR"), ['action' => 'delete', $production->id], ['confirm' => __('Are you sure you want to delete # {0}?', $production->id), 'class'=>'text-bold btn btn-danger btn-sm']) ?>
       </div>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
  
    <?php endforeach; ?>
      <div class="paginator text-center">
          <ul class="pagination">
              <?= $this->Paginator->first('<< ' . __('first')) ?>
              <?= $this->Paginator->prev('< ' . __('previous')) ?>
              <?= $this->Paginator->numbers() ?>
              <?= $this->Paginator->next(__('next') . ' >') ?>
              <?= $this->Paginator->last(__('last') . ' >>') ?>
          </ul>
          <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
      </div>
</section>