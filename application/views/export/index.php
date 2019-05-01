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
            <div class="container">
                <div class="seaction">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="Form-advance" class="card card card-default scrollspy">
                                <div class="card-content">
                                    <form class="col s12" method="POST" action="<?=base_url('export/database')?>">
                                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <select name="module" required>
                                                    <option value="full">Full Database</option>
                                                    <option value="0">Users</option>
                                                    <option value="1">Warehouse</option>
                                                    <option value="2">Warehouse Types</option>
                                                    <option value="3">Inventory</option>
                                                    <option value="4">Inventory Types</option>
                                                    <option value="5">Activites</option>
                                                </select>
                                                <label>Select Module To Export</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <button class="btn cyan waves-effect waves-light" type="submit" name="action">Export
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
    </div>
</div>
<script>
    $(document).on('click','.cyan', function(e){
        showToast('Exporting...', 'Please wait - this may take time', 'information');
    })
</script>