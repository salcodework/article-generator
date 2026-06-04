
        
		<div class="row">
		    <div class="col-md-12">
			    <div class="breadcrumbs">
				    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a> <span class="divider"></span></li>
                        <li class="active">Register</li>
                    </ul>
				</div>
			</div>
			
		</div>
		
		<div class="row">
		    <div class="col-md-12">
				<h2>Register</h2>
			</div>
		</div>
		
		<div class="row">
		    <div class="col-md-6">
			        
				
			</div>
			
			<div class="col-md-6">
<script type="text/javascript" src="data/jquery.min.js"></script>
<script type="text/javascript" src="data/jquery.form.js"></script>

<script type="text/javascript">
$(function() {

$("#regbutton").click(function() {
 
				$("#regformsubmit").ajaxForm({
							success: function(regresult){
								
							document.getElementById("regresult").innerHTML=regresult;
							//target: '#show'
							}
							}).submit();
							
});






});
</script>



						 <form action="Regpage.php" method="post" class="loginbox form-horizontal" id="regformsubmit" enctype="multipart/form-data">
							
 
							
							<h1>Register</h1>
							<hr>
							<div id="regresult"></div>
				            <div class="form-group">
					            <label class="control-label col-md-4" for="inputEmail">Name<span class="required">*</span></label>
					            <div class="col-md-8">
					                <input class="form-control" type="text" name="FullNam">
					            </div>
				            </div>
                      
 
							
				            <div class="form-group">
					            <label class="control-label col-md-4" for="inputEmail" >Email<span class="required">*</span></label>
					            <div class="col-md-8">
					                <input id="inputEmail" class="form-control" type="text" name="Emailid">
					            </div>
				            </div>

				            <div class="form-group">
					            <label class="control-label col-md-4" for="inputEmail" >Mobile No</label>
					            <div class="col-md-8">
					                <input id="inputEmail" class="form-control" type="text" name="MobNo">
					            </div>
				            </div>

						
				            

							<div class="form-group">
					            <label class="control-label col-md-4" for="inputPassword">Password<span class="required">*</span></label>
					            <div class="col-md-8">
					                <input class="form-control" type="password" name="Pass">
					            </div>
				            </div>
							<div class="form-group">
								<label class="control-label col-md-4" for="inputPassword">Re-enter password<span class="required">*</span></label>
								<div class="col-md-8">
									<input id="inputPassword" class="form-control" type="password" name="Cpass">
								</div>
							</div>

							 

				            <div class="form-group">
							<div class="col-md-4"><label class="control-label col-md-4" for="inputPassword"></label></div>
					            <div class="col-md-8">
					                <button class="form-control" type="button" id="regbutton" style="color:#fff;background-color: #004F91;">Register</button>
					            </div>
				            </div>
						</form>					
			           
			</div>
		</div>
		
	