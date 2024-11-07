<?php 

if(isset($_POST['uploadBtn'])){
    $fileName = $_FILES['img']['name'];
    $tempname = $_FILES['img']['tmp_name'];
    $fileSize = $_FILES['img']['size'];
    $allowedExtensions = ['jpeg', 'png', 'jpg', 'gif'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Added strtolower for case-insensitivity
    
    // Validation
    if(empty($fileName)){
        $errMsg = "Please select an image";
    } elseif (!in_array($fileExtension, $allowedExtensions)) {
        $errMsg = "Please select a valid image file";
    } else {
        $imageSize = getimagesize($tempname);
        if ($imageSize[0] < 400 || $imageSize[1] < 400) {
            $errMsg = "Minimum 400x400 pixels required";
        } elseif ($fileSize > 5000000) {
            $errMsg = "Maximum 5MB allowed";
        } else {
            $alphabets = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            $randomAlpha = substr(str_shuffle($alphabets), 0, 6);
            $newFileName = $randomAlpha . uniqid() . "." . $fileExtension;
            if (!is_dir("uploads")) {
                mkdir("uploads");
            }
            $destination = "uploads/" . $newFileName; // Corrected this line
            $move = move_uploaded_file($tempname, $destination);
            if (!$move) {
                $errMsg = "Failed to upload";
            } else {
                $successMsg = "Image uploaded successfully";
            }
        }
    }
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="img" id="">
    <button type="submit" name="uploadBtn">Upload</button>
    <div style="color: red">
        <?= $errMsg ?? null ?>  <!-- Display correct error message -->
    </div>
    <div style="color: green">
        <?= $successMsg ?? null ?> <!-- Display correct success message -->
    </div>
</form>
