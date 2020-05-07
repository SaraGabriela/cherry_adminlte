<section class="content-header">
  <h1>
    Preparaciones previas
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Preparación Previa</h3>
                    <div class="box-tools pull-right">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $previousPreparation->id], ['class'=>'btn btn-warning btn-xs']) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $previousPreparation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $previousPreparation->id), 'class'=>'btn btn-danger btn-xs']) ?>
                        <?= $this->Html->link(__('Ver Tabla'), ['action' => 'index'], ['class' => 'btn btn-primary btn-xs']) ?>
                        <?= $this->Html->link(__('Nuevo'), ['action' => 'add'], ['class' => 'btn btn-primary btn-xs']) ?>

                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">
                
                    <dl class="dl-horizontal">
                    <dt scope="row"><?= __('Nombre') ?></dt>
                    <dd><?= h($previousPreparation->name) ?></dd>
                    <dt scope="row"><?= __('Descripción') ?></dt>
                    <dd><?= h($previousPreparation->description) ?></dd>
                    <dt scope="row"><?= __('Cantidad producida') ?></dt>
                    <dd><?= $this->Number->format($previousPreparation->quantity_produced) ?></dd>
                        <div class="related">
                            <h4><?= __('Productos') ?></h4>
                            <?php if (!empty($previousPreparation->preparation_products)) : ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Producto') ?></th>
                                        <th><?= __('Cantidad') ?></th>
                                        <th><?= __('Unidad de medida') ?></th>
                                        <th class="actions"><?= __('Opciones') ?></th>
                                    </tr>
                                    <?php foreach ($previousPreparation->preparation_products as $preparationProducts) : ?>
                                    <tr>
                                        <td><?= h($preparationProducts->id) ?></td>
                                        <td><?= h($preparationProducts->product->name) ?></td>
                                        <td><?= h($preparationProducts->quantity) ?></td>
                                        <td><?= h($preparationProducts->unit) ?></td>
                                        <td class="text-center">
                                            <?= $this->Html->link(__('Ver'), ['controller' => 'PreparationProducts','action' => 'view', $preparationProducts->id], ['class'=>'btn btn-info btn-xs']) ?>
                                            <?= $this->Html->link(__('Editar'), ['controller' => 'PreparationProducts','action' => 'edit', $preparationProducts->id], ['class'=>'btn btn-warning btn-xs']) ?>
                                            <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'PreparationProducts','action' => 'delete', $preparationProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $previousPreparation->id), 'class'=>'btn btn-danger btn-xs']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <?php endif; ?>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</section>