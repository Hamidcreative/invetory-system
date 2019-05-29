<div id="main">
    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">Export Database</h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Export</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="card  custom_card">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <form class="col s12" method="POST" action="<?=base_url('export/database')?>" style="min-height: 200px">
                                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <select name="module" required class="js-example-basic-single">
                                            <option value="full">Full Database</option>
                                            <option value="0">Users</option>
                                            <option value="1">Warehouse</option>
                                            <option value="2">Warehouse Types</option>
                                            <option value="3">Inventory</option>
                                            <option value="4">Inventory Types</option>
                                            <option value="5">Activities</option>
                                        </select>
                                        <label>Select Module To Export</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <button class="btn cyan waves-effect waves-light mt-2" type="submit" name="action">Export
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click','.cyan', function(e){
        showToast('Exporting...', 'Please wait - this may take time', 'information');
    })

</script>