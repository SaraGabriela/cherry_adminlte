<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Decoration $decoration
 */
?>
<section class="content">
    <?php echo $this->Html->script('jquery-3.5.1.min.js');?>
    <div class="row">
    <?= $this->Form->create($decoration) ?>
        <div class="col-md-4">
            <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Añadir Crudo Relleno</h3>
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
                            echo $this->Form->control('code');
                        ?>

                
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Añadir Productos</h3>
                    <div class="box-tools pull-right">
                    <!-- Buttons, labels, and many other things can be placed here! -->


                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">
                    <table>

                        <?php 
                        $fipro=$decoration['decoration_products'];
                        $fidim=$decoration['decoration_dimensions'];
                        if ($fipro) :?>
                            <?php foreach ($fidim as $j=>$b) :?>
                                <?php  echo $this->Form->hidden('decoration_dimensions.'.$j.'.id', array('value' => $b['id'])); ?>   
                                <td><?php echo $this->Form->control('decoration_dimensions.'.$j.'.dimension_id', ['options' => $dimensions]);?>
                                <?php ;
                                    foreach ($fipro as $i=>$v) :?>
                                    <tr id="tr<?php echo $i;?>">
                                        
                                        <?php echo $this->Form->hidden('decoration_dimensions.'.$j.'.decoration_product_measures.'.$i.'.id', array('value' => $v['id']));?>
                                        <td><?php echo $this->Form->control('decoration_dimensions.'.$j.'.decoration_product_measures.'.$i.'.decoration_product_id', ['options' => $pro, 'label'=>'Producto']);?>
                                        <td><?php echo $this->Form->control('decoration_dimensions.'.$j.'.decoration_product_measures.'.$i.'.quantity',[ 'label'=>'Cantidad']);?>
                                        <td><?php echo $this->Form->control('decoration_dimensions.'.$j.'.decoration_product_measures.'.$i.'.unit',[ 'label'=>'Unidad']);?>
                                    
                                    </td>
                                    </tr>
                                
                                <?php endforeach;?> 
                               
                            <?php endforeach;?> 
                        <?php endif; ?>
                        
                    </table>
                </div>
            </div>
        </div>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>

</section>
