 <div class="product" id="myproduct"  >
					<h1>Article  Generator</h1>	    
<hr>		    

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
$(function() {

$("#Detailsbutton").click(function() {

$("#Showdetails").html("Wait...");

var info=$('#Detailsform').serialize();
$.ajax({
type: "POST",
url: "http://127.0.0.1:5555/success",
data: info,
cache: true,
success: function(html){
	
$("#Showdetails").html(html);

}  
});

});

});
</script>


<form class="loginbox form-horizontal" id="Detailsform" style="font-size: 14px;">
 <input type="hidden" class="form-control" name="UID" value="<?php echo $_SESSION['userid']; ?>">
 						<div class="form-group">
							<label class="control-label col-md-4" for="inputEmail">Enter Required Article <span class="required">*</span></label>
							<div class="col-md-8">
								<textarea class="form-control" name="EnterArticle"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
							<button class="btn btn-primary" type="button" id="Detailsbutton" style="color:#fff;background-color: #004F91;border-radius: 5px;width:100%;">Get Article</button>
							</div>
						</div>
			        </form>

<h1> Generated Article</h1>	   
<div id="Showdetails" style="text-align: justify;text-justify: inter-word;padding: 10px">
 Article Result....
</div>

</div>