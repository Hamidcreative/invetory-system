    <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">
         <div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
            <!-- Search for small screen-->
            <div class="container">
               <div class="row">
                  <div class="col s12 m6 l6">
                     <h5 class="breadcrumbs-title mt-0 mb-0">Dashboard</h5>
                  </div>
                  <div class="col s12 m6 l6 right-align-md">

                  </div>
               </div>
            </div>
         </div>
        <div class="col s12">
          <div class="container">
            <div id="card-stats">
               <div class="row">
                  <div class="col s12 m6 l6 xl4">
                     <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                        <div class="padding-4">
                           <div class="col s7 m7">
                              <i class="material-icons background-round mt-5">add_shopping_cart</i>
                              <p>Warehouses</p>
                           </div>
                           <div class="col s5 m5 right-align">
                              <h5 class="mb-0 white-text"><?= $warehoses ?></h5>
<!--                              <p class="no-margin">New</p>-->
<!--                              <p>34</p>-->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col s12 m6 l6 xl4">
                     <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                        <div class="padding-4">
                           <div class="col s7 m7">
                              <i class="material-icons background-round mt-5">perm_identity</i>
                              <p>Technicians</p>
                           </div>
                           <div class="col s5 m5 right-align">
                              <h5 class="mb-0 white-text"><?= $users ?></h5>
<!--                              <p class="no-margin">New</p>-->
<!--                              <p>400</p>-->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col s12 m6 l6 xl4">
                     <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                        <div class="padding-4">
                           <div class="col s7 m7">
                              <i class="material-icons background-round mt-5">settings_applications</i>
                              <p>Spares parts</p>
                           </div>
                           <div class="col s5 m5 right-align">
                              <h5 class="mb-0 white-text"><?= $spares ?></h5>
<!--                              <p class="no-margin">New</p>-->
<!--                              <p>34,223</p>-->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="sales-chart">
               <div class="row">
                  <div class="col s12 m12 l12">
                     <div id="revenue-chart" class="card animate fadeUp">
                        <div class="card-content">
                           <h4 class="header mt-0"> Activity logs  <span class="purple-text small text-darken-1 ml-1"> </h4>
                           <div class="row">
                              <div class="col s12">
                                 <table id="warehousetypes" class="display warehousetypes">
                                    <thead>
                                    <tr>
                                       <th>Id</th>
                                       <th>User Name</th>
                                       <th> Name</th>
                                       <th>Modal</th>
                                       <th>Activity</th>
<!--                                       <th>Effected</th> <!--     Modal ID -->
                                       <th>Date</th>
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
          </div>
        </div>
      </div>
    </div>


    <script>
       $(function () {
          oTable = "";
          var regTableSelector = $("#warehousetypes");
          var url_DT = "<?=base_url();?>dashboard/activity_listing/listing";
          var aoColumns_DT = [
             /* ID */ {
                "mData": "ID",
                "bVisible": true,
                "bSortable": true,
                "bSearchable": true
             },
             {
                "mData": "Name"
             },
             {
                "mData": "for_user"
             },
             {
                "mData": "Modal"
             },
             {
                "mData": "Activity"
             },
             {
                "mData": "Date"
             },
             {
                "mData": "ViewEditActionButtons",
                "render": function ( data, type, row ) {
                   if(row.Rout){
                                 return '<a href="<?=base_url()?>'+row.Rout+'" id="view"><i class="material-icons">remove_red_eye</i></a><a class=""><i class="material-icons deletemodal">delete</i></a>';
                   }else{
                      return '<a class=""><i class="material-icons deletemodal">delete</i></a>';
                   }
                },
             }
          ];
          var HiddenColumnID_DT = "ID";
          var sortBy = {
             'ColumnID' : 0,
             'SortType' : 'desc'
          };
          var sDom_DT = 'lf<"H"r>t<"F"<"row"<"col-lg-6 col-xs-12" i> <"col-lg-6 col-xs-12" p>>>';
          commonDataTables(regTableSelector, url_DT, aoColumns_DT, sDom_DT, HiddenColumnID_DT,RowCallBack=null,DrawCallBack=null,filters=null,sortBy );


          $(document).on('click','.deletemodal',function(e){
             $('#deletemodal').modal('open');
             var id = $(this).parents("tr").attr("data-id");
             $('#deletemodal').find("input#hiddenUserID").val(id);
          });
          $(".Agree").on("click", function () {
             var ID = $('#deletemodal').find("input#hiddenUserID").val();
             var postData = {
                'id': ID,"<?=$csrf['name']?>":"<?=$csrf['hash']?>",
             };
             $.ajax({
                url:"<?=base_url();?>dashboard/activity_listing/delete",
                data: postData,
                type:"POST",
                success: function (data) {
                   data = JSON.parse(data);
                   showToast(data['type'], data['message'], data['type']);
                   oTable.fnDraw();
                }
             });
          });
       });
    </script>