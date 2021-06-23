<?php
include('database.php');
$sql="select id,name from student order by name asc";
$res=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Fetch JSON Data with the help of PHP and Ajax</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br /><br />
		<div class="container">
			<h2 align="center">Fetch JSON Data with the help of PHP and Ajax</a></h2>
			<div class="row">
				<div class="col-md-12">
					<br />			
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<select name="student_list" id="student_list" class="form-control" onchange="getData(this.options[this.selectedIndex].value)">
								<option value="">Select Student ID</option>
								<?php while($row=mysqli_fetch_assoc($res)){?>
								<option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<br />
					<div class="table-responsive" id="user_details" style="display:none">
						<table class="table table-bordered">
							<tr>
								<td width="10%" align="right"><b>Name</b></td>
								<td width="90%"><span id="user_name"></span></td>
							</tr>
							<tr>
								<td width="10%" align="right"><b>City</b></td>
								<td width="90%"><span id="user_city"></span></td>
							</tr>
							<tr>
								<td width="10%" align="right"><b>Email</b></td>
								<td width="90%"><span id="user_email"></span></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<script>
		function getData(id){
			if(id==''){
				jQuery('#user_details').hide();
			}else{
				jQuery.ajax({
					url:'getData.php',
					type:'post',
					data:'id='+id,
					success:function(result){
						var json_data=jQuery.parseJSON(result);
						jQuery('#user_details').show();
						jQuery('#user_name').html(json_data.name);
						jQuery('#user_city').html(json_data.city);
						jQuery('#user_email').html(json_data.email);
					}

				})
			}
		}
		</script>
	</body>
</html>