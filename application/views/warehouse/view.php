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
                <div class="row">
                    <div class="col s12">
                      <ul class="tabs">
                        <li class="tab col s3"><a class="active" href="#spareparts">Spare Parts</a></li>
                        <li class="tab col s3"><a href="#userspermission">Users</a></li>
                      </ul>
                    </div>
                </div>
                <?php 
                    $data = ['whusers'=>$whusers, 'allusers'=>$allusers];
                    $this->load->view('warehouse/user_permission', $data);
                    $this->load->view('warehouse/inventory', $data);
                ?>

            </div>
        </div>
    </div>
</div>

