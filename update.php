<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: list_participants.php");
    exit;
}

require_once 'db.php';

if (isset($_GET['id'])) {
    $participantId = $_GET['id'];

    // Retrieve participant data from the database
    $sql = "SELECT * FROM register WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $participantId, PDO::PARAM_INT);
    $stmt->execute();
    $participant = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$participant) {
        // Participant not found
        header("Location: list_participants.php");
        exit;
    }
} else {
    // No participant ID provided
    header("Location: list_participants.php");
    exit;
}

// Handle form submission to update participant data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Perform update in the database (modify this part based on your actual database structure)
    $updatedFirstName = $_POST['first_name'];
    $updatedLastName = $_POST['last_name'];
    $updatedEmail = $_POST['email'];
    $updatedPhone = $_POST['phone'];

    $updateSql = "UPDATE register SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone WHERE id = :id";
    $updateStmt = $pdo->prepare($updateSql);
    $updateStmt->bindParam(':first_name', $updatedFirstName, PDO::PARAM_STR);
    $updateStmt->bindParam(':last_name', $updatedLastName, PDO::PARAM_STR);
    $updateStmt->bindParam(':email', $updatedEmail, PDO::PARAM_STR);
    $updateStmt->bindParam(':phone', $updatedPhone, PDO::PARAM_STR);
    $updateStmt->bindParam(':id', $participantId, PDO::PARAM_INT);
    
    if ($updateStmt->execute()) {
        // Update successful
        header("Location: list_participants.php");
        exit;
    } else {
        // Update failed
        echo "Error updating participant.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Participant</title>
    <!-- Add Bootstrap CDN links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: #F1E789;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
        }

        .title-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            margin-top: 10px;
        }

        .btn-primary {
            margin-top: 20px;
        }

        .btn-secondary {
            margin-top: 20px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="title-container">
            <h1 class="mb-4 text-center">Edit Participant</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" value="<?= $participant['first_name'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" value="<?= $participant['last_name'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="<?= $participant['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" name="phone" value="<?= $participant['phone'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Participant</button>
            </form>
            <br>
            <a href="list_participants.php" class="btn btn-secondary">Back to List</a>
        </div>
    </div>

    <!-- Add Bootstrap JS and Popper.js CDN links (optional, for Bootstrap components that require them) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Close the database connection
$pdo = null;
?>
