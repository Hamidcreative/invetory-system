<div id="main">
    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">Send To Warehouse</h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('inventory')?>">Spare Parts</a></li>
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
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
                                    <form class="col s12" method="POST" action="<?=base_url('inventory/send_to_warehouse')?>">

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <select name="inventory_id" class="js-example-basic-single">
                                                    <option value="">Select Spare Part</option>
                                                    <?php foreach($inventories as $key => $inventory) { 
                                                        if($inventory->id == set_value('inventory_id'))
                                                            $selected = 'selected';
                                                        else 
                                                            $selected = '';
                                                    ?>
                                                        <option <?=$selected?> value="<?=$inventory->id?>"><?=$inventory->item_id?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="inventory_id">Spare Part</label>
                                            </div>
                                        </div>
                                        <div class="row field-group-heading"> <h6>Check In Info</h6> </div>
                                        <div class="row">
                                            <div class="input-field col m4 s12">
                                                <input name="checkin_date" class="datepicker" required type="text" value="<?=set_value('checkin_date')?>">
                                                <label for="checkin_date">Date.</label>
                                            </div>
                                            <div class="input-field col m4 s12">
                                                <select name="checkin_by" class="js-example-basic-single">
                                                    <option value="">Select Person</option>
                                                    <?php foreach($users as $key => $user) { 
                                                        if($user->id == set_value('checkin_by'))
                                                            $selected = 'selected';
                                                        else 
                                                            $selected = '';
                                                    ?>
                                                        <option <?=$selected?> value="<?=$user->id?>"><?=$user->firstname.' '.$user->lastname?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="checkin_by">By Person</label>
                                            </div>
                                            <div class="input-field col m4 s12">
                                                <input name="checkin_amount" required type="text" value="<?=set_value('checkin_amount')?>">
                                                <label for="checkin_amount">Amount</label>
                                            </div>
                                        </div>
                                        <div class="row field-group-heading"> <h6>Check Out Info</h6> </div>
                                        <div class="row">
                                            <div class="input-field col m4 s12">
                                                <input name="checkout_date" class="datepicker" required type="text" value="<?=set_value('checkout_date')?>">
                                                <label for="checkout_date">Date.</label>
                                            </div>
                                            <div class="input-field col m4 s12">
                                                <select name="checkout_by" class="js-example-basic-single">
                                                    <option value="">Select Person</option>
                                                    <?php foreach($users as $key => $user) { 
                                                        if($user->id == set_value('checkout_by'))
                                                            $selected = 'selected';
                                                        else 
                                                            $selected = '';
                                                    ?>
                                                        <option <?=$selected?> value="<?=$user->id?>"><?=$user->firstname.' '.$user->lastname?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="checkout_by">By Person</label>
                                            </div>
                                            <div class="input-field col m4 s12">
                                                <input name="checkout_amount" required type="text" value="<?=set_value('checkout_amount')?>">
                                                <label for="checkout_amount">Amount</label>
                                            </div>
                                        </div>
                                        <div class="row field-group-heading"> <h6>From Warehouse Info</h6> </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <select name="from_warehouse_id" class="js-example-basic-single">
                                                    <option value="">Select Warehouse</option>
                                                    <?php foreach($warehouses as $key => $warehouse) { 
                                                        if($warehouse->id == set_value('from_warehouse_id'))
                                                            $selected = 'selected';
                                                        else 
                                                            $selected = '';
                                                    ?>
                                                        <option <?=$selected?> value="<?=$warehouse->id?>"><?=$warehouse->name?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="recieve_warehouse_id">Warehouse.</label>
                                            </div>
                                        </div>
                                        <div class="row field-group-heading"> <h6>Send To Warehouse Info</h6> </div>
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <select name="warehouse_id" class="js-example-basic-single">
                                                    <option value="">Select Warehouse</option>
                                                    <?php foreach($warehouses as $key => $warehouse) { 
                                                        if($warehouse->id == set_value('warehouse_id'))
                                                            $selected = 'selected';
                                                        else 
                                                            $selected = '';
                                                    ?>
                                                        <option <?=$selected?> value="<?=$warehouse->id?>"><?=$warehouse->name?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="warehouse_id">Warehouse</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input name="send_date" class="datepicker" required type="text" value="<?=set_value('send_date')?>">
                                                <label for="send_date">Date</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input name="send_amount" required type="text" value="<?=set_value('send_amount')?>">
                                                <label for="send_amount">Amount</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <select name="send_by" class="js-example-basic-single">
                                                    <option value="">Select Person</option>
                                                    <?php foreach($users as $key => $user) { 
                                                        if($user->id == set_value('send_by'))
                                                            $selected = 'selected';
                                                        else 
                                                            $selected = '';
                                                    ?>
                                                        <option <?=$selected?> value="<?=$user->id?>"><?=$user->firstname.' '.$user->lastname?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="send_by">Person</label>
                                            </div>
                                        </div>
                                        <div class="row field-group-heading"> <h6>Recieve By</h6> </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <select name="recieve_by" class="js-example-basic-single">
                                                    <option value="">Select Person</option>
                                                    <?php foreach($users as $key => $user) { 
                                                        if($user->id == set_value('recieve_by'))
                                                            $selected = 'selected';
                                                        else 
                                                            $selected = '';
                                                    ?>
                                                        <option <?=$selected?> value="<?=$user->id?>"><?=$user->firstname.' '.$user->lastname?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="recieve_by">Person.</label>
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
