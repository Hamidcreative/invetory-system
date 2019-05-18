<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>User Forget Password Inventory Management System </title>
    <link rel="apple-touch-icon" href="../../../assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/themes/vertical-dark-menu-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/themes/vertical-dark-menu-template/style.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/pages/login.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/jquery.toast.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/custom/custom.css">
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu 1-column login-bg  blank-page blank-page" data-open="click" data-menu="vertical-dark-menu" data-col="1-column">
    <div class="row">
      <div class="col s12">
        <div class="container"><div id="login-page" class="row">
          <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
            <form class="login-form" method="post" action="<?=base_url('forgetpassword')?>">
              <div class="row">
                <div class="input-field col s12">
                  <h5 class="ml-4">Your Email Address </h5>
                </div>
              </div>
              <div class="row margin">
                <div class="input-field col s12">
                  <i class="material-icons prefix pt-2">mail_outline</i>
                  <input id="email" name="email" type="text" <?= set_value('email')?> >
                  <label for="email" class="center-align">Email</label>
                </div>
              </div>

               
              <div class="row">
                <div class="input-field col s12">
                  <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Send </button>
                </div>
              </div>
              <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>

    <!-- BEGIN VENDOR JS-->
    <script src="<?=base_url()?>assets/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="<?=base_url()?>assets/js/plugins.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/jquery.toast.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/custom/custom-script.js" type="text/javascript"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
    <script>
    <?php if($this->session->flashdata('alert')){ ?>
      var type = '<?=$this->session->flashdata('alert')['type']?>';
      var message = "<?=$this->session->flashdata('alert')['message']?>";
      showToast('Failed', message, type);
    <?php } ?>
    </script>
  </body>
</html>