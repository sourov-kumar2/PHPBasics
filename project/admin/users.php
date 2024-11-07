<?php  
    require_once "./header.php"; 
    require_once "./sidebar.php"; 
    session_start();
?>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    .table-custom {
        background-color: #282828;
        color: #1b2a47ff;
    }
    .table-custom thead th {
        background-color: #e84144ff;
        color: #fff;
    }
    .btn-custom-edit, .btn-custom-delete {
        font-weight: 500;
    }
    .btn-custom-edit {
        color: #fff;
        background-color: #f0ad4e;
        border-color: #eea236;
    }
    .btn-custom-delete {
        color: #fff;
        background-color: #d9534f;
        border-color: #d43f3a;
    }
    tbody {
        color: #1b2a47ff;
    }
    .all-content-wrapper {
        padding: 20px;
    }
    #editForm {
        background-color: #343a40;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        margin-top: 30px;
    }
    #editForm .card-header {
        background-color: #1c252e;
        border-bottom: 1px solid #4a69bd;
        color: white;
    }
    #editForm .card-body {
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
    .table-custom th, .table-custom td {
        padding: 12px 15px;
    }
    .custom-file-input {
        visibility: hidden;
        width: 0;
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
</style>

<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- <div class="logo-pro">
                    <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                </div> -->
            </div>
        </div>
    </div>
    
    <?php 
    $breadcomb = "Users";
    require_once "./top-header.php"; 
    ?>
    
    <?php
               // Debugging output
               echo '<pre>';
               print_r($_SESSION['user']);
               echo '</pre>';
    $name = $role = $image = '';
    $editId = null;
    $editUser = null;

    // Handle Edit
    if (isset($_GET['edit'])) {
        $editId = intval($_GET['edit']);
        $editQuery = "SELECT * FROM users WHERE id = $editId";
        $result = $conn->query($editQuery);
        $editUser = $result->fetch_assoc();
        
        if ($editUser) {
            $name = $editUser['name'];
            $role = $editUser['role'];
            $image = $editUser['image'];
        }
    }

    // Handle Update
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['updateUser'])) {
            $id = intval($_POST['id']);
            $name = $conn->real_escape_string($_POST['name']);
            $role = $conn->real_escape_string($_POST['role']);

            // Handle image upload
            if ($_FILES['image']['name']) {
                $image = $_FILES['image']['name'];
                $imageTarget = "../assets/images/" . basename($image);
                move_uploaded_file($_FILES['image']['tmp_name'], $imageTarget);
            } else {
                $image = isset($editUser['image']) ? $editUser['image'] : '';
            }

            // Update query
            $updateQuery = "UPDATE users SET name='$name', role='$role', image='$image' WHERE id=$id";
            if ($conn->query($updateQuery)) {
                echo "<script>toastr.success('User updated successfully!');</script>";
            } else {
                echo "<script>toastr.error('Error updating user!');</script>";
            }
        } elseif (isset($_POST['deleteUser'])) {
            $deleteId = intval($_POST['id']);
            $deleteQuery = "DELETE FROM users WHERE id = $deleteId";
            if ($conn->query($deleteQuery)) {
                echo "<script>toastr.success('User deleted successfully!');</script>";
            } else {
                echo "<script>toastr.error('Error deleting user!');</script>";
            }
        }
    }

    // Fetch all users
    $selectQuery = "SELECT * FROM users";
    $users = $conn->query($selectQuery);
    ?>

    <div class="card mb-5" id="editForm" style="display: <?= isset($_GET['edit']) ? 'block' : 'none' ?>;">
        <div class="card-header bg-info text-white">
            <h2 class="mb-0">Edit User</h2>
        </div>
        <div class="card-body bg-light text-dark mb-3">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= htmlspecialchars($editId) ?>">
                <div class="form-group mb-3">
                    <label for="name" class="text-dark">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter user Name" value="<?= htmlspecialchars($name) ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="role" class="text-dark">Role</label>
                    <div>
                        <input type="radio" class="form-check-input" name="role" id="user" value="user" <?= ($role == 'user') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="user">user</label>
                    </div>
                    <div>
                        <input type="radio" class="form-check-input" name="role" id="admin" value="admin" <?= ($role == 'admin') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="admin">admin</label>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="image" class="text-dark">Image</label>
                    <input type="file" class="custom-file-input" id="image" name="image" onchange="previewFile()">
                    <label class="custom-file-label" for="image">Choose file...</label>
                    <img id="previewImg" src="uploads/<?= !empty($image) ? htmlspecialchars($image) : "profile_picture.png" ?>" alt="user Image" class="img-thumbnail mt-2" style="width: 100px; height: 100px;">
                </div>
                <button type="submit" class="btn btn-success" name="updateUser">Update User</button>
            </form>
        </div>
    </div>

    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-custom">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #1b2a47ff; color:#fff">
                        <?php
                        $sl = 1;
                        while ($user = $users->fetch_object()) { ?>
                            <tr>
                                <td><?= $sl++ ?></td>
                                <td>
                                    <img src="uploads/<?= !empty($user->image) ? htmlspecialchars($user->image) : "profile_picture.png" ?>" alt="user Image" class="img-thumbnail" style="width: 50px; height: 50px;">
                                </td>
                                <td><?= htmlspecialchars($user->name) ?></td>
                                <td><?= htmlspecialchars($user->role) ?></td>
                                <td>
                                    <a href="?edit=<?= $user->id ?>" class="btn btn-custom-edit btn-sm">Edit</a>
                                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $user->id ?>">
                                        <button type="submit" class="btn btn-custom-delete btn-sm" name="deleteUser" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once "./footer.php"; ?>
