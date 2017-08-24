<?php
function adopt_a_dog() {
    include './creds.php';
    try {
    	$query_servers_sql = "select * from puppies;";
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $stmt = $conn->prepare($query_servers_sql);
        $stmt->execute();
	// set the result
	$result = $stmt->fetchAll();
	print_r($result);
    }
    
    catch(Exception $e){
        echo "MySQL fail: " .$e->getMessage();
    }

}
adopt_a_dog();

?>
