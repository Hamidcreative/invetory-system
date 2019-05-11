

                <div id ="userspermission" class="section">
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
                                        <div class="row content-wraper">
                                            <div class="col s6 m6 l6 card card-tabs left_contanier"  >
                                                <div class="card-title">
                                                    <h4 class="card-title">Assigned user to <?= $warehouse->name ?> </h4>
                                                </div>

                                                <div id="divs1"  data-id="0" ondrop="drops(event)" ondragover="allowDrops(event)" class="col-md-3 blog-parent-single">
                                                    <?php
                                                    if(!empty($whusers)) { ?>
                                                         <?php foreach($whusers as $whuser){  ;?>
                                                            <a class="list-group-item sort-handle dragbtn" draggable="true" ondragstart="drags(event)" id="single<?=$whuser->id?>" data-id="0" ><?= $whuser->username?></a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>

                                            </div>

                                            <div class="col s6 m6 l6 card card-tabs right_contanier">
                                                <div class="card-title">
                                                    <h4 class="card-title">Users list</h4>
                                                </div>

                                                <div id="divs2" data-id="1"  ondrop="drops(event)" ondragover="allowDrops(event)" class="col-md-3 blog-parent-single">
                                                    <?php
                                                    if(!empty($allusers)){?>

                                                            <?php  foreach($allusers as $users){ ?>

                                                            <a class="list-group-item sort-handle dragbtn" draggable="true" ondragstart="drags(event)" id="single<?=$users->id?>" data-id="1" ><?=$users->username?></a>
                                                            <?php } ?>

                                                    <?php } ?>


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
        // var div    = ev.target.id;
        if($(ev.target).hasClass('blog-parent-single')){
            var div = ev.target.id;
            var el = ev.target;
        }
        else{
            var div = $(ev.target).parents('.blog-parent-single').attr('id');
            var el = $(ev.target).parents('.blog-parent-single');
        }
        if(div == 'divs1' || div == 'divs2' ){
            $(el).append($('#'+data));
        }



        console.log(div);
        console.log(data);
 
        var userID = data.replace('single','');      
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