<?php
/*
KVM-VDI
Tadas Ustinavičius
tadas at ring.lt
2016-03-15
Vilnius, Lithuania.
*/
include ('functions/config.php');
require_once('functions/functions.php');
$hypervisor=addslashes($_POST['hypervisor']);
$type=addslashes($_POST['type']);
$pass=$_POST['pass'];
if ($pass!=$backend_pass)
    exit;
if (empty($hypervisor)||empty($type))
    exit;
$reply_array=get_SQL_array("SELECT name FROM vms WHERE hypervisor='$hypervisor' AND machine_type='$type' ORDER BY name");
print_r($machines_array);
$x=0;
$machines_array=array();
while (!empty($reply_array[$x]['name'])){
    $machines_array[]=$reply_array[$x]['name'];
    ++$x;
}
echo json_encode($machines_array);
?>