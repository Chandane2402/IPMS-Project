<?php

$email = $_POST["email"];

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$mysqli = require __DIR__ . "/database.php";

$sql = "UPDATE customers
        SET  reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("ss", $expiry, $email);

$stmt->execute();

if ($mysqli->affected_rows) {

   
      $otp = rand(1000, 9999); // Generates a 4-digit OTP
    
   
    $mail = require __DIR__ . "/mailer.php";

    $mail->setFrom("kadkoltaslimraza81@gmail.com");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END

    <p><strong>Your OTP is:$otp</strong>;
     this opt is to reset your password.

    END;

    try {

            $mail->send();
             echo <<<HTML
              <script>alert("OTP is sent to your email")</script>
              
              <form method="POST" action="">
                <label for="email">Email:</label> <br><br>
                <input type="email" name="email" placeholder="Enter your email" required>
               
                <label for="otp">OTP</label>
                <input type="text" id="otp" name="otp" placeholder="Enter your OTP" required>
               
                <br><br>
                <button type="button" onclick="validate()">Validate OTP</button>
            </form>
            <script>
                const serverOtp = "$otp"; // Pass the OTP from PHP to JavaScript

                function validate() {
                    let newOtp = document.getElementById('otp').value;
                    if (newOtp === serverOtp) {
                        alert("OTP is valid");
                        window.location.href = "reset-password.php"; // Redirect to reset-password.php
                    } else {
                        alert("OTP is not valid");
                    }
                }
            </script>
            HTML;

        
            
      
        }catch (Exception $e) {

        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";

    }
}


