function renderDiversities_ItemsTable(diversities_items) {
	const row = document.getElementById('diversity_item-row-template').innerHTML;
	const tbody = document.querySelector('#diversities_items');
	const html = Mustache.render(row, {
		diversities_items,
	});
	tbody.insertAdjacentHTML('afterbegin', html);
}
$(document).ready(function () {
	$.ajax({
		type: 'GET',
		url: './includes/diversities_items.php',
		datatype: 'JSON',
		success: function (data) {
			console.log(data);
			if (data == -1) {
				var diversities_items = null;
			} else {
				var diversities_items = JSON.parse(data);
			}
			return renderDiversities_ItemsTable(diversities_items);
		},
	});
});
