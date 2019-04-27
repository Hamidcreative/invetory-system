<footer class="page-footer footer footer-static footer-light navbar-border navbar-shadow">
    <div class="footer-copyright">
        <div class="container"><span><?= date('Y')?>          <a href="#" target="_blank">Inventory System</a> All rights reserved.</span><span class="right hide-on-small-only hidden">Design and Developed by <a href="">Hamid</a></span></div>
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