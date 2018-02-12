function SearchVideos(videosearchdata){
	if (videosearchdata == ""){
		$('#searchresultdata').html("You must enter something into the search box!");
	}

	else{
		$.post('php/searchvideos.php',{videosearchdata:videosearchdata}, function(response){$('#searchresultdata').html(response)})
	}
}