<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Keep Them Safe</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Articles<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="searcharticles.php">Search Articles</a></li>
						<li><a href="articles.php">Latest Articles</a></li>
						<li><a href="facebookarticles.php">Facebook Articles</a></li>
						<li><a href="youtubearticles.php">Youtube Articles</a></li>
						<li><a href="twitterarticles.php">Twitter Articles</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Video Tutorials<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="searchvideos.php">Search Video Tutorials</a></li>
						<li><a href="videos.php">Latest Video Tutorials</a></li>
						<li><a href="facebookvideos.php">Facebook Video Tutorials</a></li>
						<li><a href="youtubevideos.php">Youtube Video Tutorials</a></li>
						<li><a href="twittervideos.php">Twitter Video Tutorials</a></li>
					</ul>
				</li>
				<li role="presentation"><a href="forum.php">Forum</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Add Content<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="contentsubmitvideoform.php">Add New Video</a></li>
						<li><a href="contentaddarticleform.php">Add New Article</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="adminviewpendingarticles.php">Article Approval List</a></li>
						<li><a href="adminvideolist.php">Video Approval List</a></li>
						<li><a href="adminforum.php">Administrate Forum</a></li>
						<li><a href="viewusers.php">View Users List</a></li>
						<li><a href="admincontactussubmissions.php">View Contact Us Submissions</a></li>
					</ul>
				</li>
				<li role="presentation"><a href="contact.php">Contact</a></li>
			</ul>
			<div class="nav navbar-nav navbar-right">
				<?php require 'login.php' ?>
			</div>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>