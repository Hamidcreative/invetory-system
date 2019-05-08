<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        #interactive.viewport {position: relative; width: 100%; height: auto; overflow: hidden; text-align: center;}
        #interactive.viewport > canvas, #interactive.viewport > video {max-width: 100%;width: 100%;}
        canvas.drawing, canvas.drawingBuffer {position: absolute; left: 0; top: 0;}
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


    <script type="text/javascript" src="https://cdn.rawgit.com/serratus/quaggaJS/0420d5e0/dist/quagga.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>


<!-- Div to show the scanner -->
<div class="row">
    <div class="col-lg-6">
        <div class="input-group">
            <input id="scanner_input" class="form-control" placeholder="Click the button to scan an EAN..." type="text" />
			<span class="input-group-btn">
				<button class="btn btn-default" type="button" data-toggle="modal" data-target="#livestream_scanner">
                    Click to scan
                </button>
			</span>
        </div><!-- /input-group -->
    </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<div class="modal" id="livestream_scanner">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Barcode Scanner</h4>
            </div>
            <div class="modal-body" style="position: static">
                <div id="interactive" class="viewport"></div>
                <div class="error"></div>
            </div>
            <div class="modal-footer">
                <label class="btn btn-default pull-left">
                    <i class="fa fa-camera"></i> Use camera app
                    <input type="file" accept="image/*;capture=camera" capture="camera" class="hidden" />
                </label>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Include the image-diff library -->





<script type="text/javascript">
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