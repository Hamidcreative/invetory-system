<div id="main">
  <!-- Page Length Options -->
  <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <h4 class="card-title">Page Length Options</h4>
            <div class="row">
              <div class="col s12">
                <table class="display usersList">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>First Name</th>
                      <th>Last Name</th>
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
<script type="text/javascript">
    $(function () {
        //// Need To Work ON New Way Of DataTables..
        oTable ="";
        //Initialize Select2 Elements
        var usersTableSelector = $(".usersList");
        var url_DT = "<?=base_url();?>user/listing";
        var aoColumns_DT = [
            /* User ID */ {
                "mData": "ID",
                "bVisible": true,
                "bSortable": true,
                "bSearchable": true
            },
            {
                "mData" : "username"
            },
            {
                "mData" : "email"
            },
            {
                "mData" : "firstname"
            },
            {
                "mData" : "lastname"
            },
            {
                "mData": "status"
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
    
    $(document).on('click','.delete-user', function(e){
      var userId = $(this).attr('data-id');
      $.ajax({
        url:"<?=base_url('users')?>/"+userId,
        type:"DELETE",
        success:function(data){
          data = JSON.parse(data);
          showToast(data['type'], data['message'], data['type']);
          oTable.fnDraw();
        }
      });
    })
</script>
