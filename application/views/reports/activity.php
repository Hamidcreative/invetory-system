<!-- BEGIN: Page Main-->
<div id="main">
    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">Activity logs Report</h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Activity logs</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div id="sales-chart">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="revenue-chart" class="card animate fadeUp">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div id="swipeable-tabs" class="card card card-default scrollspy">
                                                <div class="card-content">
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <ul class="tabs">
                                                                <li class="tab col m3 bulkreports"><a class="active" href="#test2">Bulk Reports</a></li>
                                                                <li class="tab col m3"><a href="#test4">Report by Warehouse </a></li>
                                                            </ul>
                                                        </div>
                                                        <div id="test2" class="col s12"><!--Test 2--></div>
                                                        <div id="test4" class="col s12">
                                                            <div class="row">
                                                                <div class="input-field col m6 s12 select2lib">
                                                                    <select name="warehouse" required class="js-example-basic-single">
                                                                        <option value="">Select Warehouse</option>
                                                                        <?php if($warehouse){
                                                                         foreach($warehouse as $key => $wh) { ?>
                                                                            <option value="<?=$wh->id?>"><?=$wh->name?></option>
                                                                        <?php }} ?>
                                                                    </select>
                                                                    <label>Select Warehouse</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

        $('select[name="warehouse"]').change(function(e) {
            e.preventDefault();
            var id = $(this).val();
            var oSettings = regTableSelector.dataTable().fnSettings();
            var oSettingsTemp = oSettings;
            if(oSettings != null) {
                oSettings.aoServerParams.splice("fn",1);
                oSettings.aoServerParams.push({"fn": function (aoData) {
                    aoData.push({
                        "name": "whID",
                        "value": id
                    });
                }});
                regTableSelector.dataTable().fnDraw();
                oSettings = oSettingsTemp
            }
        });//End of on Change Function.
        $(document).on('click','.bulkreports',function(){
            var oSettings = regTableSelector.dataTable().fnSettings();
            var oSettingsTemp = oSettings;
            if(oSettings != null) {
                oSettings.aoServerParams.splice("fn",1);
                oSettings.aoServerParams.push({"fn": function (aoData) {
                    aoData.push({
                        "name": "whID",
                        "value": ''
                    });
                }});
                regTableSelector.dataTable().fnDraw();
                oSettings = oSettingsTemp
            }
        });
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