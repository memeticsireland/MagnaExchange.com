<?php require_once('../connect.php'); $client=$_SESSION['u2'];
$query="SELECT * FROM admin WHERE username='$client' LIMIT 1";
$result=$conn->query($query);
if($result->num_rows>0) {
while ($row=$result->fetch_assoc()) {
$rs=$_GET['ui'];
$query="UPDATE  users SET status='S'  WHERE id='$rs' ";
$result=$conn->query($query);
if($result==TRUE) {
    $ip= $_SERVER["REMOTE_ADDR"];
$date=date('d M, Y  h:i:s a');
$sql="INSERT INTO logs(username,name,date,misc) VALUES('$client','Your Transact was Declined by admin','$ip','$date')";
if($conn->query($sql)==TRUE){
	} 
 header('location:index.php?profile'); 
echo 'Account Successfully Blocked';
}}} else{  echo 'This link has expired'; }
?>