<?php  
    require_once "./header.php";
?>
    <?php require_once "./sidebar.php" ?>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        $breadcomb = "Add New Products";
        require_once "./top-header.php"; 
        ?>
        <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addProduct'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    if ($image) {
        $imageTarget = "../assets/images/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $imageTarget);
    }

    $insertQuery = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')";
    if ($conn->query($insertQuery)) {
        echo "<script>toastr.success('Product added successfully!');</script>";
    } else {
        echo "<script>toastr.error('Error adding product!');</script>";
    }
}
?>
<style>
/* Add your custom styles here */
body {
    font-family: 'Poppins', sans-serif; /* Consistent font for the whole body */
}
/* Table and button customization */
.table-custom {
    background-color: #282828; /* Dark theme for table */
    color: #1b2a47ff;
}
.table-custom thead th {
    background-color: #e84144ff; /* Red header background */
    color: #fff; /* White text for headers */
}
.btn-custom-edit, .btn-custom-delete {
    font-weight: 500;
    color: #fff;
}
.btn-custom-edit {
    background-color: #f0ad4e;
    border-color: #eea236;
}
.btn-custom-delete {
    background-color: #d9534f;
    border-color: #d43f3a;
}
.all-content-wrapper {
    padding: 20px;
}
#addProductForm {
    background-color: #343a40;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    margin-top: 30px;
}
#addProductForm .card-header {
    background-color: #1c252e;
    border-bottom: 1px solid #4a69bd;
    color: white;
}
#addProductForm .card-body {
    padding: 20px;
}
.form-group label {
    color: #fff;
}
.form-control, .form-control-file {
    background-color: #495057;
    color: #fff;
    border: 1px solid #6c757d;
}
.btn-success {
    background-color: #28a745;
    border-color: #1e7e34;
}
.custom-file-label {
    background-color: #495057;
    color: #fff;
    padding: 10px;
    border: 1px solid #6c757d;
    border-radius: 5px;
    display: block;
    width: calc(100% - 22px);
    text-align: left;
    cursor: pointer;
}
.custom-file-input {
    visibility: hidden;
    width: 0;
}
#addProductForm {
    margin-left: -20px; /* Moves the form 20px to the left */
}

</style>




<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card" id="addProductForm">
                    <div class="card-body bg-light text-dark">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter product name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" name="price" id="price" placeholder="Enter product price" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="image">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image" onchange="previewFile()">
                                    <label class="custom-file-label" for="image">Choose file...</label>
                                    <img id="previewImg" src="" alt="Image preview" class="img-thumbnail mt-2" style="display: none; width: 100px; height: auto;">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" name="addProduct">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewFile() {
    var preview = document.getElementById('previewImg');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();
    var label = document.querySelector('.custom-file-label');

    reader.onloadend = function() {
        preview.src = reader.result;
        preview.style.display = 'block'; // Show the preview
    }

    if (file) {
        reader.readAsDataURL(file);
        label.textContent = file.name; // Set the label text to the file name
    } else {
        preview.src = "";
        preview.style.display = 'none'; // Hide the preview if no file is selected
        label.textContent = 'Choose file...';
    }
}
</script>
<!-- Include Toastr JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    </div>
    
    <?php require_once "./footer.php" ?>