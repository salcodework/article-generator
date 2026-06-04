 <div class="product" id="myproduct"  >
<h1>My Profile</h1>
<hr>		    
<script type="text/javascript" src="jquery.min.js"></script>



<div>

<div class="row">
<div class="col-md-12">
<div  >
<?php
$Uid=$_SESSION['userid'];
$result = $conn->query("select * From customer where CID='$Uid'");
while($row = $result->fetch_assoc())
{
?>
<table class="table" style="font-size: 14px;">
<thead>
<tr>
<th>Name - </th>
<th><?php echo $row['Name']; ?></th>
</tr>
<tr>
<th>Email - </th>
<th><?php echo $row['Email']; ?></th>
</tr>
<tr>
<th>Mobile - </th>
<th><?php echo $row['Mob']; ?></th>
</tr>
</thead>
</table>

<?php
}
?>
</div> 			
</div>					
</div>
		
</div>

</div>