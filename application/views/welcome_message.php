<?php include 'header.php'; ?>
<?php
foreach($db->result() as $row)
{echo $row->psk;}
foreach ($tables as $table)
{
   print $table;
} 
?>
<?php include 'footer.php'; ?>
