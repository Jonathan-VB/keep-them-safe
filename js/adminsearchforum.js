function adminsearchforum(forumsearchbox){
	if (forumsearchbox == ""){
		$('#searchresultdata').html("You must enter something into the search box!");
	}

	else{
		$.post('php/adminsearchforum.php',{forumsearchbox:forumsearchbox}, function(response){$('#adminsearchresultdata').html(response)})
	}
}