<?php
	//Get the data from the form
	require_once 'dbconnect.php';
	$videoTitle = $_POST['videoTitle'];
	$videoText = $_POST['videoText'];
	$videoTags = $_POST['videoTags'];
	$videoName = $_FILES['file']['name'];
	$fileType = pathinfo($videoName, PATHINFO_EXTENSION);
	$videoUrl = "uploaded/$videoName";
	$temp = $_FILES['file']['tmp_name'];
	$videoGroup = $_POST['videoGroup'];
	$videoUrlfilecheck = "../uploaded/".$videoName;
	//If filtype is not mp4 redirect and show the error
	if ($fileType != "mp4") {
		header("Location: ../contentsubmitvideoform.php?badvideofile=Your video is not of the required .MP4 extension!");
	}
	else{
		//If a file with that name exists, return back to form and display error
		if (file_exists($videoUrlfilecheck)) {
			header("Location: ../contentsubmitvideoform.php?fileexists=A file with this name already exists!");
		}
		else{
			//Move the file from php temp storage to the permanent video directory
			move_uploaded_file($temp, "../uploaded/".$videoName);
			//insert row into db
			mysql_query("INSERT INTO `pendingvideos` VALUE ('','$videoTitle','$videoText','$videoTags','$videoGroup','$videoName','$videoUrl')");
			//redirect back to form and show successful 
			header("Location: ../contentsubmitvideoform.php?success=Successfully Submitted");
			die();
		}
	}
?>