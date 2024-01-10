<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: list_participants.php");
    exit;
}

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_id"])) {
        $participantIdToDelete = $_POST["delete_id"];

        // Perform the deletion query
        $sql = "DELETE FROM register WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':id', $participantIdToDelete, PDO::PARAM_INT);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Participant with ID $participantIdToDelete has been deleted successfully.";
        } else {
            echo "Error deleting participant: " . $stmt->errorInfo()[2];
        }
    } elseif (isset($_POST["update_id"])) {
        // Handle the update logic (you can redirect to an update page)
        $participantIdToUpdate = $_POST["update_id"];
        header("Location: update.php?id=$participantIdToUpdate");
        exit;
    }
}

$sql = "SELECT * FROM register";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Participants</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #F1E789;
            margin: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        form {
            display: inline-block;
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #3498db;
        }

        a {
            display: block;
            margin-top: 20px;
            color: #3498db;
            text-decoration: none;
            text-align: center;
        }

        a:hover {
            text-decoration: underline;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        #logout-btn {
            float: right;
            margin-top: 10px;
            margin-right: 20px;
            color: #e74c3c;
            text-decoration: none;
        }

        #logout-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>List of Participants</h1>
    <a id="logout-btn" href="logout.php">Logout <span>&#x1F6AA;</span></a>

    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>";
            echo "<form method='POST'>";
            echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
            echo "<input type='submit' value='Delete'>";
            echo "</form>";
            echo "<form method='POST'>";
            echo "<input type='hidden' name='update_id' value='" . $row['id'] . "'>";
            echo "<input type='submit' value='Update'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <a href="index.html">Back to HomePage</a>
</body>
</html>

<?php
// Close the database connection
$pdo = null;
?>
