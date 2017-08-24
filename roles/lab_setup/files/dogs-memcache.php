<?php
function adopt_a_dog() {
    include './creds.php';
    $memcache = new Memcache;
    $memcache->addServer('localhost', 11211);
    try {
    	$adopt_dog_sql = $memcache->get("adopt_dog_sql");

        if($adopt_dog_sql === false){
  	  $query_servers_sql = "select breed from puppies where name='fido'";
     	  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          $stmt = $conn->prepare($query_servers_sql);
          $stmt->execute();
	  $result = $stmt->fetchColumn();
	  print_r($result);
          $memcache->set("adopt_dog_sql","$result", 0, 600);
	  }
 	else {

        print_r($adopt_dog_sql);


	}
    }
    
    catch(Exception $e){
        echo "MySQL fail: " .$e->getMessage();
    }

}
adopt_a_dog();

?>
