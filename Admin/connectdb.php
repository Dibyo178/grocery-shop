<?php 

 try{
     
     //php database object

$pdo= new PDO('mysql:host=localhost;dbname=bazar7','root','');

//echo "Connection Succesfull";
     
 }
catch(PDOException $f){
    
    echo $f->getmessage();
    
}
 


?>
