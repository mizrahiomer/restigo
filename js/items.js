function renderItemsTable(items) {
	const row = document.getElementById('item-row-template').innerHTML;
	const tbody = document.querySelector('#items');
	const html = Mustache.render(row, {
		items,
	});
	tbody.insertAdjacentHTML('afterbegin', html);
}

$(document).ready(function () {
	$.ajax({
		type: 'GET',
		url: './includes/items.php',
		datatype: 'JSON',
		success: function (data) {
			if (data == -1) {
				var items = null;
			} else {
				var items = JSON.parse(data);
			}
			return renderItemsTable(items);
		},
	});

	$(document).on('click', '.edit_item', function () {
		var edit_item_id = $(this).attr('id');

		$.ajax({
			type: 'GET',
			url: './includes/items.php',
			datatype: 'JSON',
			data: {
				edit_item_id,
			},
			success: function (data) {
				var item = JSON.parse(data);
				$('#edit_item_id').val(item.catalog_number);
				$('#item_catalog_number').val(item.catalog_number);
				$('#item_name').val(item.name);
				$('#item_price').val(item.price);
				$('#item_vat').prop('checked', item.has_vat);
				$('#item_enable').prop('checked', item.enable);
				$('#edit_item_modal').modal('show');
			},
		});
	});
	$(document).on('click', '#delete_item', function () {
		var delete_item_id = $('#delete_item_id').val();
		$.ajax({
			type: 'POST',
			url: './includes/items.php',
			data: {
				delete_item_id,
			},
			success: function (data) {
				location.reload();
			},
		});
	});

	$(document).on('click', '.delete_item_id', function () {
		var delete_item_id = $(this).attr('id');
		$('#delete_item_id').val(delete_item_id);
		$('#delete_item_modal').modal('show');
	});
});
