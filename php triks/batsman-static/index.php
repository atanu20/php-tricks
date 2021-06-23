<?php
$key="";
//$pid="35320";
$html="";
$msg="";
if(isset($_GET['search']) && $_GET['search']!=''){
	$str=urlencode($_GET['search']);
	$url="https://cricapi.com/api/playerFinder?apikey=$key&name=$str";
	$get_json=file_get_contents($url);
	$getPlayerArr=json_decode($get_json,true);
	if(isset($getPlayerArr['data']['0'])){
		if(count($getPlayerArr['data'])>0){
			foreach($getPlayerArr['data'] as $list){
				$html.="<a href='?pid=".$list['pid']."'>".$list['name']."</a><br/><br/>";
			}
		}else{
			$pid=$getPlayerArr['data']['0']['pid'];
			$url="https://cricapi.com/api/playerStats?apikey=$key&pid=$pid";
			$str=file_get_contents($url);
			$arr=json_decode($str,true);
		}
	}else{
		$msg="No record found";
	}
	//$url="https://cricapi.com/api/playerStats?apikey=$key&pid=$pid";
	//$str=file_get_contents($url);
	//$arr=json_decode($str,true);
}

if(isset($_GET['pid']) && $_GET['pid']>0){
	$pid=$_GET['pid'];
	$url="https://cricapi.com/api/playerStats?apikey=$key&pid=$pid";
	$str=file_get_contents($url);
	$arr=json_decode($str,true);
}
?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Cricket Player Statistics</title>
      <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
         .bd-placeholder-img {
         font-size: 1.125rem;
         text-anchor: middle;
         -webkit-user-select: none;
         -moz-user-select: none;
         user-select: none;
         }
         @media (min-width: 768px) {
         .bd-placeholder-img-lg {
         font-size: 3.5rem;
         }
         }
		 .container{
			 width:100%;
		 }
		 .starter-template tr{
			 line-height:30px;
		 }
		 .mt20{
			 margin-top:20px;
		 }
      </style>
      <!-- Custom styles for this template -->
      <link href="https://getbootstrap.com/docs/5.0/examples/starter-template/starter-template.css" rel="stylesheet">
   </head>
   <body>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
         <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
               <ul class="navbar-nav me-auto mb-2 mb-md-0">
                 
               </ul>
               <form class="d-flex" method="get">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                  <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
               </form>
            </div>
         </div>
      </nav>
      <main class="container">
         <div class="starter-template py-5">
			<?php
			if(isset($arr['pid'])){
			?>
				<h4><?php echo $arr['name']?> - (<?php echo $arr['country']?>)</h4>
				<img src="<?php echo $arr['imageURL']?>"/>
				<div class="row">
					<h4>Personal Information</h4>
					<div class="col-lg-4">
						<table>
							<tr>
								<th width="35%" valign="top">Born</th>
								<td><?php echo $arr['born']?></td>
							</tr>
							<tr>
								<th valign="top">Age</th>
								<td><?php echo $arr['currentAge']?></td>
							</tr>
							<tr>
								<th valign="top">Full Name</th>
								<td><?php echo $arr['fullName']?></td>
							</tr>
							
							<tr>
								<th valign="top">Playing Role</th>
								<td><?php echo $arr['playingRole']?></td>
							</tr>
							<tr>
								<th valign="top">Batting Style</th>
								<td><?php echo $arr['battingStyle']?></td>
							</tr>
							<tr>
								<th valign="top">Bowling Style</th>
								<td><?php echo $arr['bowlingStyle']?></td>
							</tr>
							<tr>
								<th valign="top">Major Teams</th>
								<td><?php echo $arr['majorTeams']?></td>
							</tr>
						</table>
					</div>
					<div class="col-lg-8">
						<p><?php echo $arr['profile']?></p>
						<h4>Batting</h4>
						<table width="100%">
							<tr>
								<th></th>
								<th>Mat</th>
								<th>Inns</th>
								<th>NO</th>
								<th>Runs</th>
								<th>HS</th>
								<th>Ave</th>
								<th>BF</th>
								<th>SR</th>
								<th>4s</th>
								<th>6s</th>
								<th>Ct</th>
								<th>St</th>
								<th>100</th>
								<th>50</th>
							</tr>
							<?php foreach($arr['data']['batting'] as $key=>$val){
							?>
								<th><?php echo ucfirst($key)?></th>
								<td><?php echo $val['Mat']?></td>
								<td><?php echo $val['Inns']?></td>
								<td><?php echo $val['NO']?></td>
								<td><?php echo $val['Runs']?></td>
								<td><?php echo $val['HS']?></td>
								<td><?php echo $val['Ave']?></td>
								<td><?php echo $val['BF']?></td>
								<td><?php echo $val['SR']?></td>
								<td><?php echo $val['4s']?></td>
								<td><?php echo $val['6s']?></td>
								<td><?php echo $val['Ct']?></td>
								<td><?php echo $val['St']?></td>
								<td><?php echo $val['100']?></td>
								<td><?php echo $val['50']?></td>
							</tr>
							<?php } ?>
						</table>
						
						<h4 class="mt20">Bowling</h4>
						<table width="100%">
							<tr>
								<th></th>
								<th>Mat</th>
								<th>Inns</th>
								<th>Balls</th>
								<th>Runs</th>
								<th>Wkts</th>
								<th>BBI</th>
								<th>BBM</th>
								<th>Ave</th>
								<th>Econ</th>
								<th>SR</th>
								<th>4w</th>
								<th>5w</th>
								<th>10</th>
							</tr>
							<?php foreach($arr['data']['bowling'] as $key=>$val){
							?>
								<th><?php echo ucfirst($key)?></th>
								<td><?php echo $val['Mat']?></td>
								<td><?php echo $val['Inns']?></td>
								<td><?php echo $val['Balls']?></td>
								<td><?php echo $val['Runs']?></td>
								<td><?php echo $val['Wkts']?></td>
								<td><?php echo $val['BBI']?></td>
								<td><?php echo $val['BBM']?></td>
								<td><?php echo $val['Ave']?></td>
								<td><?php echo $val['Econ']?></td>
								<td><?php echo $val['SR']?></td>
								<td><?php echo $val['4w']?></td>
								<td><?php echo $val['5w']?></td>
								<td><?php echo $val['10']?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			<?php
			}else{
				if($html==''){
					echo $msg;
				}else{
					echo "<h3>Please select player</h3><br/>";
					echo $html;
				}
				
			}
			?>
         </div>
      </main>
      <!-- /.container -->
      <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" ></script>
   </body>
</html>