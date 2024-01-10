<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F1E789;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 300px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #showPasswordContainer {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        #showPasswordLabel {
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <h1>Admin Login</h1>
    <form id="loginForm" action="admin_authenticate.php" method="POST" >
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <span class="show-password" onclick="togglePasswordVisibility()">Show</span>


        
        <input type="submit" value="Login">
    </form>

    <script>

function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var showPasswordSpan = document.querySelector(".show-password");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        showPasswordSpan.textContent = "Hide";
    } else {
        passwordInput.type = "password";
        showPasswordSpan.textContent = "Show";
    }
}
    </script>
</body>
</html>