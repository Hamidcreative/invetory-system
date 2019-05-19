<div id="main">
    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">Edit Warehouse</h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('warehouse')?>">Warehouse</a></li>
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
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
                                    <form class="col s12" method="POST" action="<?=base_url('warehouse/edit/'.$warehouse->id)?>">
                                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <input id="first_name01" name="name" type="text" value="<?=$warehouse->name?>">
                                                <label for="first_name01">Name</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <select name="types" class="js-example-basic-single">
                                                    <?php foreach($types as $key => $type) { ?>
                                                        <option value="<?=$type->id?>"
                                                            <?= $warehouse->warehouse_type_id == $type->id ? 'selected': '' ?>>
                                                            <?= $type->name?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                                <label>Select Type</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea name="descrption" class="materialize-textarea"> <?=set_value('descrption')?>  <?=$warehouse->descrption?></textarea>
                                                <label for="notes">Descrption</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
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
