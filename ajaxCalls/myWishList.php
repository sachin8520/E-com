<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if(isset($_SESSION["g_user_id"]))
        {
            $g_user_id=$_SESSION["g_user_id"]; 
        }
    else
        {
            $g_user_id=0; 
        }
}
include_once('../dbConnect.php');

if(!isset($_POST['action']))
{
    die("No permission");
}
else {
    $action=$_POST['action'];
    $product_id=$_POST['product_id'];
    $isWished=$_POST['isWished'];

        
    $sql=" SELECT  `del_flg` FROM `product_wishlist` 
    WHERE `fk_user_id`=$g_user_id
    AND `fk_product_id`=$product_id";
$query = $pdo->prepare($sql);
$query->execute();
$data_arr = $query->fetchAll(PDO::FETCH_ASSOC);


if(count($data_arr)==0){
    $sql="INSERT INTO `product_wishlist`(`fk_product_id`,`fk_user_id`)
        VALUES('$product_id','$g_user_id')";
        $query = $pdo->prepare($sql);
        if (!$query->execute()) {
            $status=-1;
            //die("Not Saved..." . $query->errorInfo());
        } else {   
            $insertId = $pdo->lastInsertId();  
            $status=1;                
            
        }
        $myData=['status'=>$status];
        echo json_encode($myData);
}
else if($data_arr[0]['del_flg']=='Y'){
           $sql=" UPDATE `product_wishlist`
                    SET `del_flg`='N'
                    WHERE `fk_product_id`=$product_id
                    AND `fk_user_id`=$g_user_id";
            $query = $pdo->prepare($sql);
            if (!$query->execute()) {
                $status=-1;
                //die("Not Saved..." . $query->errorInfo());
            } else {   
                $insertId = $pdo->lastInsertId();  
                $status=1;                
                
            }
            $myData=['status'=>$status];
            echo json_encode($myData);

}
else {
    $sql=" UPDATE `product_wishlist`
    SET `del_flg`='Y'
    WHERE `fk_product_id`=$product_id
    AND `fk_user_id`=$g_user_id";
    $query = $pdo->prepare($sql);
    if (!$query->execute()) {
        $status=-1;
        //die("Not Saved..." . $query->errorInfo());
    } else {   
        $insertId = $pdo->lastInsertId();  
        $status=0;                
        
    }
    $myData=['status'=>$status];
    echo json_encode($myData);
}

    
   

    
}

            
            




?>
