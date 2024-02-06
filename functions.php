<?php
// require('update-user.php'); 
 // !--------------Function to Check Gender & maile Status--
    function checkGender(){
        if(isset($gender)){
            if($gender == 'male'){
                echo "checked";
            }else{
                echo "checked" ;
            }
        }
    }
?>
