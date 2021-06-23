<?php
require('db.php');
echo mysqli_num_rows(mysqli_query($con,"select * from users_login where user_id='".$_SESSION['UID']."' and rand_no='".$_SESSION['UID_RAND']."'"));
?>