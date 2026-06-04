
        
		<div class="row">
		    <div class="col-md-12">
			    <div class="breadcrumbs">
				    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a> <span class="divider"></span></li>
                        <li class="active">Login</li>
                    </ul>
				</div>
			</div>
			
		</div>
		
		<div class="row">
		    <div class="col-md-12">
				<h2>Login</h2>
			</div>
		</div>
		
		<div class="row">
										<div class="col-md-6">	 		
			           
			</div>
		    <div class="col-md-6">
			        
					<form class="loginbox form-horizontal" id="logform">
						<h1>Login</h1>
						<hr>
						<div id="logresult"></div>
						<div class="form-group">
							<label class="control-label col-md-4" for="inputEmail">Email<span class="required">*</span></label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="UserEmail">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" for="inputPassword">Password<span class="required">*</span></label>
							<div class="col-md-8">
								<input class="form-control" type="password" name="UserPass">
							</div>
						</div>
						<div class="form-group">
						<div class="col-md-4"><label class="control-label col-md-4" for="inputPassword"></label></div>
							<div class="col-md-8">
								<button class="btn btn-primary" type="button" id="Logbutton" style="color:#fff;background-color: #004F91;">Login</button>
							</div>
						</div>
			        </form>

			</div>
			

				 <script type="text/javascript" src="data/jquery.min.js"></script>
<script type="text/javascript">
$(function() {


$("#Logbutton").click(function() {
var info=$('#logform').serialize();
$.ajax({
type: "POST",
url: "Logpage.php",
data: info,
cache: true,
success: function(html){
$("#logresult").html(html);
}  
});
});


});
</script>




		</div>
		
	