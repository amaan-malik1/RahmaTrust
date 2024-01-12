<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "palestine";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? test_input($_POST['name']) : "";
    $email = isset($_POST['email']) ? test_input($_POST['email']) : "";
    $country = isset($_POST['country']) ? test_input($_POST['country']) : "";

    $sql = "INSERT INTO `personal` (`SNum`, `name`, `email`, `country`, `date`) 
            VALUES (NULL, '$name', '$email', '$country', current_timestamp(6))";

    if ($conn->query($sql) === TRUE) {
        echo '<script>
            alert("Personal information submitted successfully!");
            setTimeout(function(){
                window.location.href = "donation.html";
            }, 100); // Redirect after 0.1 second
        </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
