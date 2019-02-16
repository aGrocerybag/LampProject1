<?php
if(isset($_FILES["file"])){
    print_r($_FILES["file"]);
    $file = $_FILES["file"];
    //store file properties 
    $fileName = $file['name'];
    $fileTemp = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    //file .ext 
     $fileExt = explode('.',$fileName);
     $fileExt = strtolower(end($fileExt));
      $allowed = array('txt','jpg');

     //file validation 
      if(in_array($fileExt,$allowed)){
          echo "file allowed";
          if($fileError === 0){
          if($fileSize <= 200000){
              //$file_name_new = uniqid('', true).'.'.$fileExt;
              $fileDestination = 'files/'.$fileName;//$file_name_new;
              if(move_uploaded_file($fileTemp,$fileDestination)){
                  echo "file has been successfully uploaded to ".$fileDestination; 
              }//file moved from temp 
              else{
                  echo"file Upload failed we are so freaking sorry!";
              }
          }//file size
          else {
              echo"yo bro your file is too darn big";
          }
        }//file error
        else{
            echo "do you know daway ?";
        }
        
    }//file type
    else{
    echo"you have commited crime against skyrim and her people, what says you in your defence ?";
    }
}

?>