<?php
if(isset($_POST["submit"])) {
$target_dir = "uploads/";
$rand = substr(md5(microtime()), rand(0,26),26);
$target_file = $target_dir .$rand.'-'. basename($_FILES["fileToUpload"]["name"]);
$upload_filename = $rand.'-'. basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if (@$_FILES["fileToUpload"]["size"] > 9000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Disable format filtering
if($imageFileType != "xls" && $imageFileType != "XLS" && $imageFileType != "csv") {
    echo "Sorry, only Excel files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $con = mysqli_connect("localhost", "root", "q#mcnl254");
        if (!$con) {
            die(mysqli_error($con));
        }
        mysqli_select_db($con, "project");
        $sql = "INSERT INTO uploads (file_name) VALUES('$upload_filename')";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die(mysqli_error($con));
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}


?>
