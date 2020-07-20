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
            <?php $cont = 0; foreach($production->production_recipes as $id => $val):?>
                <div class="box box-solid box-info">

                <div class="box-body">
                    <table>
                        <tr id="ta0"> 
                        <tr>
                        <td>
                            <?php echo $this->Form->hidden("production_recipes." . $id . ".id", ['value' => $val['id']]);?>
                            <?php echo $this->Form->control("production_recipes." . $id . ".recipe_dimension_id",['options' => $recipeDimensions]);?>
                        </td>
                        <?php foreach ($val->prodrecipe_details as $ID => $VAL): ?>
                            <?php echo $this->Form->hidden("production_recipes." . $id . ".prodrecipe_details." . $ID . ".id",['value' => $VAL['id']]);?>
                            <td><?php echo $this->Form->control("production_recipes." . $id . ".prodrecipe_details." . $ID . ".branch" , ['options' => $branches, /*'value' => $branches->where(['name' => $VAL['branch']->name]),*/ 'label' => 'Sucursal']); ?></td>
                            <td><?php echo $this->Form->control("production_recipes." . $id . ".prodrecipe_details." . $ID . ".priority" , ['label' => 'Prioridad']); ?></td>
                            <td><?php echo $this->Form->control("production_recipes." . $id . ".prodrecipe_details." . $ID . ".quantity" , ['label' => 'Cantidad']); ?></td>
                        <?php $cont ++;?>
                        <?php  endforeach; ?>
                        </tr>
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
        </div>
        <?= $this->Form->end() ?>
    </div>
</section>
