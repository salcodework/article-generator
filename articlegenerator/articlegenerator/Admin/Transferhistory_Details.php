  
        <div class="templatemo-content">

          <h1>Transfer History Details</h1>
		<hr>

<script type="text/javascript" src="js/jquery.min.js"></script>

<form name="form" id="form">
<div class="row">
<div class="col-md-4 margin-bottom-15">
<label for="firstName" class="control-label">Account Number: </label>
<input type="text" name="sertex" class="form-control" id="sertex" >
</div>
   
<div class="col-md-4">
<label for="firstName" class="control-label"><br></label>
<button type="button" name="submit" class="form-control btn btn-sm btn-primary" onclick="autosearch(1);">Search</button>   
</div>

</div>

</form>
<br>

<script type="text/javascript">
function autosearch(str)
{
var info = $('#form').serialize()+'&page=1';
if(info=='')
{
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Transferhistoryaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
}  
});
}
}
</script>
<hr>


<div id="container">

<div id="flash" class="flash"></div>
<div id="show" class="show"></div>

</div>
</div>
