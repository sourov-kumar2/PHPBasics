<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-vKMx8UnXcw5JUQ XRd/wKrQzQtxT5DQxQUpM5gwi8vwS3GVWHBz2pqY1KTrhgPbovw/wAYGglAnqHQ29veyGXQg==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXcw5JUQ XRd/wKrQzQtxT5DQxQUpM5gwi8vwS3GVWHBz2pqY1KTrhgPbovw/wAYGglAnqHQ29veyGXQg==" crossorigin="anonymous" />
    
    <title>Login Page</title>
    <style>
        h2{
            text-align: center;
        }
        .form-controll{
            width: 50%;
            margin: 0 auto;
            padding: 20px;  
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        input[type="text"], input[type="password"]{
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"]{
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <?php   
    include 'db.php';
    session_start();
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['id'];
            header('Location: dashboard.php');
        } else {
            echo "<script>toastr.error('Login unsuccessful')</script>";
        }
    }
    ?>

    <div class="form-controll">
        <h2>Login Here</h2>
        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" name="login" value="Login">
        </form>
    </div>

    <script>
        $(document).ready(function(){
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
        });
    </script>
</body>
</html>
