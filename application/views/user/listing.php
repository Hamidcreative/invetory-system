<div id="main">
  <!-- Page Length Options -->
  <div class="row">
      <div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
          <!-- Search for small screen-->
          <div class="container">
              <div class="row">
                  <div class="col s12 m6 l6">
                      <h5 class="breadcrumbs-title mt-0 mb-0">Users</h5>
                  </div>
                  <div class="col s12 m6 l6 right-align-md">
                      <ol class="breadcrumbs mb-0">
                          <li class="breadcrumb-item"><a href="<?= base_url('user')?>">Users</a></li>

                          <li class="breadcrumb-item"><a href="#">Listing</a></li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>
      <div class="col s12">
        <div class="card">
          <div class="card-content">
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
<!-- Confirm modal Structure -->
<div id="confirm-modal" class="modal">
  <div class="modal-content">
    <h4 class="header-content"></h4>
    <p class="body-content"></p>
  </div>
  <input type="hidden" name="user_id" />
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
        var sDom_DT = 'lf<"H"r>t<"F"<"row"<"col-lg-6 col-xs-12" i> <"col-lg-6 col-xs-12" p>>>';
        commonDataTables(usersTableSelector,url_DT,aoColumns_DT,sDom_DT);

        //Code for search box
        $("#search-input").on("keyup",function (e) {
            oTable.fnFilter( $(this).val());
        });

    });

  // confirm modal trigger
  $(document).on('click', '.confirm-modal-trigger', function(e) {
      $('#confirm-modal').find('input[name="user_id"]').val($(this).attr('data-id'));
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
        $('#confirm-modal').find('.body-content').html('This will change the user status from '+current_status+' to '+new_status+'. Are you really want to do this ?');
      } else { // delete case
          $('#confirm-modal').find('.header-content').html('Delete User');
        $('#confirm-modal').find('input[name="method"]').val('DELETE');
          $('#confirm-modal').find('.body-content').html('This will completely remove the user from the system. Are you really want to do this ?');
      }
      var Modalelem = document.querySelector('#confirm-modal');
      var instance = M.Modal.init(Modalelem);
      instance.open();
  });

  $(document).on('click', '#confirm-modal .agree', function(e){
    var userId = $(this).parents('#confirm-modal').find('input[name="user_id"]').val();
    var method = $(this).parents('#confirm-modal').find('input[name="method"]').val();
    var status = $(this).parents('#confirm-modal').find('input[name="new_status"]').val();
      $.ajax({
        url:"<?=base_url('users')?>/"+userId,
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
