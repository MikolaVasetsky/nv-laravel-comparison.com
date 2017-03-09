$(function() {
	// $.ajaxSetup({
	// 	headers: {
	// 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	// 	}
	// });

	// /*
	//  * action after change type
	//  * ajax for get new options
	//  */
	// $(document).on('change', '#select_type', function(e) {
	// 	e.preventDefault();
	// 	$('#select_attribute, #select_category').html('<option value="">Loading...</option>');

	// 	$.ajax({
	// 		type: "POST",
	// 		url: '/admin/get-new-html',
	// 		data: {
	// 			type: $(this).val(),
	// 			withCategory: $(this).data('withcategory'),
	// 		},
	// 		success: function( response ) {
	// 			if ( response.attributes ) {
	// 				var htmlAttribute = '';
	// 				$.each(response.attributes, function(i, val) {
	// 					htmlAttribute += '<option value="'+i+'">'+val+'</option>';
	// 				});
	// 				$('#select_attribute').html(htmlAttribute);
	// 			}

	// 			if ( response.categories ) {
	// 				var htmlCategory = '';
	// 				$.each(response.categories, function(i, val) {
	// 					htmlCategory += '<option value="'+i+'">'+val+'</option>';
	// 				});
	// 				$('#select_category').html(htmlCategory);
	// 			}
	// 		},
	// 		error: function( error ) {
	// 			alert('Error');
	// 			console.log(error);
	// 		}
	// 	});
	// });
});