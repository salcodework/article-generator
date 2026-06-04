<?php
include('db.php');
?>
<div id="flash" class="flash"></div>

<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/jquery.form.js"></script>



<div class="table-responsive">
<h4 class="margin-bottom-15">Table</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<th>Transaction ID</th>
<th>Transaction Date</th>
<th>Account</th>
<th>Credit</th>
<th>Debit</th>
<th>Amount</th>
</tr></thead>
<tbody>
<?PHP
$Uid="0";
if(isset($_POST['sertex']))
{
$result=$conn->query("select * From customer where Accid='".$_POST['sertex']."'");
while($row = $result->fetch_assoc())
{
	$Uid=$row['CID'];
}

}
$result=$conn->query("select * From transaction where CUID='$Uid' or DUID='$Uid'");
$Tamount=0;
while($row = $result->fetch_assoc())
{
?>
<tr>
<td class="name"><?php echo $row['TID']; ?></td>
<td class="name"><?php echo $row['Tdt']; ?></td>
<?php
if($row['CUID']==$Uid)
{
$Tamount=$Tamount+$row['Amount'];
?>	

<td class="name">
<?php 
if($row['DUID']==0)
{
echo "Pay by Cash"; 
}
else{
echo $row['DUID']; 
}
?>
</td>
<td class="name"><?php echo $row['Amount']; ?>/-</td>
<td class="name"></td>
<td class="name"><?php echo $Tamount; ?>/-</td>
<?php
}
?>

<?php
if($row['DUID']==$Uid)
{
$Tamount=$Tamount-$row['Amount'];
?>	
<td class="name"><?php echo $row['CUID']; ?></td>
<td class="name"></td>
<td class="name"><?php echo $row['Amount']; ?>/-</td>
<td class="name"><?php echo $Tamount; ?>/-</td>
<?php
}
?>

</tr>
<?php
}
?>
</tbody></TABLE> 
              
			  
</div>