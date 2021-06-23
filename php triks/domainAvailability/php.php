<form>
    <input type="textbox" name="domain" id="domain"/>
    <input type="button" onclick="checkDomain()" value="Click Here"/>
</form>
<div id="result"></div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
function checkDomain(){
    jQuery('#result').html('');    
    var domain=jQuery('#domain').val();
    if(domain==''){
        jQuery('#result').html('Please enter domain name');
    }else{
        jQuery('#result').html('<img src="loader.gif"/>');    
        jQuery.ajax({
               url:'get.php',
               data:'domain='+domain,
               type:'post',
               success:function(result){
                   var getData=$.parseJSON(result); 
                   jQuery('#result').html('Domain is '+getData.domainAvailability);
                    
                } 

        });
    }
}
</script>
<style>
#result{color:red;}
</style>

