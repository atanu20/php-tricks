<div id="player"></div>
<form method="post">
	<input type="textbox" id="txt" name="txt"/>
	<input type="button" name="submit" value="Convert to speach" onclick="getAudio()"/>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
function getAudio(){
	var txt=jQuery('#txt').val()
	jQuery.ajax({
		url:'get.php',
		type:'post',
		data:'txt='+txt,
		success:function(result){
			jQuery('#player').html(result);
		}
	});
}
</script>