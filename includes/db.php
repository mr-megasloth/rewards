<?php 
//Put connection information into an array
$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = 'root';
$db['db_name'] = 'ingramfl_cms';

//loop through array and convert the key to uppercase(because need for constants)
foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

//Connect and assign the connection to a variable
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Test Connection 
if(!$connection) {
    echo '<h1>Database Connection Failed in db.php</h1>';
}

?>