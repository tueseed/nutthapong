<html>
<head>
<title>สถิติการใช้งาน Pea Smart Query(ระเบียบก่อสร้างปี 59)</title>
</head>
<body>
<?php
$file = "cndis.csv"; 
echo "<a href='https://equip-location.herokuapp.com/cndis.csv'>donload</a> ";
$Ti = date("H:i:s",mktime(date("H")+7, date("i")+0, date("s")+0));
$Da = date("d.m.y");
echo " สถิติการใช้งาน Pea Smart Query(ระเบียบก่อสร้างปี 59) สถานะ:"." วันที่  ".$Da."  เวลา  ".$Ti;
?>
<?php
$objCSV = fopen("cndis.csv", "r");
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">วันที่ </div></th>
    <th width="98"> <div align="center">เวลา </div></th>
    <th width="198"> <div align="center">คำที่ใช้ค้นหา </div></th>
     <th width="198"> <div align="center">ผลการค้นหา </div></th>
       <th width="97"> <div align="center">Displayname </div></th>
    
  </tr>
<?php
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
?>
  <tr>
    <td><div align="center"><?php echo $objArr[0];?></div></td>
    <td><?php echo $objArr[1];?></td>
     <td><?php echo iconv("tis-620","utf-8",$objArr[2]);?></td>
    <td><div align="center"><?php echo $objArr[3];?></div></td>
    <td><div align="center"><?php echo $objArr[5];?></div></td>
   
   
  </tr>
<?php
}
fclose($objCSV);
?>
</table>
</body>
</html>
