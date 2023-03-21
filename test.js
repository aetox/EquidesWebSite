$(document).ready(function() {
	$('#search-bar').on('keyup', function() {
        console.log("KeyUpOk");
		var searchValue = $(this).val();
		if (searchValue.length >= 2) {
			$.ajax({
				type: 'GET',
				url: 'http://localhost:80/testrecherche.php',
				data: {'q': searchValue},
				success: function(data) { 
                    console.log(data);
					$('#search-options').html(data);
				}
			});
		} else {
			$('#search-options').empty();
            console.log("ChaineVide")
		}
	});

	$('#search-options').on('click', '.option', function() {
		var optionValue = $(this).text();
		$('#search-bar').val(optionValue);
		$('#search-options').empty();
	});

	$('#search-bar').on('blur', function() {
		$('#search-options').empty();
	});
});
