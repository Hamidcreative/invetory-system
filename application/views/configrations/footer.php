
<div id="deletemodal" class="modal">
    <div class="modal-content">
        <input type="hidden" id="hiddenUserID" >
        <h4>Trashed</h4>
        <p>Are you sure you want to delete permanently? </p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Disagree</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat Agree">Agree</a>
    </div>
</div>

<footer class="page-footer footer footer-static footer-light navbar-border navbar-shadow">
    <div class="footer-copyright">
        <div class="container"><span><?= date('Y')?><a href="#" target="_blank">Inventory System</a> All rights reserved.</span><span class="right hide-on-small-only hidden">Design and Developed by <a href="">Hamid</a></span></div>
    </div>
</footer>

<script>
	TOKEN_VAL = '<?=$csrf['hash'];?>';
	TOKEN_NAME = '<?=$csrf['name'];?>';
</script>
<!-- END: Footer-->
<!-- BEGIN VENDOR JS-->
<script src="<?=base_url()?>assets/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="<?=base_url()?>assets/vendors/data-tables/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/vendors/data-tables/js/dataTables.select.min.js" type="text/javascript"></script>
<!-- for reports controller-->
<?php if($this->router->fetch_class() == 'Report' or strtolower($this->router->fetch_class()) == 'inventory' ){ //add route here to allow these files ?>

    <script src="<?=base_url()?>assets/vendors/data-tables/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/vendors/data-tables/js/buttons.bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/vendors/data-tables/js/vfs_fonts.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/vendors/data-tables/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/vendors/data-tables/js/buttons.print.min.js" type="text/javascript"></script>

<?php } ?>

<script src="<?=base_url()?>assets/js/jquery.toast.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN THEME  JS-->
<script src="<?=base_url()?>assets/js/plugins.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/custom/custom-script.js" type="text/javascript"></script>
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="<?=base_url()?>assets/js/scripts/data-tables.js" type="text/javascript"></script>


<!-- END PAGE LEVEL JS-->
  <script>
    <?php if($this->session->flashdata('alert')){ ?>
      var type = '<?=$this->session->flashdata('alert')['type']?>';
      var message = "<?=$this->session->flashdata('alert')['message']?>";
      showToast(type, message, type);
    <?php } ?>
    </script>
</body>
</html>