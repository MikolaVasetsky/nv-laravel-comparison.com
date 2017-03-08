$(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	/*
	 * action after change type
	 * ajax for get new options
	 */
	$(document).on('change', '#select_type', function(e) {
		e.preventDefault();
		$('#select_attribute').html('<option value="">Loading...</option>');

		$.ajax({
			type: "POST",
			url: '/admin/get-new-options',
			data: {
				type: $(this).val(),
			},
			success: function( response ) {
				var html = '';
				$.each(response, function(i, val) {
					html += '<option value="'+i+'">'+val+'</option>';
				});
				$('#select_attribute').html(html);
			},
			error: function( error ) {
				alert('Error');
				console.log(error);
			}
		});
	});
});