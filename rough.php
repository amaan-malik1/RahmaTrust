<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "palestine";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if(isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $country = $_POST['country'];

    // Insert data into the database
    $sql = "INSERT INTO `personal` (`SNum`, `name`, `email`, `country`, `date`) 
            VALUES (NULL, '$name', '$email', '$country', current_timestamp(6))";

    if ($conn->query($sql) === TRUE) {
        // Success message for alert modal
        $alertMessage = "Personal information submitted successfully!";
    } else {
        $alertMessage = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Add your other head elements here -->
    <title>Submission</title>
</head>
<body>

<!-- Your HTML content -->

<!-- Alert Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $alertMessage; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Your other HTML content -->

<!-- Bootstrap JS and other scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"
        integrity="sha384-LzvP1lgBZR3+ogzU5U2dUa4juxnAy8nRxzpbBH3FWEHzMWwr9jOYbI1g0M6ZO2hF"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-GLhlTQ8iK9t9zq3L99aK6p9e9wJ1Wn/bE9RDIH6/w6jyoEWS3t4pFa9omynKjk"
        crossorigin="anonymous"></script>
<!-- Add your other scripts here -->
<script>
    // Show the success modal on page load
    $(document).ready(function(){
        $('#successModal').modal('show');
    });
</script>
</body>
</html>
