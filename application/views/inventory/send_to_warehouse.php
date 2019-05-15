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
                            <li class="breadcrumb-item"><a href="#">Send To Warehouse</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="section">
                    <div class="card">
                        <div class="card-content">

                                <table>
                                    <tr>
                                        <td colspan="2">When Warehouse Send Spare parts to other Warehouse  </td>
                                    </tr>
                                    <tr>
                                        <td>Item code:- </td>
                                        <td>User can enter Barcode manually</td>
                                    </tr>
                                    <tr>
                                        <td>Spare part name:- </td>
                                        <td>Automatically visible when user scan barcode or enter barcode (just for confirmations ) </td>
                                    </tr>
                                    <tr>
                                        <td>Amount:-</td>
                                        <td>Default Quantity 1 but user can change</td>
                                    </tr>
                                    <tr>
                                        <td>Checkout by person :-</td>
                                        <td>Name of person who carry part from one warehouse to other</td>
                                    </tr>
                                    <tr>
                                        <td>From Warehouse:-</td>
                                        <td>Selct the name of the warehouse which send the spare part</td>
                                    </tr>
                                    <tr>
                                        <td> To Warehouse:- </td>
                                        <td> Select the name of the warehouse to send spare part</td>
                                    </tr>
                                    <tr>
                                        <td> Scan Button:- </td>
                                        <td> User can scan Barcode by clicking on the scan button.  </td>
                                    </tr>
                                </table>
                             
                        </div>
                    </div>
                </div>
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
                                            <div class="input-field col m6 s12">
                                                <input name="inventory_id" required type="text" value="<?=set_value('inventory_id')?>">
                                                <label for="inventory_id">Item Code</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input name="inventory_id" required type="text" value="<?=set_value('inventory_id')?>">
                                                <label for="inventory_id">Spare Part</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <input name="checkin_amount" required type="text" value="<?=set_value('checkin_amount')?>">
                                                <label for="checkin_amount">Amount</label>
                                            </div>
                                            <div class="input-field m6 col s12">
                                                <select name="checkout_by">
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
                                                <label for="checkout_by">Checkout By Person</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <select name="from_warehouse_id">
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
                                                <label for="recieve_warehouse_id">From Warehouse</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <select name="warehouse_id">
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
                                                <label for="warehouse_id">To Warehouse</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn cyan waves-effect waves-light right " type="submit" name="action"> Submit
                                                    <i class="material-icons right">send</i>
                                                </button>
                                                <button class="btn cyan waves-effect waves-light right mr-2 scan" type="button" data-toggle="modal" data-target="#deletemodal">Scan
                                                    <i class="material-icons right">camera_alt</i>
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