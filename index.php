<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: white;
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            color: #333;
            font-weight: 600;
        }

        .form-control {
            border-radius: 25px;
            border: 1px solid #ddd;
            padding: 15px;
            font-size: 16px;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #405cf5;
            box-shadow: 0 0 10px rgba(64, 92, 245, 0.5);
        }

        .button-9 {
            appearance: button;
            background-color: #405cf5;
            border-radius: 30px;
            border: none;
            color: #fff;
            font-size: 18px;
            padding: 12px 30px;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
        }

        .button-9:hover {
            background-color: #0036b3;
            box-shadow: 0 0 15px rgba(64, 92, 245, 0.7);
        }

        .button-9:focus {
            outline: none;
            box-shadow: 0 0 15px rgba(64, 92, 245, 0.5);
        }

        .form-group {
            margin-bottom: 20px;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h3 class="text-center mb-4">Sign Up</h3>
            <form action="" method="post">
                <div class="form-group py-3">
                    <label for="one" class="form-label">Username:</label>
                    <input type="text" class="form-control" placeholder="Enter your name" name="user" id="one" required>
                </div>
                <div class="form-group py-3">
                    <label for="two" class="form-label">Email:</label>
                    <input type="email" class="form-control" placeholder="Enter your email" name="email" id="two" required>
                </div>
                <div class="form-group py-3">
                    <label for="three" class="form-label">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter your password" name="password" id="three" required>
                </div>
                <div class="form-group py-3 d-flex justify-content-center">
                    <button type="submit" class="button-9">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$host = "";  
$username = "admin"; 
$password = "password"; 
$dbname = "kdas"; 

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['user']) && isset($_POST['email']) && isset($_POST['password'])) {
        $name = $_POST['user'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();
        
        echo "User successfully registered!";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>