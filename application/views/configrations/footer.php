
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
        <div class="container"><span> <a href="<?= base_url('') ?>" target="_blank">Inventory Management System</a></span><span class="right hide-on-small-only hidden">Design and Developed by <a href="">Hamid</a></span></div>
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

    $(document).on('change','input[name="item_id"]', function(e){
        var itemId = $(this).val();
        if(itemId != ''){
            $.ajax({
                url:"<?=base_url('inventory/item/')?>"+itemId,
                success:function(data){
                    data = JSON.parse(data);
                    if(data['type'] == 'success')
                        $('input[name="description"]').val(data['item'].description);
                    else 
                        showToast('Info', data['message'], 'Info');
                    M.updateTextFields();
                }
            });
        }
    })
    
    $(function() {
        // Create the QuaggaJS config object for the live stream
        var liveStreamConfig = {
            inputStream: {
                type : "LiveStream",
                constraints: {
                    width: {min: 840},
                    height: {min: 680},
                    aspectRatio: {min: 1, max: 500},
                    facingMode: "environment" // or "user" for the front camera
                }
            },
            locator: {
                patchSize: "medium",
                halfSample: true
            },
            numOfWorkers: (navigator.hardwareConcurrency ? navigator.hardwareConcurrency : 4),
            decoder: {
                "readers":[
                    {"format":"ean_reader","config":{}}
                ]
            },
            locate: true
        };
        // The fallback to the file API requires a different inputStream option.
        // The rest is the same
        var fileConfig = $.extend(
            {},
            liveStreamConfig,
            {
                inputStream: {
                    size: 600
                }
            }
        );
        // Start the live stream scanner when the modal opens
        $('#livestream_scanner').on('shown.bs.modal', function (e) {
            Quagga.init(
                liveStreamConfig,
                function(err) {
                    if (err) {
                        console.log(err);
                        $('#livestream_scanner .modal-body .error').html('<div class="alert alert-danger"><strong><i class="fa fa-exclamation-triangle"></i> '+err.name+'</strong>: '+err.message+'</div>');
                        Quagga.stop();
                        return;
                    }
                    Quagga.start();
                }
            );
        });

        // Make sure, QuaggaJS draws frames an lines around possible
        // barcodes on the live stream
        Quagga.onProcessed(function(result) {
            var drawingCtx = Quagga.canvas.ctx.overlay,
                drawingCanvas = Quagga.canvas.dom.overlay;

            if (result) {
                if (result.boxes) {
                    drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
                    result.boxes.filter(function (box) {
                        return box !== result.box;
                    }).forEach(function (box) {
                        Quagga.ImageDebug.drawPath(box, {x: 0, y: 1}, drawingCtx, {color: "green", lineWidth: 2});
                    });
                }

                if (result.box) {
                    Quagga.ImageDebug.drawPath(result.box, {x: 0, y: 1}, drawingCtx, {color: "#00F", lineWidth: 2});
                }

                if (result.codeResult && result.codeResult.code) {
                    Quagga.ImageDebug.drawPath(result.line, {x: 'x', y: 'y'}, drawingCtx, {color: 'red', lineWidth: 3});
                }
            }
        });

        // Once a barcode had been read successfully, stop quagga and
        // close the modal after a second to let the user notice where
        // the barcode had actually been found.
        Quagga.onDetected(function(result) {
            if (result.codeResult.code){
                $('#scanner_input').val(result.codeResult.code);
                Quagga.stop();
                setTimeout(function(){ $('#livestream_scanner').modal('hide'); }, 1000);
            }
        });

        // Stop quagga in any case, when the modal is closed
        $('#livestream_scanner').on('hide.bs.modal', function(){
            if (Quagga){
                Quagga.stop();
            }
        });

        // Call Quagga.decodeSingle() for every file selected in the
        // file input
        $("#livestream_scanner input:file").on("change", function(e) {
            if (e.target.files && e.target.files.length) {
                Quagga.decodeSingle($.extend({}, fileConfig, {src: URL.createObjectURL(e.target.files[0])}), function(result) {alert(result.codeResult.code);});
            }
        });
    });
</script>
</body>
</html>