<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F1E789;
        }

        header {
            color: black;
            text-align: center;
            padding: 1em;
        }

        main {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: grid;
            gap: 15px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .password-container {
            position: relative;
        }

        .show-password {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        #passwordStrength {
            margin-top: 5px;
            font-size: 0.8em;
        }

        input:invalid {
            border: 1px solid #ff0000;
        }

        input:valid {
            border: 1px solid #00cc00;
        }

        input:required:valid {
            background-color: #f2fff1;
        }

        input:required:invalid {
            background-color: #ffe6e6;
        }

        input:required {
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #333;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Training Registration Form</h1>
    </header>

    <main>
        <form id="registrationForm" action="list_participants.php" method="POST" onsubmit="return handleRegistration()">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="text" name="phone" required>

            <label for="password" class="password-container">Password:
                <input type="password" name="password" id="password" required>
                <span class="show-password" onclick="togglePasswordVisibility()">Show</span>
                <div id="passwordStrength"></div>
            </label>

            <input type="submit" value="Register">
        </form>

        <a href="list_participants.php">List Participants</a>

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
    </main>

    <script>
        // Add your JavaScript code here
    </script>
</body>
</html>