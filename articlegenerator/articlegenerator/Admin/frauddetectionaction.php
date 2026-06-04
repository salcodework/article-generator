<?php
include('db.php');
?>
<div id="flash" class="flash"></div>


<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript">
// Update Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Updatesubmit_button").click(function() {
	
var addrssvalid="No";
for (let i = 0; i < allacc.length; i++) {
  
   
  if(allacc[i]==$("#EGS").val())
  {
	  
	  addrssvalid="Yes"
	  break;
  }
  else{
	  addrssvalid="No";
  }
  
}

if(addrssvalid=="Yes")
  {
			$("#settype").val('Ethereum');
			
				$("#form").ajaxForm({
						target: '#show'
					}).submit();
					

  }
  else
  {
	alert('Ethereum ADDRESS Verify Fail..!');
  }


return false;
});
});
</script>


<script type="text/javascript">
// Update selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Edit").click(function() {
var element = $(this);
var ide = element.attr("id");
var Aid = element.attr("alt");
var info = 'CID='+ Aid;
if(info=='')
{
alert("Select For Edit..");
}
else
{
document.getElementById("show").innerHTML="";

$.ajax({
type: "POST",
url: "http://127.0.0.1:5555/success",
data: info,
cache: true,
success: function(html){

//alert(html);

	var info1 = 'ide=' + ide+'&CID='+ Aid+'&CData='+ html;
	
	$.ajax({
	type: "POST",
	url: "frauddetectionaction.php",
	data: info1,
	cache: true,
	success: function(html){

	$("#show").append(html);

	}  
	});



}  
});
}
return false;
});
});
</script>


<?php
if(isset($_POST['ida']))
{
$id=$_POST['ida'];
$a=$conn->query("UPDATE customer SET BLOCKID = 'YES' WHERE LID=".$id."");
echo "Approved Successfully";
}
?>


<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$CID=$_POST['CID'];
$CData=$_POST['CData'];


$select_table = "select * from customer where CID=".$id;
$fetch = $conn->query($select_table);
while($row = $fetch->fetch_assoc())
{
?>
<div class="table-responsive">
<form action="frauddetectionaction.php" method="post" name="form" id="form" enctype="multipart/form-data">

<h4 class="margin-bottom-15"><?php echo $row['Title']; ?></h4>
<table class="table table-striped table-hover table-bordered">

<TR><TD><b>CID</b></TD><TD><?php echo $row['CID']; ?></TD></TR>
<TR><TD><b>Name</b></TD><TD><?php echo $row['Name']; ?></TD></TR>
<TR><TD><b>Email</b></TD><TD><?php echo $row['Email']; ?></TD></TR>
<TR><TD><b>Mobile</b></TD><TD><?php echo $row['Mob']; ?></TD></TR>
<TR><TD><b>Address</b></TD><TD><?php echo $row['Address']; ?></TD></TR>
<TR><TD><b>Account ID</b></TD><TD><?php echo $row['Accid']; ?></TD></TR>
<TR><TD><b>Ethereum ID</b></TD><TD>
<?php echo $row['EthereumAddr']; ?></TD></TR>

 

</table> 

<table class="table table-hover table-bordered">

<TR><TD><b>Account No.</b></TD><TD><b>Transaction Count</b></TD><TD><b>Transaction Amount</b></TD></TR>
<?php
$cats = explode("#", $CData);
foreach($cats as $cat) {

if (strpos($cat, $CID) !== false and strlen($cat)>=2) {
    //echo $cat."<br>";
?>

<?php
$Tcount="";
$TAmount="";

$select_table1 = "select count(*) as Tcount,sum(Amount) as TAmount from transaction,customer where (transaction.CUID=customer.CID or transaction.DUID=customer.CID ) and ('".$cat."' like CONCAT('%',Accid, '%') or '".$cat."' like CONCAT('%',Accid, '%'))";
$fetch1 = $conn->query($select_table1);
while($row1 = $fetch1->fetch_assoc())
	{
$Tcount=$row1['Tcount'];
$TAmount=$row1['TAmount'];
	}
?>
<TR <?php if($Tcount>=9){echo 'style="background: red;"';} ?>>
<TD><b><?php echo $cat; ?></b></TD>
<TD><?php echo $Tcount; ?></TD>
<TD><?php echo $TAmount; ?></TD>
</TR>
<?php
}
}

?>
</table> 

</form>
</div>
<?php
}
}
?>

<div class="table-responsive">
<h4 class="margin-bottom-15">Table</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b> ID</b></td>
<td><b> Name</b></td>
<td><b> Email</b></td>
<td><b> Mobile</b></td>
<td><b> Total Transaction Amount</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
$select_table = "Select * from customer,
(Select UID1,(TAmount1+TAmount2) as TAmount from
(SELECT CUID as UID1,sum(Amount) as TAmount1 FROM transaction where CUID<>0 group by CUID) as T1 join (SELECT DUID as UID2,sum(Amount) as TAmount2 FROM transaction where DUID<>0 group by DUID) as T2 ON T1.UID1 = T2.UID2) as Jointable where Jointable.UID1=customer.CID order by TAmount desc";

$fetch = $conn->query($select_table);
while($row = $fetch->fetch_assoc())
	{
?>
<TR>
<TD><?php echo $row['CID']; ?></TD>
<TD><?php echo $row['Name']; ?></TD>
<TD><?php echo $row['Email']; ?></TD>
<TD><?php echo $row['Mob']; ?></TD>
<TD><?php echo $row['TAmount']; ?></TD>

<TD>
<a href="#" class="Edit" id="<?php echo $row['CID']; ?>" alt="<?php echo $row['Accid']; ?>">[ View ]</a>
</TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
 			
</div>