<?php 

$token = $_POST["mail"];
$mysqli = require __DIR__ . "/database.php";
$db = mysqli_connect('localhost','root','','internship');
$sql = "SELECT * FROM customers WHERE email = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();
$checkPass = $result->num_rows;

// if ($checkPass == 0) {
//     echo <<<HTML
//     <script>
//         alert("Token not found");
//         window.location.href = "forgot-password.php";
//     </script>
//     HTML;
//     exit();
// }

// $user = $result->fetch_assoc();

// if (strtotime($user["reset_token_expires_at"]) <= time()) {
//     echo <<<HTML
//     <script>
//         alert("Token expired");
//         window.location.href = "forgot-password.php";
//     </script>
//     HTML;
//     exit();
// }

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
  
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$sql1 = "UPDATE customers SET password = ?, reset_token_expires_at = NULL WHERE email = ?";
$stmt1 = $db->prepare($sql1);
$stmt1->bind_param("ss", $password_hash, $token);
$runPass1 = $stmt1->execute();

if ($runPass1) {
    echo <<<HTML
    <script>
        alert("Password updated. You can now login");
        window.location.href = "C://xampp1//htdocs//internship//login.php";
    </script>
    HTML;
} else {
    echo <<<HTML
    <script>
        alert("Password not updated");
        window.location.href = "forgot-password.php";
    </script>
    HTML;
}
?>
