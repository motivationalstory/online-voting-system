<?php
$status=unlink('myfile.txt');    
if($status){  
echo "File deleted successfully";    
}else{  
echo "Sorry!";    
}  
?>