function renderDiversities_ClientsTable(diversities_clients) {
	const row = document.getElementById('diversity_client-row-template').innerHTML;
	const tbody = document.querySelector('#diversities_clients');
	const html = Mustache.render(row, {
		diversities_clients,
	});
	tbody.insertAdjacentHTML('afterbegin', html);
}

$(document).ready(function () {
	$.ajax({
		type: 'GET',
		url: './includes/diversities_clients.php',
		datatype: 'JSON',
		success: function (data) {
			if (data == -1) {
				var diversities_clients = null;
			} else {
				var diversities_clients = JSON.parse(data);
			}
			return renderDiversities_ClientsTable(diversities_clients);
		},
	});
});
