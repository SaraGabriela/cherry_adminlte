<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Production $production
 */
?>

<section class="content">
    <?php echo $this->Html->script('jquery-3.5.1.min.js');?>
    <div class="row">
        <div class="col-md-12">
            <?php foreach($production->production_recipes as $production_recipe):?>
                <div class="box box-solid box-info">
                <div class="box-body">
                    <table>
                        <tr id="ta0"> 
                        <tr>
                        <td>
                            <td>
                               <label for="comercial_name">Nombre Comercial</label>
                              <input class="form-control" type="text" name="comercial_name" readonly value="<?php echo $production_recipe->recipe_dimension->recipe->comercial_name;?>">
                            </td>
                            <td>
                                <label for="recipe_dimensions_id">Descripción (cm)</label>
                                <input class="form-control" type="text" name="recipe_dimensions_id" readonly value="<?php echo $production_recipe->recipe_dimension->recipe_dimensions_id;?>">
                            </td>
                        </td>
                        <td>
                            <label for="description">Descripción (cm)</label>
                            <input class="form-control" type="text" name="description" readonly value="<?php echo $production_recipe->recipe_dimension->dimension->description; ?>">
                        </td>
                        <?php foreach ($production_recipe->prodrecipe_details as $prodrecipe_detail): ?>
                            <td><label for="branch">Sucursal</label><input class="form-control" type="text" name="branch" readonly value="<?php echo $prodrecipe_detail->branch->name;?>"></td>
                            <td><label for="priority">Prioridad</label><input class="form-control" type="text" name="priority" readonly value="<?php echo $prodrecipe_detail->priority; ?>"></td>
                            <td><label for="quantity">Cantidad</label><input class="form-control" type="text" name="quantity" readonly value="<?php echo $prodrecipe_detail->quantity; ?>"></td>
                        <?php  endforeach; ?>
                        </tr>
                        </tr>
                    </table>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
        <div class="text-center">
            <a href="/productions/index" class="btn text-bold btn-success btn-sm">ATRÁS</a>
        </div>
</section>
        
