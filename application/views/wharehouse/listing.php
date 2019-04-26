<div id="main">
	<!-- Page Length Options -->
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					<h4 class="card-title">Page Length Options</h4>
					<div class="row">
						<div class="col s12">
							<table id="page-length-option" class="display usersList">
								<thead>
								<tr>
									<th>Id</th>
									<th>Username</th>
									<th>Email</th>
									<th>First Name</th>
									<th>Last Name</th>
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
</div><div class="modal approval-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Trashed Model</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<input type="hidden" id="hiddenUserID">
					<div class="col-md-12">
						<p>Do You Want To Trash This Email?</p>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="yesApprove">Yes</button>
				<button type="button" class="btn btn-danger mright" data-dismiss="modal" aria-label="Close" id="nodelete">No</button>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<script>
	$(function () {
		oTable = "";
		var regTableSelector = $("#statusList");
		var url_DT = "<?=base_url();?>wharehouse/listing";
		var aoColumns_DT = [
			/* ID */ {
				"mData": "ID",
				"bVisible": true,
				"bSortable": true,
				"bSearchable": true
			},
			/* Status */ {
				"mData": "FirstName"
			},
			{
				"mData": "Email"
			},
			{
				"mData": "send_date"
			},
			{
				"mData": "ViewEditActionButtons"
			}
		];
		var HiddenColumnID_DT = "ID";
		var sDom_DT = '<"H"r>t<"F"<"row"<"col-lg-6 col-xs-12" i> <"col-lg-6 col-xs-12" p>>>';
		commonDataTables(regTableSelector, url_DT, aoColumns_DT, sDom_DT, HiddenColumnID_DT);


		new $.fn.dataTable.Responsive(oTable, {
			details: true
		});
		removeWidth(oTable);

		//Code for search box
		$("#search-input").on("keyup", function (e) {
			oTable.fnFilter($(this).val());
		});
		oTable = $('#statusList').DataTable();  // // Search by Title
		$('#Search_by_To').keyup(function(){
			oTable.column(1).search($(this).val()).draw() ;
		})
		oTable = $('#statusList').DataTable();  //// Search by Author
		$('#Search_by_Subject').keyup(function(){
			oTable.column(2).search($(this).val()).draw() ;
		})
		oTable = $('#statusList').DataTable();  ////Search by Tags
		$('#Search_by_Date').keyup(function(){
			oTable.column(3).search($(this).val()).draw() ;
		})


		$(".approval-modal").on("shown.bs.modal", function (e) {

			var button = $(e.relatedTarget); // Button that triggered the modal
			var ID = button.parents("tr").attr("data-id");
			var Status = $.trim(button.parents("tr").find('td').eq(1).text());
			var modal = $(this);
			modal.find("input#hiddenUserID").val(ID);
			modal.find(".modal-body").find('p > strong').text(' "' + Status + '"');
		});

		$("#editStatusModal").on("shown.bs.modal", function (e) {
			var button = $(e.relatedTarget); // Button that triggered the modal
			var ID = button.parents("tr").attr("data-id");
			var Status = $.trim(button.parents("tr").find('td').eq(1).text());
			var modal = $(this);
			modal.find("input#hiddenID").val(ID);
			modal.find("#editStatusBox").val(Status);

		});

		$("#yesApprove").on("click", function () {
			var hiddenModalID = $(this).parents(".modal-content").find("#hiddenUserID").val();
			var postData = {id: hiddenModalID, value: "delete"};
			$.ajax({
				url: baseUrl + "admin/contact/manage_contact/delete",
				data: postData,
				type: "POST",
				success: function (output) {
					var data = output.split("::");
					if (data[0].split(' ').join('') == 'OK') {
						$(".approval-modal").modal('hide');
						oTable.draw();
					}
					if(data[3])
						Haider.notification(data[1], data[2], data[3]);
					else
						Haider.notification(data[1], data[2]);
				}
			});
		});
	});
</script>