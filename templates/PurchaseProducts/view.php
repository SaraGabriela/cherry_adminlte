<section class="content-header">
  <h1>
    Purchase Product
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Observations') ?></dt>
            <dd><?= h($purchaseProduct->observations) ?></dd>
            <dt scope="row"><?= __('Product') ?></dt>
            <dd><?= $purchaseProduct->has('product') ? $this->Html->link($purchaseProduct->product->name, ['controller' => 'Products', 'action' => 'view', $purchaseProduct->product->id]) : '' ?></dd>
            <dt scope="row"><?= __('Purchase') ?></dt>
            <dd><?= $purchaseProduct->has('purchase') ? $this->Html->link($purchaseProduct->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseProduct->purchase->id]) : '' ?></dd>
            <dt scope="row"><?= __('Warehouse') ?></dt>
            <dd><?= $purchaseProduct->has('warehouse') ? $this->Html->link($purchaseProduct->warehouse->id, ['controller' => 'Warehouses', 'action' => 'view', $purchaseProduct->warehouse->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($purchaseProduct->id) ?></dd>
            <dt scope="row"><?= __('Quantity') ?></dt>
            <dd><?= $this->Number->format($purchaseProduct->quantity) ?></dd>
            <dt scope="row"><?= __('Unit') ?></dt>
            <dd><?= $this->Number->format($purchaseProduct->unit) ?></dd>
            <dt scope="row"><?= __('Cost By Unit') ?></dt>
            <dd><?= $this->Number->format($purchaseProduct->cost_by_unit) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
