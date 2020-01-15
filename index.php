<HTML>
<head>
<style type="text/css">
.td{
	width:15%;
	height: 17;
	align:center;
}

.input{
	width:100%;
	height: 15
}

.table{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12;
    float:left;
}



.auto-style7 {
	color: black;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12;
	background-color: #dfdfd1;

}

.auto-style1 {
	text-align: center;
	color: red;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 20;
	width: 29%;
	background-color: yellow;
}

</style>

</head>
<BODY">
<?php

$link=mysqli_connect("localhost","root","12487826") or die("無法建立資料連結: ".mysqli_connect_error());
mysqli_select_db($link, "dmpc")or die ("無法開啟急要型號資料庫:".mysqli_error($link));
$sql="SELECT `mcmodel`, `prod`, `descri`,count(`label`) as `count` FROM `mount_stage` group by `descri` order by `descri`";
$result=mysqli_query($link,$sql);




echo "<table border='1' align='left' width='35%' style='font-size: 12; font-family: Arial'><tr align='center' >";
echo "<tr font size='8' bgcolor=#d6eaf8><th width='5%'>Model</th><th width='10%'>Product</th><th width='35%'>Description</th><th width='10%'>Count</th></tr>";


while($result2 = mysqli_fetch_assoc($result)){
echo "<tr align='center' font size='8'>";
echo "<td>".$result2['mcmodel']."</td>";
echo "<td>".$result2['prod']."</td>";
echo "<td>".$result2['descri']."</td>";
echo "<td>".$result2['count']."</td>";

echo "</tr>";
}

echo "</table>";

?>

<?php

$link=mysqli_connect("localhost","root","12487826") or die("無法建立資料連結: ".mysqli_connect_error());
mysqli_select_db($link, "dmpc")or die ("無法開啟急要型號資料庫:".mysqli_error($link));
$sql="SELECT * FROM `mount_stage` order by `descri`";
$result=mysqli_query($link,$sql);




echo "<table border='1' align='left' width='50%' style='font-size: 12; font-family: Arial'><tr align='center' >";
echo "<tr font size='8' bgcolor=#d6eaf8><th width='5%'>Model</th><th width='10%'>Product</th><th width='35%'>Description</th><th width='13%'>Label</th><th width='13%'>Machine</th><th width='13%'>Logout time</th></tr>";


while($result2 = mysqli_fetch_assoc($result)){
echo "<tr align='center' font size='8'>";
echo "<td>".$result2['mcmodel']."</td>";
echo "<td>".$result2['prod']."</td>";
echo "<td>".$result2['descri']."</td>";
echo "<td>".$result2['label']."</td>";
echo "<td>".$result2['mc']."</td>";
echo "<td>".$result2['logout_dttm']."</td>";
echo "</tr>";
}

echo "</table>";


	  $id=gethostbyaddr($_SERVER['REMOTE_ADDR']);
	  $date=date("Y-m-d"); // format will be: YYYY-MM-DD
$ip=$_SERVER['REMOTE_ADDR'];

$link=mysqli_connect("localhost","root","12487826") or die("無法建立資料連結: ".mysqli_connect_error());
mysqli_select_db($link, "overlap")or die ("無法開啟急要型號資料庫:".mysqli_error($link));


$sql="select * from `mfgdesktopvisitor` where `date`='$date' and `id`='$id' and `source`='mountstage'";
$result=mysqli_query($link,$sql);
if($result->num_rows==0){
	$sql2="insert into `mfgdesktopvisitor`(`date`, `id`, `source`) values('$date', '$id', 'mountstage')";
	mysqli_query($link, $sql2);
}else{
		$sql3="update `mfgdesktopvisitor` set `page_view`=`page_view`+1 where `id`='$id' and `date`='$date' and `source`='mountstage'";
	mysqli_query($link, $sql3);
}

?>

</body>
</HTML>