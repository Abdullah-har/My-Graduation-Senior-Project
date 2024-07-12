<?php
    
    require("includes/mysqli_connect.php");
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if($conn->connect_error) die("Fatal Error");

    $query = "SELECT * FROM users";
    
    $result = $conn->query($query);

    if(!$result) die("Fatal Error");
    
    $author_names = Array();
     while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
     {
         $first_names[] = $row['first_name'];
         $last_names[] = $row['last_name'];

     }

     $result->close();
     $conn->close();


     $q = $_REQUEST['q']; 
     $field = $_REQUEST['field']; 

     

     function findMatch($names, $q)
     {
        $hint = ""; 

        if($q !== "")
        {
            $q = strtolower($q);
            $len=strlen($q);
            foreach($names as $name){
                if(stristr($q, substr($name, 0, $len))){
                    if($hint == ""){
                        $hint = $name;
                    }else{
                        $hint .= ", $name";
                    }
                }
            }
        }

        return $hint;
     }

     
     if($field == 'f')
     {
        $hint = findMatch($first_names, $q);
     }else{
         $hint = findMatch($last_names, $q);
     }
     

    

     echo $hint === "" ? "no suggestion" : $hint;

?>