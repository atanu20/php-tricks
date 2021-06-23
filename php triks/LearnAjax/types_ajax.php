<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
hit1();
hit2();
function hit1(){
	jQuery.ajax({
		url:'get1.php',
		type:'post',
		async:false,
		success:function(result){
			console.log(result);
		}
	});
}
function hit2(){
	jQuery.ajax({
		url:'get2.php',
		type:'post',
		success:function(result){
			console.log(result);
		}
	});
}
</script>