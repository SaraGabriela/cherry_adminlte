<section class="content-header">
  <h1>
    Proveedor
    <small><?php echo __('Ver Proveedor'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Tabla'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Información'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Identificador') ?></dt>
            <dd><?= $this->Number->format($supplier->id) ?></dd>
            <dt scope="row"><?= __('Nombre de Proveedor') ?></dt>
            <dd><?= h($supplier->name) ?></dd>
            <dt scope="row"><?= __('Dirección de Proveedor') ?></dt>
            <dd><?= h($supplier->address) ?></dd>
            <dt scope="row"><?= __('Nombre del contacto') ?></dt>
            <dd><?= h($supplier->contact_name) ?></dd>
            <dt scope="row"><?= __('Telefono del contacto') ?></dt>
            <dd><?= $this->Number->format($supplier->contact_phone) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
