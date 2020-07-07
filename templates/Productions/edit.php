<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Production $production
 */
?>
<?php
 C
?>
<section class="content">
    <?php echo $this->Html->script('jquery-3.5.1.min.js');?>
    <div class="row">
    <?= $this->Form->create($production) ?>
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
                    
                    <?php echo $this->Form->control('date');
                        echo $this->Form->control('number_cakes');
                        echo $this->Form->control('observations');
                    
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
                        $fipro=$production['production_recipes'];
                        //print_r($fipro);
                        $person = Array();
                        $person['name'] = "Joe";
                        $person['age'] = 22;
                        if ($fipro) :?>
                            <?php foreach ($fipro as $j=>$b) :?>
                                <?php  
                                print($j);
                                print_r($b['recipe_dimension']['description']);
                                 ?>   
                               
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
