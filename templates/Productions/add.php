<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Production $production
 */
?>

<section class="content">
    <?php echo $this->Html->script('jquery-3.5.1.min.js');?>
    <div class="row">
        <?= $this->Form->create($production) ?>
        <div class="col-md-8">
            <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Añadir Tortas</h3>
                    <div class="box-tools pull-right">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <th><a style="cursor:pointer;" class ='btn btn-primary btn-xs' onclick="clickAddDetail();">Añadir</a></th>

                    </div>
                    <!-- /.box-tools -->
                </div>
                <?php echo $this->Form->hidden('date', array('value' => date("Y-m-d")));
                echo $this->Form->hidden('number_cakes', array('value' => 0));
                echo $this->Form->hidden('observations', array('value' => "null"));
                
                ?>
                <div class="box-body">
                    <table>
                        <tr id="ta0"> 
                            <tr>
                            <td><?php echo $this->Form->control('production_recipes.0.recipe_dimension_id', ['options' => $recipe_dimensions]);?>
                            <td><?php echo $this->Form->control('production_recipes.0.recipe_dimension_id.0.branch', ['options' => $branches]);?>
                            </tr>
                            <td><?php echo $this->Form->control('production_recipes.0.prodrecipe_details.0.priority');?>                                                                                                    
                            <?php echo $this->Form->hidden('production_recipes.0.prodrecipe_details.0.phase', array('value' => 'esquema'));?>
                            <td><?php echo $this->Form->control('production_recipes.0.prodrecipe_details.0.quantity');?>
                            <td><?php echo $this->Form->control('production_recipes.0.prodrecipe_details.0.observations');?>
                            <td><a style="cursor:pointer;" onclick="$('#ta0').detach();"><span style="background:#aaa;padding:1px 8px;">-</span></a></td>
                        </tr>
                        <tr id="trHiddenCounterDetaild" style="display:none;">
                            <input id="tr_d_counterDetaild" type="hidden" value="<?php // $this->request->getData()?(sizeof($this->request->data['production_recipes'])-1):0;?>">
                        </tr>
                        
                    </table>
                    
                </div>
            </div>
        </div>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
    <div style="display:none;" id="htmlDetail">
        <xzztr id="trzzz">
            <xzztr>
            <xzztd><?php echo $this->Form->control('production_recipes.zzz.recipe_dimension_id', ['options' => $recipe_dimensions]);?>
            <xzztd><?php echo $this->Form->control('production_recipes.zzz.recipe_dimension_id.zzz.branch', ['options' => $branches]);?>
            </xzztr>
            <xzztd><?php echo $this->Form->control('production_recipes.zzz.prodrecipe_details.zzz.priority');?>                                                                                                    
            <?php echo $this->Form->hidden('production_recipes.zzz.prodrecipe_details.zzz.phase', array('value' => 'esquema'));?>
            <xzztd><?php echo $this->Form->control('production_recipes.zzz.prodrecipe_details.zzz.quantity');?>
            <xzztd><?php echo $this->Form->control('production_recipes.zzz.prodrecipe_details.zzz.observations');?>
            <xzztd><a style="cursor:pointer;" onclick="$('#trzzz').detach();"><span style="background:#aaa;padding:1px 8px;">-</span></a></xzztd>
        </xzztr>
    </div>
    <!-- script yang dipanggil dari form detail -->
    <script type="text/javascript">

        function clickAddDetail(){
            html=$('#htmlDetail').html().toString();
            var nextCounter=Number($('#tr_d_counterDetaild').val())+1;
            $('#tr_d_counterDetaild').val(nextCounter);
            while (html != (html = html.replace("zzz", nextCounter)));
                while (html != (html = html.replace("xzz", '')));
                    $('#trHiddenCounterDetaild').before(html);
        }
    </script>
</section>