<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equivalence $equivalence
 */
?>
<section class="content">
    <?php echo $this->Html->script('jquery-3.5.1.min.js');?>
    <div class="row">
    <?= $this->Form->create($equivalence) ?>
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
                            echo $this->Form->control('description');
                        ?>

                
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Añadir Crudo</h3>
                    <div class="box-tools pull-right">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <th><a style="cursor:pointer;" class ='btn btn-primary btn-xs' onclick="clickAddRaw();">Añadir</a></th>

                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">
                    <table>

                        <?php if ($this->request->getData()) :?>
                            <?php foreach ($this->request->data['raws'] as $i=>$v) :?>
                            <tr id="tr<?php echo $i;?>">
                                <td><?php echo $i ?>
                                    
                                <td><?php echo $this->Form->control('raws.'.$i.'.name');?>
                                <td><?php echo $this->Form->control('raws.'.$i.'.code');?>
                                    
                                <td><a style="cursor:pointer;" onclick="$('#tr<?php echo $i;?>').detach();"><span style="background:#aaa;padding:1px 8px;">-</span></a></td>
                            </tr>
                            <?php endforeach;?> 
                        <?php else : ?>
                            <tr id="tr0">
                                
                            <td><?php echo $this->Form->control('raws.0.name');?>
                            <td><?php echo $this->Form->control('raws.0.code');?>
                            <td><a style="cursor:pointer;" onclick="$('#tr0').detach();"><span style="background:#aaa;padding:1px 8px;">-</span></a></td>
                            </tr>
                        <?php endif; ?>
                        
                        <tr id="trHiddenCounterDetailr" style="display:none;">
                            <input id="tr_d_counterDetailr" type="hidden" value="<?php echo $this->request->getData()?(sizeof($this->request->data['raws'])-1):0;?>">
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Añadir Dimensines</h3>
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
                            <?php foreach ($this->request->data['equivalence_dimensions'] as $i=>$v) :?>
                            <tr id="tr<?php echo $i;?>">
                                <td><?php echo $i ?>
                                    
                                <td><?php echo $this->Form->control('equivalence_dimensions.'.$i.'.dimension_id', ['options' => $dimensions]);?>
                                <td><?php echo $this->Form->control('equivalence_dimensions.'.$i.'.quantity_recipes');?>
                                    
                                <td><a style="cursor:pointer;" onclick="$('#tr<?php echo $i;?>').detach();"><span style="background:#aaa;padding:1px 8px;">-</span></a></td>
                            </tr>
                            <?php endforeach;?> 
                        <?php else : ?>
                            <tr id="tr0">
                                
                            
                            <td><?php echo $this->Form->control('equivalence_dimensions.0.dimension_id', ['options' => $dimensions]);?>
                            <td><?php echo $this->Form->control('equivalence_dimensions.0.quantity_recipes');?>
                            <td><a style="cursor:pointer;" onclick="$('#tr0').detach();"><span style="background:#aaa;padding:1px 8px;">-</span></a></td>
                            </tr>
                        <?php endif; ?>
                        
                        <tr id="trHiddenCounterDetail" style="display:none;">
                            <input id="tr_d_counterDetail" type="hidden" value="<?php echo $this->request->getData()?(sizeof($this->request->data['equivalence_dimensions'])-1):0;?>">
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
     <!-- Ini adalah duplikasi elemen row detail, yang akan dipakai dalam penambahan row baru melalui javascript -->
     <div style="display:none;" id="htmlRaw">
        <xzztr id="trzzz">

            <xzztd><?php echo $this->Form->control('raws.zzz.name');?></td>
            <xzztd><?php echo $this->Form->control('raws.zzz.code');?></td>
            <xzztd><a style="cursor:pointer;" onclick="$('#trzzz').detach();"><span style="background:#aaa;padding:1px 8px;">-</span></a></xzztd>
        </xzztr>
    </div>
 
   <div style="display:none;" id="htmlDetail">
        <xzztr id="trzzz">

            <xzztd><?php echo $this->Form->control('equivalence_dimensions.zzz.dimension_id', ['options' => $dimensions]);?></td>
            <xzztd><?php echo $this->Form->control('equivalence_dimensions.zzz.quantity_recipes');?></td>
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

        function clickAddRaw(){
            html=$('#htmlRaw').html().toString();
            var nextCounter=Number($('#tr_d_counterDetailr').val())+1;
            $('#tr_d_counterDetailr').val(nextCounter);
            while (html != (html = html.replace("zzz", nextCounter)));
                while (html != (html = html.replace("xzz", '')));
                    $('#trHiddenCounterDetailr').before(html);
        }
    </script>
</section>