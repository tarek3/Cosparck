<?php
require_once 'db.php'; // Connection to the database

// Redirect function
function redirect($url) {
    header("Location: $url");
    exit;
}

// Check if the request method is POST (form submission)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize form input
    $Ent_RC = intval($_POST['Ent_RC']); // Convert to integer
    $Ent_Dsg = filter_var($_POST['Ent_Dsg'], FILTER_SANITIZE_STRING);
    $Ent_Tele = preg_replace('/[^0-9]/', '', $_POST['Ent_Tele']); // Keep only digits
    $Ent_Adr = filter_var($_POST['Ent_Adr'], FILTER_SANITIZE_STRING);
    $Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
    $Password = $_POST['Password']; // Raw password for hashing

    // Validate mandatory fields
    if (empty($Ent_RC) || empty($Ent_Dsg) || empty($Ent_Tele) || empty($Ent_Adr) || empty($Email) || empty($Password)) {
        echo "All fields are required.";
        exit;
    }

    // Hash the password using BCRYPT
    $hashed_password = password_hash($Password, PASSWORD_BCRYPT);

    // SQL query to insert the new company account
    $sql = "INSERT INTO Entreprise (Ent_RC, Ent_Dsg, Ent_Tele, Ent_Adr, Email, Password) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters to the query
        $stmt->bind_param('isssss', $Ent_RC, $Ent_Dsg, $Ent_Tele, $Ent_Adr, $Email, $hashed_password);

        // Execute the statement and check if successful
        if ($stmt->execute()) {
            // Redirect to ent_dashboard.php if successful
            redirect('/cosparck/ent/dashboard.php');
        } else {
            echo "Error inserting into database: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Invalid request method.";
}

$conn->close(); // Close the database connection
?>
