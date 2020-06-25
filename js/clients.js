function renderClientsTable(clients) {
	const row = document.getElementById('client-row-template').innerHTML;
	const tbody = document.querySelector('#clients');
	const html = Mustache.render(row, {
		clients,
	});
	tbody.insertAdjacentHTML('afterbegin', html);
}

$(document).ready(function () {
	$.ajax({
		type: 'GET',
		url: './includes/clients.php',
		datatype: 'JSON',
		success: function (data) {
			if (data == -1) {
				var clients = null;
			} else {
				var clients = JSON.parse(data);
			}
			return renderClientsTable(clients);
		},
	});

	$(document).on('click', '.edit_client', function () {
		var edit_client_name = $(this).attr('id');

		$.ajax({
			type: 'GET',
			url: './includes/clients.php',
			datatype: 'JSON',
			data: {
				edit_client_name,
			},
			success: function (data) {
				var client = JSON.parse(data);
				console.log(client);
				$('#edit_client_name').val(client.name);
				$('#client_name').val(client.name);
				$('#client_type').val(client.type);
				$('#client_enable').prop('checked', client.enable);
				$('#edit_client_modal').modal('show');
			},
		});
	});

	$(document).on('click', '#delete_client', function () {
		var delete_client_name = $('#delete_client_name').val();
		$.ajax({
			type: 'POST',
			url: './includes/clients.php',
			data: {
				delete_client_name,
			},
			success: function (data) {
				location.reload();
			},
		});
	});

	$(document).on('click', '.delete_client_name', function () {
		var delete_client_name = $(this).attr('id');
		$('#delete_client_name').val(delete_client_name);
		$('#delete_client_modal').modal('show');
	});
});
