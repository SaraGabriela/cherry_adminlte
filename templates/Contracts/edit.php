<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>

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
                    echo $this->Form->control('production_id', ['options' => $productions]);
                    echo $this->Form->control('alliance_id', ['options' => $alliances, 'empty' => true]);
                    echo $this->Form->control('order_date');
                    echo $this->Form->control('delivery_date');
                    echo $this->Form->control('total_price');
                    echo $this->Form->control('account_price');
                    echo $this->Form->control('description');
                    echo $this->Form->control('ubication');
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