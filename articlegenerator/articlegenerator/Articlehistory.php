
<div class="product" id="myproduct" style="height:350px;">
				    
<script type="text/javascript" src="jquery.min.js"></script>


<div id="Showdetails">

<div class="row">
<div class="col-md-12">
<div class="cart-info">

<table class="table">
<thead>
<tr>
<th>ID</th>
<th>Transaction Date</th>
<th>Article</th>
<th>Article Result</th>
</tr>
</thead>
<tbody>
<?php
$Uid=$_SESSION['userid'];
$result=$conn->query("select * From article where UID='$Uid'");
$Tamount=0;
while($row = $result->fetch_assoc())
{
?>	
<tr>
<td class="name"><?php echo $row['AID']; ?></td>
<td class="name"><?php echo $row['Adatetime']; ?></td>
<td class="name"><?php echo $row['ArticleTitle']; ?></td>
<td class="name"><?php echo $row['Article']; ?></td>
</tr>
<?php
}
?>
</tbody>
</table>
		
</div> 			
</div>					
</div>
		
</div>

</div>