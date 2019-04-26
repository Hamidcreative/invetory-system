<div id="main">
    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">Users</h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url()?>users">Home</a></li>
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
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="Form-advance" class="card card card-default scrollspy">
                                <div class="card-content">
                                    <form class="col s12">
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <input id="first_name01" type="text">
                                                <label for="first_name01">First Name</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input id="last_name" type="text">
                                                <label for="last_name">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="email5" type="email">
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="password6" type="password">
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <select>
                                                    <option value="" disabled selected>Choose your profile</option>
                                                    <option value="1">Manager</option>
                                                    <option value="2">Developer</option>
                                                    <option value="3">Business</option>
                                                </select>
                                                <label>Select Profile</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input type="date" class="datepicker" id="dob">
                                                <label for="dob">DOB</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col m6 s12 file-field input-field">
                                                <div class="btn float-right">
                                                    <span>File</span>
                                                    <input type="file">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <span>Range</span>
                                                <p class="range-field">
                                                    <input type="range" id="test5" min="0" max="100" />
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea id="message5" class="materialize-textarea"></textarea>
                                                <label for="message">Message</label>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                                                        <i class="material-icons right">send</i>
                                                    </button>
                                                </div>
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
