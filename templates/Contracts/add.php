<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>


  <section class="content-header">
    <h1>
      Contratos
      <small><?php echo __('Add'); ?></small>
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
          <?= $this->Form->create($contract) ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('client_id', ['options' => $clients, 'empty' => true]);
                ?>
                <?= $this->Html->link(__('Crear Cliente'), ['controller' => 'Clients','action' => 'add'], ['class' => 'btn btn-block btn-success']) ?>
                
                <?php
                echo $this->Form->control('production_id', ['options' => $productions]);
                echo $this->Form->control('alliance_id', ['options' => $alliances, 'empty' => true]);
                echo $this->Form->control('order_date');
                echo $this->Form->control('delivery_date');
                echo $this->Form->control('total_price');
                echo $this->Form->control('account_price');
                echo $this->Form->control('description');
                echo $this->Form->control('branch_id', ['options' => $branches]);
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







