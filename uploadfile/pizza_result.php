<html>
<body>
  <?php
  echo "<h1>Get image</h1>";
  $name = $_FILES["pizzaImage"]["name"];
  echo $_FILES["pizzaImage"]["name"];
  $type = $_FILES["pizzaImage"]["type"];
  $tmp_name = $_FILES["pizzaImage"]["tmp_name"];
  echo $_FILES["pizzaImage"]["tmp_name"];
  $size = $_FILES["pizzaImage"]["size"];
foreach($_FILES as $fileKey => $fileArray) {
  if ($fileArray["error"] != UPLOAD_ERR_OK) { // date_get_last_errorsecho
    echo "Error: " . $fileKey . "has error" . $fileArray["error"] . "<br />";
  } else { // no error
    echo $fileKey . "Uploaded successfully";

    // move the file to the folder
    $fileToMove = $_FILES["pizzaImage"]['tmp_name'];
    $destination = "./upload/" . $_FILES["pizzaImage"]["name"];
    if (move_uploaded_file($fileToMove, $destination)) {
      echo "The file upload successfully";
    }
    else {
      echo "there was a problem moving the file";
    }

    $result = file_get_contents("127.0.0.1:5000/?imageFile=" . $_FILES["pizzaImage"]["name"]);
    echo $result;

  }
}

?>
</body>
</html>
