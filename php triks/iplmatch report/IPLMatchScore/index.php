<?php
$arrUniqueId=['1254059','1254060','1254064'];
$apikey="apikey";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ScoreBoard</title>

    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/index.css"/>

  </head>
  <body>
    <!--Whole Container -->
    <div class="rca-container rca-margin">
      
      <!--Live ScoreBoard -->
      <div class="rca-row">
        
        <div class="rca-column-6">
          <?php
		  foreach($arrUniqueId as $unique_id){
		  $matchURL="https://cricapi.com/api/cricketScore?apikey=$apikey&unique_id=$unique_id";
		  $resultMatch=file_get_contents($matchURL);
		  $resultMatch=json_decode($resultMatch,true);
		  ?>
		  <div class="rca-mini-widget rca-history-info">
			<div class="rca-row">
               <div style="padding:20px;font-size:20px;"> <?php echo $resultMatch['team-1']?> vs <?php echo $resultMatch['team-2']?></div>
			   <?php
			   if($resultMatch['matchStarted']==1){
				 ?><br/>
				 <div style="padding:17px;"><a href="detail.php?uid=<?php echo $unique_id?>" style="color:red;"><?php echo $resultMatch['score']?></a></div>
				 <?php  
			   }
			   ?>
            </div>
          </div>
		  <?php } ?>
		</div>

	  </div>
    </div>
 
    
  </body>
</html>