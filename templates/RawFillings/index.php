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
  <?php foreach ($rawFillings as $rawFilling): ?>
  <div class="target box box-default collapsed-box">
  
    <div class="box-header with-border">
      <div class="column">
            <strong> <?= h($rawFilling->name) ?></strong>
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
            <th><?= h("Productos") ?></th>
            <?php $dimensions = array()?>
            <?php foreach ($rawFilling->filling_dimensions as $filling_dimension): ?>
              <td><?= h($filling_dimension->dimension->description) ?></td>
              <?= $dimensions[$filling_dimension->dimension->description]=""?>
            <?php endforeach; ?>
            </tr>
          </thead>
            
            <?php foreach ($rawFilling->filling_products as $filling_product):?>
              <tr>
                <th><?= h($filling_product->product->name) ?> </th>

                <?php foreach ($filling_product->filling_product_measures as $fil_pro_me): 
                  
                  $dimensions[$fil_pro_me->filling_dimension->dimension->description]=$fil_pro_me->quantity;
                  
                endforeach; ?>
                <?php foreach ($dimensions as $index=>$dime ): ?>
                    <td><?= 
                        h($dime);
                        $dimensions[$index]="";
                        ?></td>
                        
                <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
        </table>
      </div>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
    <?php endforeach; ?>
</section>
