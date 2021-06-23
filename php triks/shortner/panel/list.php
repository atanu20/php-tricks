
		 <?php 
		 include('header.php');
		 if(isset($_GET['type']) && $_GET['type']=='delete'){
			$id=mysqli_real_escape_string($con,$_GET['id']);
			mysqli_query($con,"delete from shorturl where id='$id'");
		 }
		 
		  if(isset($_GET['type']) && $_GET['type']=='status'){
			$id=mysqli_real_escape_string($con,$_GET['id']);
			$status=mysqli_real_escape_string($con,$_GET['status']);
			if($status=='active'){
				mysqli_query($con,"update shorturl set status='1' where id='$id'");
			}else{
				mysqli_query($con,"update shorturl set status='0' where id='$id'");
			}
		 }
		 ?>
         <!-- Page Content Start -->
         <!-- ================== -->
         <div class="wraper container-fluid">
            <div class="page-title">
               <h3 class="title">Short Link</h3>
			   <h4 class="title"><a href="form.php">Add Link</a></h4>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="panel panel-default">
                     
                     <div class="panel-body">
                        <div class="row">
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="table-responsive">
                                 <table class="table">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Text</th>
                                          <th>Short Link</th>
                                          <th>Link</th>
                                          <th>Count</th>
										  <th></th>
                                       </tr>
                                    </thead>
                                    <tbody>
										<?php
										$sql=mysqli_query($con,"select * from shorturl");
										while($row=mysqli_fetch_assoc($sql)){
										?>
                                       <tr>
                                          <td>1</td>
                                          <td><?php echo $row['txt']?></td>
                                          <td><?php echo $row['short_link']?></td>
                                          <td><a href="<?php echo $row['link']?>" target="_blank"><?php echo $row['link']?></a></td>
                                          <td><?php echo $row['hit_count']?></td>
										  <td>
										  <a href="?id=<?php echo $row['id']?>&type=delete">Delete</a>
										  <?php
										  if($row['status']==1){
											?><a href="?id=<?php echo $row['id']?>&type=status&status=deactive">Active</a><?php
										  }else{
											?><a href="?id=<?php echo $row['id']?>&type=status&status=active">Deactive</a><?php
										  }
										  ?>
										  </td>
                                       </tr>
                                       <?php } ?>
                                       
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
         
		 <?php include('footer.php')?>