<?php
session_start();

if(!isset($_SESSION['unique_id'])){
    header("Location: ../login");
}

include_once "database.php";
$search=filter_input(INPUT_POST,"search-user",FILTER_SANITIZE_SPECIAL_CHARS);

$search = mysqli_escape_string($conn,$search);
$output="";
if(!empty($search)){
    $sql=mysqli_query($conn,"SELECT * FROM users where (username LIKE '%{$search}%' AND   unique_id<>{$_SESSION['unique_id']})");
    if(mysqli_num_rows($sql)>0){
        while( $row=mysqli_fetch_assoc($sql)){
$output.='<a class="acc" href="message?username='.$row['username'].'">
<img src="php/images/'.$row['img'].'" alt="">
<h5>'.$row['username'].'</h5>
</a>';
        }
    }
}
echo $output;
?>