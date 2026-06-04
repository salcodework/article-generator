		<div class="row" style="background: #fff;">
		    <div class="col-md-12" style="background: #fff;">
			    <div class="breadcrumbs">
				    <ul class="breadcrumb" style="background: #fff;">
                        <li><a href="index.php">Home</a> <span class="divider"></span></li>
                        <li class="active">Home</li>
                    </ul>
					
				</div>
			</div><hr>
		</div>
<br>

 <style>
        /* Style for the blue button */
        .blue-button {
            display: inline-block;
            padding: 10px 20px;
			ma: 10px 20px;
            background-color: #004F91; /* Blue shade */
            font-size: 14px;
			color: #fff;
            border: none;
            border-radius: 5px;
			width:100%;
			height:40px;
			margin-top:10px;
        }

        /* Hover effect */
        .blue-button:hover {
            background-color: #002c70; /* Darker blue on hover */
        }
	 </style>	

		<div class="row">
		    <div class="col-md-3 left-menu">
				<div class="">
					<h2></h2>
					

<a href="index.php?page=6&M=1" class="blue-button">Article Generator</a>
<a href="index.php?page=6&M=2" class="blue-button">Article History</a>
<a href="index.php?page=6&M=4" class="blue-button">My Profile</a>
<a href="index.php?Logout=Logout" class="blue-button">Logout</a>




				</div>




 



			</div>
		
		<div class="col-md-9">
		
				<div class="row"> 
		    <div class="col-md-12">
			    <div class="breadcrumbs">
	
						<div class="row registerbox">
						<div class="form-group col-md-12">

<div class="col-md-12">
			<div class="row">
<?php
if(!isset($_GET["M"]) || $_GET["M"]==1 || $_GET["M"]==0)
{
 
 include("Articlegen.php");
}
elseif($_GET["M"]==2)
{
  include("Articlehistory.php");
}
elseif($_GET["M"]==3)
{

}
elseif($_GET["M"]==4)
{
include("Account.php");
}
?>



		</div>	</div>	
				
			   
					

					
				
				
			
						</div></div>



				</div>
				
				
				
			</div></div>
			
		












		

	

		


<hr>


<div class="clear1"></div>
 




	   </div>
	 </div>	