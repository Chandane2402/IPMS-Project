
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

    <h1>Reset Password</h1>

    <form method="post" action="process-reset-password.php">
        <label for="email">mail:</label>
        <input type="mail" name='mail' id='mail' placeholder='Ener your mail'><br><br>
        <label for="password">New password</label>
        <input type="password" id="password" name="password">
        <br><br>
        <label for="password_confirmation">Repeat password</label>
        <input type="password" id="password_confirmation"
               name="password_confirmation">
         <br><br>
        <button>Send</button>
    </form>

</body>
</html>