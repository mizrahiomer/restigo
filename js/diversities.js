function renderDiversitiesTable(diversities) {
	const row = document.getElementById('diversity-row-template').innerHTML;
	const tbody = document.querySelector('#diversities');
	const html = Mustache.render(row, {
		diversities,
	});
	tbody.insertAdjacentHTML('afterbegin', html);
}

$(document).ready(function () {
	$.ajax({
		type: 'GET',
		url: './includes/diversities.php',
		datatype: 'JSON',
		success: function (data) {
			if (data == -1) {
				var diversities = null;
			} else {
				var diversities = JSON.parse(data);
			}
			return renderDiversitiesTable(diversities);
		},
	});

	$(document).on('click', '.edit_diversity', function () {
		var edit_diversity_name = $(this).attr('id');
		$.ajax({
			type: 'GET',
			url: './includes/diversities.php',
			datatype: 'JSON',
			data: {
				edit_diversity_name,
			},
			success: function (data) {
				var diversity = JSON.parse(data);
				console.log(diversity);
				$('#edit_diversity_name').val(diversity.name);
				$('#diversity_name').val(diversity.name);
				$('#diversity_enable').prop('checked', diversity.enable);
				$('#edit_diversity_modal').modal('show');
			},
		});
	});

	$(document).on('click', '#delete_diversity', function () {
		var delete_diversity_name = $('#delete_diversity_name').val();
		$.ajax({
			type: 'POST',
			url: './includes/diversities.php',
			data: {
				delete_diversity_name,
			},
			success: function (data) {
				location.reload();
			},
		});
	});

	$(document).on('click', '.delete_diversity_name', function () {
		var delete_diversity_name = $(this).attr('id');
		$('#delete_diversity_name').val(delete_diversity_name);
		$('#delete_diversity_modal').modal('show');
	});
});
