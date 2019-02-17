
<?php
//Group member : Yujie Wen
//Group ID:
//date:2019-02-16
//Purpose: collect file upload, converting files, string procesisng, and database storage 
//directly responsible for index.php file (upload form)

if(isset($_FILES["file"])){
   // print_r($_FILES["file"]);
    $file = $_FILES["file"];
    //store file properties 
    $fileName = $file['name'];
    $fileTemp = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    //file .ext 
     $fileExt = explode('.',$fileName);
     $fileExt = strtolower(end($fileExt));
      $allowed = array('csv');

     //file validation: type, error, size, not empty
      if(in_array($fileExt,$allowed)){
        //   echo "file allowed";
          if($fileError === 0){
          if($fileSize <= 200000 || $fileSize >= 1){
              //$file_name_new = uniqid('', true).'.'.$fileExt;
              $fileDestination = 'files/'.$fileName;//$file_name_new;
              if(move_uploaded_file($fileTemp,$fileDestination)){
                  echo "<h1>file has been successfully uploaded to ".$fileDestination."</h1>"; 
                  //helper function converts .CSV file into .Text file
                  convert_csv("files/".$fileName);
                //   scv_storage_sql(); 
              }//file moved from temp 
              else{
                  echo"error: file upload failed";
                  backward();
              }
          }//file size
          else {
              echo"error: the file is oversized";
              backward();
          }
        }//file error
        else{
            echo "error: this file contains an error";
            backward();
        }
        
    }//file type
    else{
    echo"error: this type of file is not allowed ";
    backward();
    }
}
else{
    echo "Error: file not set";
    backward();
}




//converting csv file inito text file 
 function convert_csv($filename){
    $row = 1;
    if (($handle = fopen($filename, "r")) !== FALSE) {
        $db_conn = connect_db()
        $csv_str = "( ";
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            echo "<p> $num fields in line $row: <br /></p>\n";
            $row++;
            for ($c=0; $c < $num; $c++) {
                echo $data[$c] . "<br />\n";
                $content= $db_conn->real_escape_string($data[$c]);
                $csv_str .= "'".$content."',";
            }
            $csv_str .= ")"
            $qry = "insert into csvStorage (mcData1,mcData2,mcData3,mcData4,mcData5 ) values".$csv_str.";";
            $db_conn->query($qry);
        }
        fclose($handle);
        disconnect_db($db_conn)
    }
}

 //connect database 
 function connect_db(){
    $db_conn = new mysqli('localhost', 'root', '!Lamp1!', 'csvStorage');
    if ($db_conn->connect_errno) {
        printf ("Could not connect to database server\n Error: "
            .$db_conn->connect_errno ."\n Report: "
            .$db_conn->connect_error."\n");
        die;
    }
    return $db_conn;
}

 //db discounnect
 function disconnect_db($db_conn){
    $db_conn->close();
}
 //echo go back
 function backward(){
     echo "   
     <button onclick=\"goBack()\">Go Back</button>
     <script>
     function goBack() {
       window.history.back();
     }
     </script>
     ";
 }

?>