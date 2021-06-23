<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<input type="textbox" id="num1"/>
<a href="javascript:void(0)" onclick="click_here()">Click Here</a>

<script>
function click_here(){
	var num1=jQuery('#num1').val();
	jQuery.ajax({
		url:'get.php',
		type:'post',
		data:'num1='+num1,
		success:function(result){
			alert(result);
		}
	});
}
</script>