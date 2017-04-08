<?php
	/*
	 * @author: Arpita Karkera
	 * @date: 4th April, 2017
	 * 
	 * Code for uploading event banner
	 *
	 */

     $target_dir = "../banners/";

     $query = "SELECT event_id FROM events WHERE event_name = '$event_name'";
     $result = mysqli_query($dbc, $query);
     $row = mysqli_fetch_array($result);
     $target_name = str_pad($row['event_id'], 4, '0', STR_PAD_LEFT);

     $target_ext = '.'.strtolower(end(explode('.',$_FILES['banner']['name'])));

     $target_file = $target_dir.$target_name.$target_ext;
     //echo $target_file.'bjf';
     //exit();

     $uploadOk = 1;
     //echo $_FILES["bannner"]["tmp_name"].'njn';
     //exit();
     
     $extensions= array(".jpeg",".jpg",".png");
     
     if(in_array($target_ext,$extensions)) {
         $uploadOk = 1;
     } else {
         $err_msg = "Only jpeg, jpg or png allowed";
         $uploadOk = 0;
     }

     if ($uploadOk == 1) {
         
         if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file)) {
             $id = $row['event_id'];
             $query = "UPDATE events SET banner = '$target_ext' WHERE event_id = '$id'";
             mysqli_query($dbc, $query);
         } else {
             $uploadOk = 0;
             $err_msg = "Sorry, there was an error uploading your file.";
         }
     }
?>