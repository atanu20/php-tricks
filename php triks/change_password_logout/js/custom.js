setInterval(function(){
	checkUserStatus();
},5000);
function checkUserStatus(){
	jQuery.ajax({
		url:'check_status.php',
		success:function(result){
			var result=result.trim();
			if(result!=1){
				window.location.href='logout.php';
			}
		}
	});
}