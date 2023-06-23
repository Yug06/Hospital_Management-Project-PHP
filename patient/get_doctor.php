<?php
include('assets/inc/config.php');
$output='';
$sql="select * from tbl_doctor where departmentid='".$_POST['departmentID']."'";
$result = mysqli_query($con,$sql);
$output .='<option value="" disabled selected>-Select Doctor-</option>';
while($row=mysqli_fetch_array($result)){
$output .='<option value="'.$row["doctorid"].'">'.$row["name"].' '.$row["lname"].'</option>';

}
echo $output;
?>