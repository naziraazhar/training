<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #F1E789; /* Set a background color */
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #F1E789; /* Set a background color for the heading */
            color: black;
        }

        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        li {
            margin: 10px 0;

        }

        a {
            text-decoration: none;
            color: white;
            background-color: #A22F5C; /* Set a background color for the list items */
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
        }

        a:hover {
            background-color: #555; /* Change the background color on hover */
            color: white;
        }
    </style>
</head>
<body>
    <h1>Welcome, Admin</h1>
    <ul>
        <li><a href="list_participants.php">List Participants</a></li>
        <!-- Add more admin functionalities here -->
    </ul>
</body>
</html>