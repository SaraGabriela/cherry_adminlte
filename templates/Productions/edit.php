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
        <div class="col-md-12">
            <?php foreach($production->production_recipes as $id => $val):?>
                <div class="box box-solid box-info">
                <div class="box-body">
                    <table>
                        <tr id="ta0"> 
                        <tr>
                        <td>
                            <?php echo $this->Form->hidden("production_recipes." . $id . ".id", ['value' => $val['id']]);?>
                            <?php // echo $this->Form->control("production_recipes." . $id . ".recipe_dimension_id",['options' => $recipeDimensions]);?>
                            <div class="form-group">
                                <label for="<?php echo "production-recipes-" . $id . "-recipe-dimension-id ";?>">Recipe Dimension</label>
                                <select name="<?php echo "production_recipes[" . $id . "][recipe_dimension_id]"; ?>" class="form-control" id="<?php echo "production-recipes-" . $id . "-recipe-dimension-id ";?>">
                                    <?php foreach($recipeDimensions as $n):?>
                                        <?php if($n->recipe_dimensions_id == $val['recipe_dimension']->recipe_dimensions_id):?>
                                            <option value="<?php echo $n->recipe_dimensions_id; ?>" selected><?php echo $n['recipe']->comercial_name . " X "  . $n['dimension']->description . "cm";?></option>
                                        <?php else:?>
                                            <option value="<?php echo $n->recipe_dimensions_id; ?>"><?php echo $n['recipe']->comercial_name . " X "  . $n['dimension']->description . "cm";?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </td> 
                        <?php if($val->prodrecipe_details):?>
                            <?php foreach ($val->prodrecipe_details as $ID => $VAL): ?>
                                <?php echo $this->Form->hidden("production_recipes." . $id . ".prodrecipe_details." . $ID . ".id",['value' => $VAL['id']]);?>
                                <!--<td><?php // echo $this->Form->control("production_recipes." . $id . ".prodrecipe_details." . $ID . ".branch" , ['options' => $branches, /*'value' => $branches->where(['name' => $VAL['branch']->name]),*/ 'label' => 'Sucursal']); ?></td>-->
                                <td>
                                    <div class="form-group">
                                        <label for="<?php echo "production-recipes-$id-prodrecipe-details-$ID-branch"; ?>">Sucursal</label>
                                        <select name="<?php echo "production_recipes[$id][prodrecipe_details][$ID][branch]";?>" id="<?php echo "production-recipes-$id-prodrecipe-details-$ID-branch"; ?>" class="form-control">
                                            <?php foreach($branches as $branch):?>
                                                <?php if($branch->name == $VAL['branch']->name):?>
                                                    <option value="<?php echo $branch->id; ?>" selected ><?php echo $branch->name; ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo $branch->id; ?>"><?php echo $branch->name; ?></option>
                                                <?php endif;?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </td>
                                <td><?php echo $this->Form->control("production_recipes." . $id . ".prodrecipe_details." . $ID . ".priority" , ['label' => 'Prioridad']); ?></td>
                                <td><?php echo $this->Form->control("production_recipes." . $id . ".prodrecipe_details." . $ID . ".quantity" , ['label' => 'Cantidad']); ?></td>
                            <?php  endforeach; ?>
                        <?php else:?>
                            <td>
                                <div class="form-group">
                                    <label for="<?php echo "production-recipes-" . $id . " -prodrecipe-details-0-branch"; ?>">Sucursal</label>
                                    <select name="<?php echo "production_recipes[" . $id . "][prodrecipe_details][0][branch]";?>" id="<?php echo "production-recipes-" . $id . "-prodrecipe-details-0-branch"; ?>" class="form-control">
                                        <?php foreach($branches as $branch):?>
                                            <option value="<?php echo $branch->id; ?>"><?php echo $branch->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </td>
                            <td><?php echo $this->Form->control("production_recipes.$id.prodrecipe_details.0.priority");?></td>
                            <td><?php echo $this->Form->control("production_recipes.$id.prodrecipe_details.0.quantity");?></td>
                            <td><?php echo $this->Form->hidden("production_recipes.$id.prodrecipe_details.0.phase", ['value' => 'crudo']);?></td>
                            <td><?php echo $this->Form->control("production_recipes.$id.prodrecipe_details.0.observations", ['value' => '_ _ _']);?></td>
                        <?php endif;?>
                        </tr>
                        <tr id="trHiddenCounterDetaild" style="display:none;">
                            <input id="tr_d_counterDetaild" type="hidden" value="<?php // $this->request->getData()?(sizeof($this->request->data['production_recipes'])-1):0;?>">
                        </tr>
                    </table>
                    
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="text-center">
            <?php echo $this->Form->hidden('production_id', ['value' => $production->id]); ?>
            <?= $this->Form->button(__('Actualizar'), ['class' => 'text-bold btn btn-sm btn-success']) ?>
            <a href="/productions/index" class="text-bold btn btn-sm btn-primary">ATRÁS</a>
            <button type="reset" class="text-bold btn btn-sm btn-warning">Cancelar</button>
        </div>
        <?= $this->Form->end() ?>
    </div>
</section>
