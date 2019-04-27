<div id="main">
  <!-- Page Length Options -->
  <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <h4 class="card-title">Inventory Listing</h4>
            <div class="row">
              <div class="col s12">
                <table class="display inventoryList">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Item No.</th>
                      <th>Description</th>
                      <th>Warehouse</th>
                      <th>User</th>
                      <th>Type</th>
                      <th>Min Level</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
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
            /* User ID */ {
                "mData": "ID",
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
                "mData" : "warehouse"
            },
            {
                "mData" : "user"
            },
            {
                "mData" : "inventory_type"
            },
            {
                "mData" : "min_level"
            },
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
        ];
        var HiddenColumnID_DT = "";
        var sDom_DT = '<"H"r>t<"F"<"row"<"col-lg-6 col-xs-12" i> <"col-lg-6 col-xs-12" p>>>';
        commonDataTables(usersTableSelector,url_DT,aoColumns_DT,sDom_DT);

        //Code for search box
        $("#search-input").on("keyup",function (e) {
            oTable.fnFilter( $(this).val());
        });

    });

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
</script>