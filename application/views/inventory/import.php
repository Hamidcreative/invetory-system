<div id="main">
    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">Import Spare Parts</h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="!#">Import Spare Parts</a></li>
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
                                    <form class="col s12 csv_import" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <select name="inventory_type_id" required class="js-example-basic-single">
                                                    <option value="">Select Spare Part Type</option>
                                                    <?php foreach($inventory_types as $key => $inventory_type) { 
                                                    ?>
                                                        <option value="<?=$inventory_type->id?>"><?=$inventory_type->name?></option>
                                                    <?php } ?>
                                                </select>
                                                <label>Spare Part Type</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <select name="warehouse_id" required class="js-example-basic-single">
                                                    <option value="">Select Warehouse</option>
                                                    <?php foreach($warehouses as $key => $warehouse) { 
                                                    ?>
                                                        <option value="<?=$warehouse->id?>"><?=$warehouse->name?></option>
                                                    <?php } ?>
                                                </select>
                                                <label>Warehouse</label>
                                            </div>
                                        </div>
                                            <input type="file" class="hidden" name="excel_file" accept=".csv, .xlsx" />
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <a class="btn cyan import-btn waves-effect waves-light right" name="action">Import Now
                                                    <i class="material-icons right">send</i>
                                                </a>
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

<script type="text/javascript">

  $(document).on('click', '.import-btn', function(e){
    var inventory_type_id = $('select[name="inventory_type_id"]').val();
    var warehouse_id = $('select[name="warehouse_id"]').val();
    if(inventory_type_id == '')
        showToast('Error', 'Please select spare part type', 'error');
    else if(warehouse_id == '')
        showToast('Error', 'Please select warehouse', 'error');
    else
        $('input[name="excel_file"]').trigger('click');
  })

  $(document).on('change', 'input[name="excel_file"]', function(e){
    if($(this).val() != '' && $(this).val() != null)
      importData();
    else 
        showToast('Error', 'Please select excel file', 'error');
  })

  function importData(e){
    var formData = new FormData();
    formData.append('excel_file', $('input[name="excel_file"]')[0].files[0]);
    var inventory_type_id = $('select[name="inventory_type_id"]').val();
    var warehouse_id = $('select[name="warehouse_id"]').val();
    formData.append('inventory_type_id', inventory_type_id);
    formData.append('warehouse_id', warehouse_id);

    $.ajax({
        url:"<?=base_url('inventory/import')?>",
        type:"POST",
        cache: false,
        contentType: false,
        processData: false,
        data:formData,
        beforeSend:function(e){
          showToast('Importing...', 'Please wait - this may take while', 'information');
        },
        success:function(data){
          $.toast().reset('all');
          data = JSON.parse(data);
          showToast(data['type'], data['message'], data['type']);
        }
      });
  }
</script>