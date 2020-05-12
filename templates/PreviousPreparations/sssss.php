</section>
    <script>

        var javascriptArray = [];
        var tagid = 1;
        
        function replicateFields(){
            var elementToReplicate = $('.inputs').first(), //Only clone first group of inputs
                clonedElement = elementToReplicate.clone();//Cloned the element
            clonedElement.find('input').val(''); //Clear cloned elements value on each new addition
            clonedElement.insertBefore($('form a'));
        }

        //Calling function on click
        $('.addRow').click(function(){
            replicateFields();
        });

        function addTag() {
        var div = document.getElementById("tags");
        var name = document.getElementById("tname").value;
        var type = document.getElementById("ttype").value;
        div.innerHTML += "tag" + tagid + "<br><input type='text' name='tag[" + tagid + "][name]' value='" + name + "'><br><input type='text' name='tag[" + tagid + "][type]' value='" + type + "'><hr>";
        tagid++;
        }
    </script>
    <form id="form">
        tags:<br>
        <div id="tags">
        </div>

        <input type="submit" value="Submit">
    </form>
    <hr> tag name: <input id="tname" type="text" name="tname"><br> tag type: <input id="ttype" type="text" name="ttype"><br>
    <button onclick="addTag()">add tag</button>
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
                </div>preparations
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
                <?=
                    $i=0;    
                    function createForm($tshis) {
                        echo $tshis->Form->control('preparation_products.'.$i.'.product_id', ['options' => $products]);
                        echo $tshis->Form->control('preparation_products.'.$i.'.quantity');
                        echo $tshis->Form->control('preparation_products.'.$i.'.unit');
                        $i++;
                    }
                    
                ?>
                <input name="" value="Buscar" id="boton1" onclick = "funcion();">
                <script>
                function funcion(){
                    alert('<?php echo createForm($this); ?>');
                    /* Escribir en el Documento*/
                    document.write('<?php echo createForm($this); ?>');
                }
                </script>
                <?php
                        echo $this->Form->control('preparation_products.'.$i.'.product_id', ['options' => $products]);
                        echo $this->Form->control('preparation_products.'.$i.'.quantity');
                        echo $this->Form->control('preparation_products.'.$i.'.unit');
                ?>
                </div>
            </div>
            
        </div>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</section>





<?php if ($this->request->getData()) :?>
                <?php foreach ($this->request->data['preparation_products'] as $i=>$v) :?>
                <tr id="tr<?php echo $i;?>">
                    <td><?php echo $i ?>
                    <td><?php echo $this->Form->input('product_id', array('label'=>false, 'div'=>false, 'id'=>'preparation-products-'.$i.'-product_id', 'name'=>"data[preparation_products][$i][product_id]", 'value'=>$v['product_id']));?></td>
                    <td><?php echo $this->Form->input('quantity', array('label'=>false, 'div'=>false, 'id'=>'preparation-products-'.$i.'-quantity', 'name'=>"data[preparation_products][$i][quantity]", 'value'=>$v['quantity']));?></td>
                    <td><?php echo $this->Form->input('unit', array('label'=>false, 'div'=>false, 'id'=>'preparation-products-'.$i.'-unit', 'name'=>"data[preparation_products][$i][unit]", 'value'=>$v['unit']));?></td>
                    <td><a style="cursor:pointer;" onclick="$('#tr<?php echo $i;?>').detach();"><span style="background:#aaa;padding:1px 8px;">-</span></a></td>
                </tr>
                <?php endforeach;?> 
            <?php else : ?>
                <tr id="tr0">
                    
                    <td><?php echo $this->Form->input('product_id', array('label'=>false, 'div'=>false, 'id'=>'preparation_products-0-product_id', 'name'=>"data[preparation_products][0][product_id]"));?></td>
                    <td><?php echo $this->Form->input('quantity', array('label'=>false, 'div'=>false, 'id'=>'preparation_products-0-quantity', 'name'=>"data[preparation_products][0][quantity]"));?></td>
                    <td><?php echo $this->Form->input('unit', array('label'=>false, 'div'=>false, 'id'=>'preparation_products-0-unit', 'name'=>"data[preparation_products][0][unit]"));?></td>
                    <td><a style="cursor:pointer;" onclick="$('#tr0').detach();"><span style="background:#aaa;padding:1px 8px;">-</span></a></td>
                </tr>
            <?php endif; ?>
            