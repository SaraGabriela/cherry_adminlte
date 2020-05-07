<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RawProduct[]|\Cake\Collection\CollectionInterface $rawProducts
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Raw Products

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
                  <th scope="col"><?= $this->Paginator->sort('raw_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($rawProducts as $rawProduct): ?>
                <tr>
                    <td><?= $this->Number->format($rawProduct->id) ?></td>
                    <td><?= $rawProduct->has('raw') ? $this->Html->link($rawProduct->raw->name, ['controller' => 'Raws', 'action' => 'view', $rawProduct->raw->id]) : '' ?></td>
                    <td><?= $rawProduct->has('product') ? $this->Html->link($rawProduct->product->name, ['controller' => 'Products', 'action' => 'view', $rawProduct->product->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $rawProduct->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rawProduct->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rawProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rawProduct->id)]) ?>
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


