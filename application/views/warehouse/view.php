<div id="main">
    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><?= $warehouse->name ?> Details</h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('warehouse')?>">Warehouse</a></li>
                            <li class="breadcrumb-item"><a href="#">Details</a></li>
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
                            <p class="caption">Assigned User using Drag and drop user from one coumn to other </p>
                        </div>
                    </div>

                    <!--Container-->
                    <div class="row">
                        <div class="col s12">
                            <div id="Container" class="card card-tabs">
                                <div class="card-content">
                                    <div class="card-title">
                                        <div class="row">
                                            <div class="col s6 m6 l6 card card-tabs left_contanier"  >
                                                <div class="card-title">
                                                    <h4 class="card-title">Assigned user to <?= $warehouse->name ?> </h4>
                                                </div>
                                                <div class="card-content" id="divs1"  data-id="0" ondrop="drops(event)" ondragover="allowDrops(event)" class="col-md-3 blog-parent-single">
                                                    <?php
                                                    if(!empty($whusers)) {
                                                        foreach($whusers as $whuser){ ?>
                                                                <a class="waves-effect waves-light  btn dragbtn" draggable="true" ondragstart="drags(event)" id="single<?=$whuser->id?>" data-id="0" ><?=$whuser->username?></a>

                                                        <?php }
                                                    } ?>

                                                </div>
                                            </div>

                                            <div class="col s6 m6 l6 card card-tabs right_contanier">
                                                <div class="card-title">
                                                    <h4 class="card-title">Users list</h4>
                                                </div>
                                                <div class="card-content" id="divs2" data-id="1"  ondrop="drops(event)" ondragover="allowDrops(event)" class="col-md-3 blog-parent-single">
                                                    <?php
                                                    if(!empty($allusers)){
                                                        foreach($allusers as $users){ ?>

                                                            <a class="waves-effect waves-light  btn dragbtn" draggable="true" ondragstart="drags(event)" id="single<?=$users->id?>" data-id="1" ><?=$users->username?></a>

                                                    <?php }} ?>

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
    </div>
</div>



<script>


    function allowDrops(ev) {
        ev.preventDefault();
    }
    function drags(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }
    function drops(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        var div    = ev.target.id;
        if(div == 'divs1' || div == 'divs2' ){
            ev.target.appendChild(document.getElementById(data));
        }



        console.log(div);
        console.log(data);
 
        var userID = data.replace('single','');      
        var div = div;
        var postData = {
            'userID': userID,'div': div,'whID': <?= $warehouse->id ?>,"<?=$csrf['name']?>":"<?=$csrf['hash']?>",
        };
        $.ajax({
            url:"<?=base_url();?>warehouse/assignusers",
            data: postData,
            type:"POST",
            success: function (data) {
                data = JSON.parse(data);
                showToast(data['type'], data['message'], data['type']);
            }
        }); 
    }
</script>