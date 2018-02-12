function SearchArticles(articlesearchdata){
	if (articlesearchdata == ""){
		$('#searchresultdata').html("You must enter something into the search box!");
	}

	else{
		$.post('php/searcharticles.php',{articlesearchdata:articlesearchdata}, function(response){$('#searchresultdata').html(response)})
	}
}

