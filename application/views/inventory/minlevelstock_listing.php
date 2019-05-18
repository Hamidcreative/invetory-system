<div id="main">
  <!-- Page Length Options -->
  <div class="row">
      <div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
          <!-- Search for small screen-->
          <div class="container">
              <div class="row">
                  <div class="col s12 m6 l6">
                      <h5 class="breadcrumbs-title mt-0 mb-0">Spare Parts (Reached To Minimum Level)</h5>
                  </div>
              </div>
          </div>
      </div>
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
                      <th>Warehouse</th>
                      <th>Quantity</th>
                      <th>Min Level</th>
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


<script type="text/javascript">
    $(function () {
        //// Need To Work ON New Way Of DataTables..
        oTable ="";
        //Initialize Select2 Elements
        var usersTableSelector = $(".inventoryList");
        var url_DT = "<?=base_url();?>inventory/minlevellisting";
        var aoColumns_DT = [
            /* User ID */ {
                "mData": "ID",
                "bVisible": true,
                "bSortable": true,
                "bSearchable": true
            },
            {
                "mData" : "item_id",
                "mRender": function(data, type, row){
                  return '<a href="<?=base_url()?>/inventory/'+row.ID+'">'+data+'</a>';
                }

            },
            {
                "mData" : "description",
                "mRender": function(data, type, row){
                  return '<a href="<?=base_url()?>/inventory/'+row.ID+'">'+data+'</a>';
                }
            },           
            {
                "mData" : "WHname"
            },
            {
                "mData" : "quantity"
            },
            {
                "mData" : "min_level"
            },
        ];
        var HiddenColumnID_DT = "";
        var sDom_DT = '<"H"r>t<"F"<"row"<"col-lg-6 col-xs-12" i> <"col-lg-6 col-xs-12" p>>>';
        commonDataTables(usersTableSelector,url_DT,aoColumns_DT,sDom_DT);

        //Code for search box
        $(".dataTables_filter input").on("keyup",function (e) {
          e.preventDefault();
            oTable.fnFilter( $(this).val());
        });

    });


</script>
