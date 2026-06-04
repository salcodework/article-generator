<?php
include('db.php');
?>
<div id="flash" class="flash"></div>

<script type="text/javascript">
var aaa="100";

var allacc = []; 
var web3 = new Web3('http://127.0.0.1:7545');
web3.eth.getAccounts().then(e => console.log(e));
var address = web3.eth.accounts[0];
//alert(address);

var firstAccount;
web3.eth.getAccounts().then(e => { 
	allacc=e;
 firstAccount = e[0];
 
 console.log("A: " + firstAccount);
}); 


</script>

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
// Update Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Creditsubmit_button").click(function() {

$("#settype").val('Credit');

var dataString = $('#form').serialize()+'&type=Credit&page='+ $("#pagva").val();
				$("#form").ajaxForm({
						target: '#show'
					}).submit();
					



return false;
});
});
</script>

<script type="text/javascript">
// Paging Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".pages").click(function() {
var element = $(this);
var del_id = element.attr("id");
var info = 'page=' + del_id;

if(info=='')
{
alert("Select For delete..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Customeraction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
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
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'ide=' + del_id+'&page='+ textcontent2;
if(info=='')
{
alert("Select For Edit..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Customeraction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>

<script type="text/javascript">
// Delete selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".ABCD").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'id=' + del_id+'&page='+ textcontent2;
if(info=='')
{
alert("Select For delete..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Customeraction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>



<?php
if(isset($_POST['id']))
{
$id=$_POST['id'];
$delete = "DELETE FROM customer WHERE CID='$id'";
$a=$conn->query($delete);
}
?>

<?php
if(isset($_POST['ida']))
{
$id=$_POST['ida'];
$a=$conn->query("UPDATE customer SET BLOCKID = 'YES' WHERE LID=".$id."");
echo "Approved Successfully";
}
?>

<?php
if(isset($_POST['type']) and $_POST['type']=='Ethereum')
{
$ucontent=$conn->real_escape_string($_POST['ucontent']);
$ucontent1=$conn->real_escape_string($_POST['ucontent1']);

$a=$conn->query("update customer set EthereumAddr='$ucontent1' where CID=$ucontent");

echo "<font style='color:#0000FF;'>Ethereum Addr. Set Successfully</font><br><br><br>";
}
?>

<?php
if(isset($_POST['type']) and $_POST['type']=='Credit')
{
$ucontent=$conn->real_escape_string($_POST['ucontent']);
$ucontent2=$conn->real_escape_string($_POST['ucontent2']);


$a=$conn->query("INSERT INTO transaction(CUID,DUID,Tdt,Amount,thash,bhash,bnum) VALUES ('$ucontent','0',now(),'$ucontent2','','','')");

//$a=$conn->query("update customer set EthereumAddr='$ucontent1' where CID=$ucontent");

echo "<font style='color:#0000FF;'>Amount Credited Successfully</font><br><br><br>";
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "select * from customer where CID=".$id;
$fetch = $conn->query($select_table);
while($row = $fetch->fetch_assoc())
{
?>
<div class="table-responsive">
<form action="Customeraction.php" method="post" name="form" id="form" enctype="multipart/form-data">

<h4 class="margin-bottom-15"><?php echo $row['Title']; ?></h4>
<table class="table table-striped table-hover table-bordered">

<TR><TD><b>CID</b></TD><TD><?php echo $row['CID']; ?></TD></TR>
<TR><TD><b>Name</b></TD><TD><?php echo $row['Name']; ?></TD></TR>
<TR><TD><b>Email</b></TD><TD><?php echo $row['Email']; ?></TD></TR>
<TR><TD><b>Mobile</b></TD><TD><?php echo $row['Mob']; ?></TD></TR>
<TR><TD><b>Address</b></TD><TD><?php echo $row['Address']; ?></TD></TR>
<TR><TD><b>Account ID</b></TD><TD><?php echo $row['Accid']; ?></TD></TR>
<TR><TD><b>Ethereum ID</b></TD><TD>
<input Type="text" name="ucontent1" id="EGS" class="form-control" value="<?php echo $row['EthereumAddr']; ?>">
<input type="hidden" name="ucontent" value="<?php echo $row['CID']; ?>">
<input type="hidden" name="type" value="" id="settype">

</TD></TR>

<TR><TD></TD><TD>
<input type="button" value="Set" name="submit" class="Updatesubmit_button" style="width:74px;height:35px;border:1px #C0C0C0 solid;background-color:#000000;color:#FFFFFF;font-family:Arial;font-weight:bold;font-size:13px;">
</TD></TR>

<TR><TD><b>Credit Amount</b></TD><TD>
<input Type="text" name="ucontent2" class="form-control" value="0">
</TD></TR>

<TR><TD></TD><TD>
<input type="button" value="Credit" name="submit" class="Creditsubmit_button" style="width:74px;height:35px;border:1px #C0C0C0 solid;background-color:#000000;color:#FFFFFF;font-family:Arial;font-weight:bold;font-size:13px;">
</TD></TR>

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
<td><b> Ethereum ID</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
$per_page = 10; 
$select_table = "select * from customer";
$fetch = $conn->query($select_table);
$count =  $fetch->num_rows;
$pages = ceil($count/$per_page);

$page=1;
if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by CID limit $start,$per_page";
$fetch = $conn->query($select_table);
}
while($row = $fetch->fetch_assoc())
	{
?>
<TR>
<TD><?php echo $row['CID']; ?></TD>
<TD><?php echo $row['Name']; ?></TD>
<TD><?php echo $row['Email']; ?></TD>
<TD><?php echo $row['Mob']; ?></TD>
<TD><?php echo $row['EthereumAddr']; ?></TD>

<TD>
<a href="#" class="ABCD" id="<?php echo $row['CID']; ?>">[ Delete ]</a>
<a href="#" class="Edit" id="<?php echo $row['CID']; ?>">[ View ]</a>
</TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
              <ul class="pagination pull-right">
				<?php
				echo "<li><a href='#'class='pages' id='1'>|<</a></li>";
				for($i=1; $i<=$pages; $i++)
				{
					echo "<li><a href='#' class='pages' id=".$i.">".$i."</a></li>";
				}
				echo "<li><a href='#' class='pages' id=".--$i.">>|</a></li>";
				echo "<input type='hidden' id='pagva' class='pagva' name='pagva' style='width:30px;' value='".$page."'>";
				?>
</ul> 				
</div>