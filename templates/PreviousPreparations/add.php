<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PreviousPreparation $previousPreparation
 * @var \App\Model\Entity\PreparationProducts $preparationProduct
 * 
 */
?>
<section class="content-header">
</section>
<section class="content">
    <div class="row">
        <?= $this->Form->create($previousPreparation) ?>
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
                            echo $this->Form->control('name');
                            echo $this->Form->control('description');
                            echo $this->Form->control('quantity_produced');  
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
                    <?= $this->Html->link(__('Ver Tabla'), ['action' => 'index'], ['class' => 'btn btn-primary btn-xs']) ?>

                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">
                        <?php
                            for($i=0;$i<3;$i++){
                                echo $this->Form->control('preparation_products.'.$i.'.product_id', ['options' => $products]);
                                echo $this->Form->control('preparation_products.'.$i.'.quantity');
                                echo $this->Form->control('preparation_products.'.$i.'.unit');
                            
                            }
                        ?>
                    
                
                </div>
            </div>
        </div>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</section>

