<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Drag & Drop Using Dropzone With PHP</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/dropzone.css">
</head>
<body>
	<div id="main">
		<div id="header">
			<h1>Drag & Drop Upload Files<br> Using Dropzone With PHP</h1>
		</div>
		<div id="content">
      <form class="dropzone" id="file_upload"></form>
      <button id="upload_btn">Upload</button>
		</div>
	</div>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/dropzone.js"></script>
  <script>
    Dropzone.autoDiscover = false;
    
    var myDropzone = new Dropzone("#file_upload", { 
      url: "upload.php",
      parallelUploads: 3,
      uploadMultiple: true,
      acceptedFiles: '.png,.jpg,.jpeg',
      autoProcessQueue: false,
      success: function(file,response){
        if(response == 'true'){
          $('#content .message').hide();
          $('#content').append('<div class="message success">Images Uploaded Successfully.</div>');
        }else{
          $('#content').append('<div class="message error">Images Can\'t Uploaded.</div>');
        }
      }
    });

    $('#upload_btn').click(function(){
      myDropzone.processQueue();
    });
  </script>
</body>
</html>
