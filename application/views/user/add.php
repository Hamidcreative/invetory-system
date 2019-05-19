<div id="main">
    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">Add User</h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>users">Users</a></li>
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12">
            <div class="container">
                <div class="seaction">
                    <?php if(validation_errors() != false) { ?>
                    <div class="row">
                        <div class="col s12">
                          <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                              <span class="card-title">Form Errors</span>
                              <?=validation_errors()?>
                            </div>
                          </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="Form-advance" class="card card card-default scrollspy">
                                <div class="card-content">
                                    <form class="col s12" enctype="multipart/form-data" method="POST" action="<?=base_url('users/add')?>">
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <input name="firstname" required type="text" value="<?=set_value('firstname')?>">
                                                <label for="firstname">First Name</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input name="lastname" required type="text" value="<?=set_value('lastname')?>">
                                                <label for="lastname">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <input name="username" required type="text" value="<?=set_value('username')?>">
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input name="email" type="email" required value="<?=set_value('email')?>">
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <input name="password" type="password" required value="">
                                                <label for="password">Password (Leave empty if don't want to change)</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <select name="roles" required class="js-example-basic-single">
                                                <?php foreach($roles as $key => $role) { 
                                                        if($role->id == set_value('roles'))
                                                            $selected = 'selected';
                                                        else 
                                                            $selected = '';
                                                    ?>
                                                    <option <?=$selected?> value="<?=$role->id?>"><?=$role->name?></option>
                                                <?php } ?>
                                                </select>
                                                <label>Select Role</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea name="notes" class="materialize-textarea"><?=set_value('notes')?></textarea>
                                                <label for="notes">Notes</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col m6 s12 file-field input-field">
                                                <div class="btn float-right">
                                                    <span>Avatar</span>
                                                    <input name="avatar" type="file">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
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