// For sorting the data in table
	$(document).ready(function() {
		$('#returnedTable').DataTable({
			"columnDefs": [
				{ "targets": [2], "type": "num" } // Specify columns with numeric data
			]
		});
	});