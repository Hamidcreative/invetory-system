<div id="main">
  <style type="text/css">
    table th{padding: 8px 10px!important;}
  </style>
  <!-- Page Length Options -->
  <div class="row">
      <div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
          <!-- Search for small screen-->
          <div class="container">
              <div class="row">
                  <div class="col s12 m6 l6">
                      <h5 class="breadcrumbs-title mt-0 mb-0">Spare Parts</h5>
                  </div>
                  <div class="col s12 m6 l6 right-align-md">
                      <ol class="breadcrumbs mb-0">
                          <li class="breadcrumb-item"><a href="<?= base_url('inventory')?>">Spare Parts</a></li>
                          <li class="breadcrumb-item"><a href="#">Listing</a></li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>
      <div class="col s12">
        <div class="card">
          <div class="card-content"><!-- Select -->
            <div class="row">
              <div class="col s12">
                <div class="card-title">
                  <div class="row">
                    <div class="col s12 m6 l10">
                      <h4 class="card-title">Filter By:</h4>
                    </div>
                  </div>
                </div>
                <div id="view-select">
                  <div class="row filters">
                    <div class="input-field col s12 m4">
                      <select name="warehouse">
                        <option value="">All</option>
                        <?php foreach($warehouses as $warehouse) { ?>
                        <option value="<?=$warehouse->id?>"><?=$warehouse->name?></option>
                        <?php } ?>
                      </select>
                      <label>Warehouse</label>
                    </div>
                    <div class="input-field col s12 m4">
                      <input type="text" name="serial_no" />
                      <label>Serial Number</label>
                    </div>
                    <div class="input-field col s12 m4">
                      <p>
                        <label>
                          <input type="checkbox" name="min_level"  />
                          <span>Minimum Level Reached</span>
                        </label>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-content"><!-- Select -->
            <div class="row">
              <div class="col s12">
                <table class="display inventoryList">
                  <thead>
                    <tr>
                     <?php if(!isEndUser($this->session->userdata('user')->id)) { ?>
                      <th><label>
                        <input type="checkbox" class="select-all" />
                        <span></span>
                      </label></th>
                      <?php } ?>
                      <th>Id</th>
                      <th>Item No.</th>
                      <th>Description</th>
                      <th>Type</th>
                      <th>Quantity</th>
                      <th>Min Level</th>
                      <?php if(!isEndUser($this->session->userdata('user')->id)) { ?>
                      <th>Status</th>
                      <th>Action</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <?php if(!isEndUser($this->session->userdata('user')->id)) { ?>
              <!-- Select -->
            <div class="row">
              <div class="col s12">
                    <div class="card-title">
                      <div class="row">
                        <div class="col s12 m6 l10">
                          <h4 class="card-title">Bulk Action for selected items</h4>
                        </div>
                      </div>
                    </div>
                    <div id="view-select">
                      <div class="row bulk-action">
                        <div class="input-field col s6">
                          <select name="action">
                            <option value="1" selected>Activate</option>
                            <option value="2" >Deativate</option>
                          </select>
                          <label>Actions</label>
                        </div>

                        <div class="input-field col s6">
                          <a class="btn btn-default submit-action">Submit</a>                          
                        </div>
                      </div>
                    </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
  </div>
</div>
<!-- Confirm modal Structure -->
<div id="confirm-modal" class="modal">
  <div class="modal-content">
    <h4 class="header-content"></h4>
    <p class="body-content"></p>
  </div>
  <input type="hidden" name="inventory_id" />
  <input type="hidden" name="new_status" />
  <input type="hidden" name="method" />
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat agree">Yes</a>
    <a href="#!" class="modal-close waves-effect waves-red btn-flat">No</a>
  </div>
</div>
<script type="text/javascript">
    $(function () {
       //// Need To Work ON New Way Of DataTables..
        oTable ="";
        //Initialize Select2 Elements
        var usersTableSelector = $(".inventoryList");
        var url_DT = "<?=base_url();?>inventory/listing";
        var aoColumns_DT = [
            <?php if(!isEndUser($this->session->userdata('user')->id)) { ?>
            {
                "mData": "ID",
                "bSortable": false,
                "bSearchable": false,
                "mRender": function(data, type, row){
                    return '<label> <input value="'+data+'" class="select-check" name="selected_checks[]" type="checkbox" /> <span></span> </label>';
                }
            },
            <?php } ?>
            {
                "mData" : "ID",
                "bVisible": true,
                "bSortable": true,
                "bSearchable": true
            },
            {
                "mData" : "item_id"
            },
            {
                "mData" : "description"
            },
            {
                "mData" : "inventory_type"
            },
            {
                "mData" : "quantity"
            },
            {
                "mData" : "min_level"
            },
            <?php if(!isEndUser($this->session->userdata('user')->id)) { ?>
            {
                "mData": "status",
                "mRender": function(data, type, row){
                  if(data == 1) 
                    return '<span data-id="'+row.ID+'" data-status="'+data+'" class="new badge green confirm-modal-trigger" data-badge-caption="Active"></span>';
                  else 
                    return '<span data-id="'+row.ID+'" data-status="'+data+'" class="new badge red confirm-modal-trigger" data-badge-caption="Inactive"></span>';
                }
            },
            {
                "mData" : "actionButtons"
            }
          <?php } ?>
        ];
        var HiddenColumnID_DT = "";
        <?php if(!isEndUser($this->session->userdata('user')->id)) { ?>
        var sDom_DT = 'Blf<"H"r>t<"F"<"row"<"col-lg-6 col-xs-12" i> <"col-lg-6 col-xs-12" p>>>';
        <?php } else { ?>
        var sDom_DT = 'lf<"H"r>t<"F"<"row"<"col-lg-6 col-xs-12" i> <"col-lg-6 col-xs-12" p>>>';
        <?php } ?>
        additional_data = [
          {'name':'warehouse', 'value': function() { return $('.filters select[name="warehouse"]').val()}},
          {'name':'serial_no', 'value': function() { return $('.filters input[name="serial_no"]').val() }},
          {'name':'min_level', 'value': function() { 
            if($('.filters input[name="min_level"]').is(':checked'))
              return true
            else return false
          }}
        ]
        commonDataTables(usersTableSelector,url_DT,aoColumns_DT,sDom_DT,undefined,undefined,undefined,undefined ,{
            'ColumnID' : 1,
            'SortType' : 'asc'
        },undefined , additional_data);
    });


  $(document).on('change','.filters select, input', function(e){
    oTable.fnDraw();
  })
  // confirm modal trigger
  $(document).on('click', '.confirm-modal-trigger', function(e) {
      $('#confirm-modal').find('input[name="inventory_id"]').val($(this).attr('data-id'));
      var current_status = $(this).attr('data-status');
      if(current_status != null){ // status change case
        if(current_status == 1){
          current_status = 'Active';
          new_status = 'Inactive';
          $('#confirm-modal').find('input[name="new_status"]').val(0);
        } else {
          current_status = 'Inactive';
          new_status = 'Active';
          $('#confirm-modal').find('input[name="new_status"]').val(1);
        }
        $('#confirm-modal').find('input[name="method"]').val('PATCH');
        $('#confirm-modal').find('.header-content').html('Change User Status');
        $('#confirm-modal').find('.body-content').html('This will change the item status from '+current_status+' to '+new_status+'. Are you really want to do this ?');
      } else { // delete case
          $('#confirm-modal').find('.header-content').html('Delete User');
        $('#confirm-modal').find('input[name="method"]').val('DELETE');
          $('#confirm-modal').find('.body-content').html('This will completely remove the item from the system. Are you really want to do this ?');
      }
      var Modalelem = document.querySelector('#confirm-modal');
      var instance = M.Modal.init(Modalelem);
      instance.open();
  });

  $(document).on('click', '#confirm-modal .agree', function(e){
    var inventoryId = $(this).parents('#confirm-modal').find('input[name="inventory_id"]').val();
    var method = $(this).parents('#confirm-modal').find('input[name="method"]').val();
    var status = $(this).parents('#confirm-modal').find('input[name="new_status"]').val();
      $.ajax({
        url:"<?=base_url('inventory')?>/"+inventoryId,
        type:method,
        data:{status:status},
        success:function(data){
          data = JSON.parse(data);
          showToast(data['type'], data['message'], data['type']);
          oTable.fnDraw();
        }
      });
  })

  function importFile() {
    window.location.assign('inventory/import');
  }

  $(document).on('click','.bulk-action .submit-action', function(e){
    var action_id = $(this).parents('.bulk-action').find('select[name="action"]').val();
    console.log(action_id);    
    var selected_checks = $('.select-check:checked').map(function() {
        return this.value;
      }).get();
    $.ajax({
      url:"<?=base_url('inventory/bulk_action')?>/"+action_id,
      data:{selected_checks:JSON.stringify(selected_checks)},
      type:"POST",
      beforeSend:function(e){
          showToast('Updating', 'Please wait - this may take while', 'information');
      },
      success:function(data){
          data = JSON.parse(data);
          $.toast().reset('all');
          showToast(data['type'], data['message'], data['type']);
          oTable.fnDraw();
      }
    });
  })

    $(document).on('click','.filters input[name="min_level"]', function () {
    if ($(this).attr("checked")) {
      $(this).attr('checked', false);
    } else {
      $(this).attr('checked', true);
    }
  })
</script>
