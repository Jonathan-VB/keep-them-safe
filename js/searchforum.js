function searchforum(forumsearchbox){
	if (forumsearchbox == ""){
		$('#searchresultdata').html("You must enter something into the search box!");
	}

	else{
		$.post('php/searchforum.php',{forumsearchbox:forumsearchbox}, function(response){$('#searchresultdata').html(response)})
	}
}