<html>
<body>
<?php
$Conn = odbc_connect
("smsdwsi3.world","rptfw","rptfw",SQL_CUR_USE_ODBC );

$result=odbc_exec($Conn,"SELECT * FROM lot where lpt=5200 and last_act_dttm>sysdate-0.2;");

while(odbc_fetch_row($result)){
         for($i=1;$i<=odbc_num_fields($result);$i++){
        echo "Result is ".odbc_result($result,$i);
    }
}
?>
</body>
</html>
