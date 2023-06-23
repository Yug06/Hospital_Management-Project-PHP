<?php
include('assets/inc/config.php');
$output='';
$sql="select * from tbl_bed where roomid='".$_POST['roomID']."' and status=0";
$result = mysqli_query($con,$sql);
$output .='<option value="" disabled selected>-Select Bed-</option>';
while($row=mysqli_fetch_array($result)){
$output .='<option value="'.$row["bedid"].'">'.$row["bednumber"].'</option>';

}
echo $output;
?>