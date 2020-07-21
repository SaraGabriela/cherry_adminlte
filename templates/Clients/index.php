<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $clients
 */
?>
<section class="content-header">
  <h1>
    Clientes
    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>



<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('Lista'); ?></h3>

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


                    <th><?= $this->Paginator->sort('name','Nombres') ?></th>
                    <th><?= $this->Paginator->sort('lastname','Apellidos') ?></th>
                    <th><?= $this->Paginator->sort('email','Email') ?></th>
                    <th><?= $this->Paginator->sort('phone','Telefono') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>

              </tr>
            </thead>
            <tbody>
              <?php foreach ($clients as $client): ?>
                <tr>


                    <td><?= h($client->name) ?></td>
                    <td><?= h($client->lastname) ?></td>
                    <td><?= h($client->email) ?></td>
                    <td><?= h($client->phone) ?></td>

                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $client->id], ['class'=>'btn btn-info btn-xs']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $client->id], ['class'=>'btn btn-warning btn-xs']) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id), 'class'=>'btn btn-danger btn-xs']) ?>
                    </td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
      </div>
    </div>
  </div>
</section>








