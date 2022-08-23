<?php
    
    $mysqli= new mysqli('localhost','root','','fms_db') or die($mysqli->error);
    $table='images';
    $phpFileUploadErrors=array(
        0=>'There is no error, the file uploaded with success',
        1=>'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2=>'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3=>'The uploaded file was only partially uploaded',
        4=>'No file was uploaded',
        6=>'Missing a temporary folder',
        7=>'Failed to write file to disk.',
        8=>'A PHP extension stopped the file upload',
     );
    if (isset($_FILES['userfile'])) {
        $file_array=reArrayFiles($_FILES['userfile']);
        //pre_r($file_array);
        for ($i=0; $i<count($file_array); $i++) { 
            if ($file_array[$i]['error']) {
                
                echo'<script type = "text/javascript"> alert("Error Occured!!!"); window.location.href = "pictures.php";</script>';
            }else {
                $extensions=array('jpg','png','jpeg','gif');
                $file_ext=explode('.',$file_array[$i]['name']);
                $name=$file_array[$i]['name'];
                $file_ext=end($file_ext);
                //echo  $file_ext;
                if(!in_array($file_ext,$extensions)){
                    
                    echo'<script type = "text/javascript"> alert("Invalid File Extension!"); window.location.href = "pictures.php";</script>';
                }else{
                    $img_dir="uploadedimages/".$file_array[$i]['name'];
                    move_uploaded_file($file_array[$i]['tmp_name'],$img_dir);
                    $sql="INSERT IGNORE INTO $table(name,img_dir) VALUES('$name','$img_dir')";
                    $mysqli->query($sql)or die($mysqli->error);
                    //Put code here message about successfully uploading the image
                    echo'<script type = "text/javascript"> alert("Image/s Uploaded Successfully!"); window.location.href = "pictures.php";</script>';
                }
            }
        }
        
    }
    
    function reArrayFiles($file_post){
        $file_ary=array();
        $file_count=count($file_post['name']);
        $file_keys=array_keys($file_post);
        for ($i=0; $i <$file_count ; $i++) { 
            foreach ($file_keys as $key) {
                $file_ary[$i][$key]=$file_post[$key][$i];
            }
        }
        return $file_ary;
    }
    function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
       }
?>