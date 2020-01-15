<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php

$link=mysqli_connect("localhost","root","12487826") or die("無法建立資料連結: ".mysqli_connect_error());
mysqli_select_db($link, "dmpc")or die ("無法開啟資料庫:".mysqli_error($link));


$query = "DELETE FROM `stagerecords` WHERE 1; 
          LOAD DATA INFILE 'c:/wamp64/bin/mysql/mysql5.7.26/Uploads/stage.csv' INTO TABLE `dmpc`.`stagerecords` FIELDS TERMINATED BY ',';
          UPDATE `mount_stage` set `mc`='';
		  UPDATE `mount_stage` set `logout_dttm`='';
		  UPDATE `mount_stage` `t1` INNER JOIN `stagerecords` `t2` ON (`t1`.`label` = `t2`.`label`) and (`t2`.`count1`=2) SET `t1`.`mc` = 'Under maintain';
          UPDATE `mount_stage` `t1` INNER JOIN `stagerecords` `t2` ON (`t1`.`label` = `t2`.`label`) and (`t2`.`count1`=1) SET `t1`.`mc` = `t2`.`mc`, `t1`.`logout_dttm`=`t2`.`logout_dttm`
		  ";

if (mysqli_multi_query($link, $query)) {
do {
    if ($result = mysqli_store_result($link)) {
        while ($row = mysqli_fetch_array($result)) 


mysqli_free_result($result);
}   

} while (mysqli_next_result($link));
}




mysqli_close($link);
header('Location: index.php');
exit();




?>

</body>

</html>
