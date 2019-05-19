<div id="main">
    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">
                            <?php 
                            if($this->session->userdata('user')->id != $user->id) echo 'Edit User';
                            else echo 'You are logged in as ';

                            ?> : 
                            <?=$user->username?></h5>
                        Last Modified : <?=$user->updated_at?>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                            <?php if($this->session->userdata('user')->id != $user->id) { ?>
                            <li class="breadcrumb-item"><a href="<?= base_url('users')?>">Users</a></li>
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <?php } else { ?>
                            <li class="breadcrumb-item"><a href="#">Profile</a></li>
                            <?php } ?>
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
                                    <form class="col s12" method="POST" enctype="multipart/form-data" action="<?=base_url('users/'.$user->id)?>">
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <input name="firstname" required type="text" value="<?=$user->firstname?>">
                                                <label for="firstname">First Name</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input name="lastname" required type="text" value="<?=$user->lastname?>">
                                                <label for="lastname">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <input name="username" required type="text" value="<?=$user->username?>">
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input name="email" required type="email" value="<?=$user->email?>">
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <input name="password" type="password" value="">
                                                <label for="password">Password (Leave empty if don't want to change)</label>
                                            </div>
                                            <?php if(isAdministrator($this->session->userdata('user')->id)) { ?>
                                            <div class="input-field col m6 s12">
                                                <select name="roles" required class="js-example-basic-single">
                                                <?php foreach($roles as $key => $role) {
                                                        if($role->id == $user->roles)
                                                            $selected = 'selected';
                                                        else 
                                                            $selected = '';
                                                    ?>
                                                    <option <?=$selected?> value="<?=$role->id?>"><?=$role->name?></option>
                                                <?php } ?>
                                                </select>
                                                <label>Select Role</label>
                                            </div>
                                            <?php } else {?>
                                            <div class="input-field col s6">
                                                <textarea name="notes" class="materialize-textarea"><?=$user->notes?></textarea>
                                                <label for="notes">Notes</label>
                                            </div>
                                            <?php } ?>
                                        </div>
                                         <?php if(isAdministrator($this->session->userdata('user')->id)) { ?>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea name="notes" class="materialize-textarea"><?=$user->notes?></textarea>
                                                <label for="notes">Notes</label>
                                            </div>
                                        </div>
                                            <?php } ?>
                                        <div class="row">
                                            <div class="col m4 s12 file-field input-field">
                                                <div class="btn float-right">
                                                    <span>Avatar</span>
                                                    <input name="avatar" type="file">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <?php if(empty($user->avatar))
                                                        $user->avatar = defaultVal('avatar');
                                                    ?>
                                                    <img class="avatar-preview" src="<?=base_url('assets/uploads/avatar/'.$user->avatar)?>" class="img-responsive" style="height:100px" />
                                                    <!-- <input class="file-path validate" type="text"> -->
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

<script type="text/javascript">
    $(document).on('change', '.file-field input[name="avatar"]', function(e){
        readURL(this, $('.avatar-preview'));
    })
</script>