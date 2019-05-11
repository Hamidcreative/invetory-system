<div id="main">
    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">Edit Warehouse Spare Part</h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('warehouse')?>">Warehouses</a></li>
                            <li class="breadcrumb-item"><a href="<?=base_url('warehouse/view/'.$warehouseitem->warehouse_id)?>">Spare Parts</a></li>
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="seaction">
                    <?php if(validation_errors() != false) { ?>
                    <div class="row">
                        <div class="col s12">
                          <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                              <span class="card-title">Form Errors</span>
                              <?=validation_errors()?>
                            </div>
                          </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="Form-advance" class="card card card-default scrollspy">
                                <div class="card-content">
                                    <form class="col s12" method="POST" enctype="multipart/form-data" action="<?=base_url('warehouse/'.$warehouseitem->warehouse_id.'/inventory/'.$warehouseitem->id)?>">
                                        <div class="row field-group-heading"> <h6>Basic Info</h6> </div>
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <input type="text" readonly value="<?=$warehouseitem->item_id?>">
                                                <label for="item_id">Item No.</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input type="text" readonly value="<?=$warehouseitem->description?>">
                                                <label for="description">Description</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <input name="send_amount" required type="text" value="<?=$warehouseitem->send_amount?>">
                                                <label for="description">Amount</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <select name="warehouse_id">
                                                    <option value="">Select Warehouse</option>
                                                    <?php foreach($warehouses as $key => $warehouse) { 
                                                        if($warehouse->id == $warehouseitem->warehouse_id)
                                                            $selected = 'selected';
                                                        else 
                                                            $selected = '';
                                                    ?>
                                                        <option <?=$selected?> value="<?=$warehouse->id?>"><?=$warehouse->name?></option>
                                                    <?php } ?>
                                                </select>
                                                <label>Warehouse</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <select>
                                                    <?php foreach($inventory_types as $key => $inventory_type) { 
                                                        if($inventory_type->id == $warehouseitem->inventory_type_id) {
                                                    ?>
                                                        <option <?=$selected?> value="<?=$inventory_type->id?>"><?=$inventory_type->name?></option>
                                                    <?php } } ?>
                                                </select>
                                                <label>Spare Type</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input readonly required type="text" value="<?=$warehouseitem->min_level?>">
                                                <label for="min_level">Minimum Level</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
