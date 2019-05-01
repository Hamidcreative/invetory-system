<div id="main">

	<div class="row">
		<div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
			<!-- Search for small screen-->
			<div class="container">
				<div class="row">
					<div class="col s12 m6 l6">
						<h5 class="breadcrumbs-title mt-0 mb-0">Warehouse Types</h5>
					</div>
					<div class="col s12 m6 l6 right-align-md">
						<ol class="breadcrumbs mb-0">
							<li class="breadcrumb-item"><a href="<?= base_url('warehouse')?>">Warehouse </a></li>
							<li class="breadcrumb-item"><a href="<?= base_url('warehouse/types')?>">Warehouse Types</a></li>
							<li class="breadcrumb-item"><a href="#">Listing</a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					<div class="row">
						<div class="col s12">
							<table id="warehousetypes" class="display warehousetypes">
								<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(function () {
		oTable = "";
		var regTableSelector = $("#warehousetypes");
		var url_DT = "<?=base_url();?>warehouse/types/listing/listing";
		var aoColumns_DT = [
			/* ID */ {
				"mData": "ID",
				"bVisible": true,
				"bSortable": true,
				"bSearchable": true
			},
			/* Status */ {
				"mData": "Name"
			},
			{
				"mData": "Status"
			},
			{
				"mData": "ViewEditActionButtons"
			}
		];
		var HiddenColumnID_DT = "ID";
		var sDom_DT = 'lf<"H"r>t<"F"<"row"<"col-lg-6 col-xs-12" i> <"col-lg-6 col-xs-12" p>>>';
		commonDataTables(regTableSelector, url_DT, aoColumns_DT, sDom_DT, HiddenColumnID_DT);


		$(document).on('click','.deletemodal',function(e){
			$('#deletemodal').modal('open');
			var id = $(this).parents("tr").attr("data-id");
			$('#deletemodal').find("input#hiddenUserID").val(id);
		});
		$(".Agree").on("click", function () {
			var ID = $('#deletemodal').find("input#hiddenUserID").val();			 
			var postData = {
				'id': ID,"<?=$csrf['name']?>":"<?=$csrf['hash']?>",
			};
			$.ajax({
				url:"<?=base_url();?>warehouse/types/listing/delete",
				data: postData,
				type:"POST",
				success: function (data) {
					data = JSON.parse(data);
					showToast(data['type'], data['message'], data['type']);
					oTable.fnDraw();
					}
			});
		});
		$(document).on("click",'.statusmodal',function () {
			var status = $(this).attr("data-id");
			var id = $(this).parents("tr").attr("data-id");
			var postData = {
				'id': id,'status': status,"<?=$csrf['name']?>":"<?=$csrf['hash']?>",
			};
			$.ajax({
				url:"<?=base_url();?>warehouse/types/listing/status",
				data: postData,
				type:"POST",
				success: function (data) {
					data = JSON.parse(data);
					showToast(data['type'], data['message'], data['type']);
					oTable.fnDraw();
				}
			});
		});
	});
</script>