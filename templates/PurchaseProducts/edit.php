<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseProduct $purchaseProduct
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Purchase Product
      <small><?php echo __('Edit'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Form'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($purchaseProduct, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('quantity');
                echo $this->Form->control('unit');
                echo $this->Form->control('observations');
                echo $this->Form->control('cost_by_unit');
                echo $this->Form->control('product_id', ['options' => $products]);
                echo $this->Form->control('purchase_id', ['options' => $purchases]);
                echo $this->Form->control('warehouse_id', ['options' => $warehouses]);
              ?>
            </div>
            <!-- /.box-body -->

          <?php echo $this->Form->submit(__('Submit')); ?>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>
