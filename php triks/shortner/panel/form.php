		 <?php 
		 include('header.php');
		 if(isset($_POST['link'])){
			$link=$_POST['link'];
			$short_link=$_POST['short_link'];
			$txt=$_POST['txt'];
			
			$count=mysqli_num_rows(mysqli_query($con,"select * from shorturl where short_link='$short_link'"));
			if($count>0){
				echo "Short Link already exist";
			}else{
				mysqli_query($con,"insert into shorturl(link,short_link,txt,status) values('$link','$short_link','$txt','1')");
				header('location:list.php');
				die();
			}
		 }
		 ?>
         <!-- Page Content Start -->
         <!-- ================== -->
         <div class="wraper container-fluid">
            <div class="page-title">
               <h3 class="title">Add Short Link</h3>
            </div>
            <div class="row">
               
               <div class="col-md-12">
                  <div class="panel panel-default">
                     
                     <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post">
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-3 control-label">Link</label>
                              <div class="col-sm-9">
                                 <input type="textbox" class="form-control" id="link" name="link" placeholder="link" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputPassword3" class="col-sm-3 control-label">Short Link</label>
                              <div class="col-sm-9">
                                 <input type="textbox" class="form-control" id="short_link" name="short_link" placeholder="short link" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputPassword4" class="col-sm-3 control-label">Text</label>
                              <div class="col-sm-9">
                                 <input type="textbox" class="form-control" id="txt" name="txt" placeholder="Text" required>
                              </div>
                           </div>
                           
						   <div class="form-group m-b-0">
                              <div class="col-sm-offset-3 col-sm-9">
                                 <button type="submit" class="btn btn-info">Generate</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- panel-body -->
                  </div>
                  <!-- panel -->
               </div>
               <!-- col -->
            </div>
            <!-- End row -->
            
         </div>
         <!-- Page Content Ends -->
         <!-- ================== -->
         <!-- Footer Start -->
          <?php include('footer.php')?>