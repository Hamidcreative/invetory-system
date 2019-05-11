<div id="spareparts">
  <!-- Page Length Options -->
  <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col s12">
                <table class="display inventoryList">
                  <thead>
                    <tr>
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
<form class="csv_import" method="POST" enctype="multipart/form-data">
  <input type="file" class="hidden" name="excel_file" accept=".csv, .xlsx" />
</form>
<script type="text/javascript">
    $(function () {
        //// Need To Work ON New Way Of DataTables..
        oTable ="";
        //Initialize Select2 Elements
        var usersTableSelector = $(".inventoryList");
        var url_DT = "<?=base_url();?>warehouse/<?= $warehouse->id ?>/inventory/listing";
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
        commonDataTables(usersTableSelector,url_DT,aoColumns_DT,sDom_DT);

        //Code for search box
        $(".dataTables_filter input").on("keyup",function (e) {
          e.preventDefault();
            oTable.fnFilter( $(this).val());
        });

    });

</script>
