<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Purchase
      <small><?php echo __('Add'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->



<?php echo $this->Html->script('jquery-3.5.1.min.js');?>
    <div class="row">
    <?= $this->Form->create($purchase) ?>
        <div class="col-md-6">
            <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Añadir Preparación Previa</h3>
                    <div class="box-tools pull-right">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <?= $this->Html->link(__('Ver Tabla'), ['action' => 'index'], ['class' => 'btn btn-primary btn-xs']) ?>

                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">
                    
                        <?php
                            echo $this->Form->control('person_in_charge');
                            echo $this->Form->control('date');
                            echo $this->Form->control('delivery_date');  
                            echo $this->Form->control('provider_id', ['options' => $suppliers]);
                        ?>

                
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Añadir Preparación Previa</h3>
                    <div class="box-tools pull-right">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <th><a style="cursor:pointer;" class ='btn btn-primary btn-xs' onclick="clickAdd();">Añadir</a></th>

                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">
                    <table>

                        <?php if ($this->request->getData()) :?>
                            <?php foreach ($this->request->data['purchase_products'] as $i=>$v) :?>
                            <tr id="tr<?php echo $i;?>">
                                <td><?php echo $i ?>
                                    
                                <td><?php echo $this->Form->control('purchase_products.'.$i.'.product_id', ['options' => $products]);?>
                                <td><?php echo $this->Form->control('purchase_products.'.$i.'.warehouse_id', ['options' => $warehouses]);?>
                                <td><?php echo $this->Form->control('purchase_products.'.$i.'.quantity');?>
                                <td><?php echo $this->Form->control('purchase_products.'.$i.'.unit');?>
                                <td><?php echo $this->Form->control('purchase_products.'.$i.'.observations');?>
                                <td><?php echo $this->Form->control('purchase_products.'.$i.'.cost_by_unit');?>
                                    
                                <td><a style="cursor:pointer;" onclick="$('#tr<?php echo $i;?>').detach();"><span style="background:#aaa;padding:1px 8px;">-</span></a></td>
                            </tr>
                            <?php endforeach;?> 
                        <?php else : ?>
                            <tr id="tr0">
                                
                            
                            <td><?php echo $this->Form->control('purchase_products.0.product_id', ['options' => $products]);?>
                            <td><?php echo $this->Form->control('purchase_products.0.warehouse_id', ['options' => $warehouses]);?>
                            <td><?php echo $this->Form->control('purchase_products.0.quantity');?>
                            <td><?php echo $this->Form->control('purchase_products.0.unit');?>
                            <td><?php echo $this->Form->control('purchase_products.0.observations');?>
                            <td><?php echo $this->Form->control('purchase_products.0.cost_by_unit');?>


                            <td><a style="cursor:pointer;" onclick="$('#tr0').detach();"><span style="background:#aaa;padding:1px 8px;">-</span></a></td>
                            </tr>
                        <?php endif; ?>
                        
                        <tr id="trHiddenCounterDetail" style="display:none;">
                            <input id="tr_d_counterDetail" type="hidden" value="<?php echo $this->request->getData()?(sizeof($this->request->data['purchase_products'])-1):0;?>">
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
    
    <!-- Ini adalah duplikasi elemen row detail, yang akan dipakai dalam penambahan row baru melalui javascript -->
    <div style="display:none;" id="htmlDetail">
    <xzztr id="trzzz">

    <xzztd><?php echo $this->Form->control('purchase_products.zzz.product_id', ['options' => $products]);?></td>
    <xzztd><?php echo $this->Form->control('purchase_products.zzz.warehouse_id', ['options' => $warehouses]);?></td>
    <xzztd><?php echo $this->Form->control('purchase_products.zzz.quantity');?></td>
    <xzztd><?php echo $this->Form->control('purchase_products.zzz.unit');?></td>
    <xzztd><?php echo $this->Form->control('purchase_products.zzz.observations');?></td>
    <xzztd><?php echo $this->Form->control('purchase_products.zzz.cost_by_unit');?></td>
    <xzztd><a style="cursor:pointer;" onclick="$('#trzzz').detach();"><span style="background:#aaa;padding:1px 8px;">-</span></a></xzztd>
    </xzztr>
    </div>
    
    <!-- script yang dipanggil dari form detail -->
    <script type="text/javascript">
        function clickAdd(){
            html=$('#htmlDetail').html().toString();
            var nextCounter=Number($('#tr_d_counterDetail').val())+1;
            $('#tr_d_counterDetail').val(nextCounter);
            while (html != (html = html.replace("zzz", nextCounter)));
                while (html != (html = html.replace("xzz", '')));
                    $('#trHiddenCounterDetail').before(html);
        }
    </script>