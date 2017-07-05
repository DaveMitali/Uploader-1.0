<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<?php 
set_time_limit(0);
if(isset($_POST['username'])&&isset($_POST['mysql'])&&isset($_POST['db'])&&isset($_POST['username']))
{
$sqlname=$_POST['mysql'];
$username=$_POST['username'];
$table='$table';
$db=$_POST['db']."_".$_POST['pname']."_".$_POST['plname'];
$csvfile=$_POST['csv'];
if(isset($_POST['password']))
{
$password=$_POST['password'];
}
else
{
$password= '';
}
// Create Database
$conn = new mysqli($sqlname, $username, $password);
$sql = "CREATE DATABASE $db";
if ($conn->query($sql) === TRUE) {
    echo nl2br("Database created successfully\n");
} else {
    echo "Error creating database: " . $conn->error;
}
//scan the file from the "uploads" folder
$sql = array();
    $handle = fopen("C:/xampp/htdocs/FileUploader/uploads/".$csvfile, "r");
    $header = fgetcsv($handle,1000,",");
    if($header){
        $header_sql = array();
        foreach($header as $h){
            $header_sql[] = '`'.$h.'` VARCHAR(255)';
        }
        $sql[] = 'CREATE TABLE $table ('.implode(',',$header_sql).')';
        while($data = fgetcsv($handle,1000,",")){   
            $sql[] = "INSERT INTO $table VALUES ('".implode("','",$data)."')";
        }
    }        

    mysqli_select_db($conn,$db);
    foreach($sql as $s){    
        mysqli_query($conn,$s);
    }

    
}

?>

</html>
</body>
</html>