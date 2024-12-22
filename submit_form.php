<?php
// Include the database connection
include 'db_connection.php'; // Ensure this file contains the database connection code

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Prepare the SQL query to insert data into the database
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Message sent successfully!');
                window.location.href = 'dream1.html';
              </script>";
    } else {
        echo "<script>
                alert('Error: Unable to save your message. Please try again.');
                window.history.back();
              </script>";
    }

    // Close the database connection
    $conn->close();
}
?>
