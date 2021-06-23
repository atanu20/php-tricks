<?php
include('db.php');
$res=mysqli_query($con,"select * from email_list");
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Email Sending Script</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  <style>
	  .container{width:700px;margin-top:50px;}
	  </style>
   </head>
   <body>
      <div class="container">
         <h2>Email Sending Script</h2>
		 <?php if(mysqli_num_rows($res)>0){?>
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>S.No</th>
                  <th>Email</th>
                  <th>Send</th>
				  <th>Open</th>
               </tr>
            </thead>
            <tbody>
			   <?php 
			   $i=1;
			   while($row=mysqli_fetch_assoc($res)){?>	
               <tr>
                  <td><?php echo $i++?></td>
                  <td><?php echo $row['email']?></td>
                  <td id="btn<?php echo $row['id']?>">
				  <?php if($row['send']==0){?>
					<button type="button" class="btn btn-success" onclick="send_msg('<?php echo $row['id']?>')">Send</button>
				  <?php } else {
					  echo "Sent";
				  }?>
				  </td>
				  <td>
				  <?php 
				  if($row['open']==1){
					  echo "Yes";
				  }else{
					  echo "No";
				  }
				  ?>
				  </td>
               </tr>
			   <?php 
			   } ?>
            </tbody>
         </table>
		 <?php } else {
			 echo "No data found";
		 }?>
      </div>
	  <script>
	  function send_msg(id){
		  var check=confirm('Are your sure?');
		  if(check==true){
			  jQuery('#btn'+id).html('Please wait...');
			  jQuery.ajax({
				  url:'send_msg.php',
				  type:'post',
				  data:'id='+id,
				  success:function(result){
					  result=jQuery.parseJSON(result);
					  console.log(result.status);
					  if(result.status==true){
						  jQuery('#btn'+id).html('Sent');
					  }
					  if(result.status==false){
						  jQuery('#btn'+id).html('<button type="button" class="btn btn-success" onclick=send_msg("'+id+'")>Send</button><div clsss="error_msg">'+result.msg+'</div>');
					  }
				  }
			  });
		  }
	  }
	  </script>
   </body>
</html>