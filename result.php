<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container mt-3">
        <?php
        function formatPhoneNumber($phone)
        {
            $cleanedPhone = preg_replace('/\D/', '', $phone);
            if (strlen($cleanedPhone) == 10) {
                return preg_replace('/(\d{3})(\d{3})(\d{4})/', '($1) $2-$3', $cleanedPhone);
            } else {
                return 'Invalid phone number';
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = isset($_POST['yourName']) ? htmlspecialchars($_POST['yourName']) : '';
            $email = isset($_POST['yourEmail']) ? htmlspecialchars($_POST['yourEmail']) : '';
            $phone = isset($_POST['yourPhone']) ? htmlspecialchars($_POST['yourPhone']) : '';
            $company = isset($_POST['yourCompany']) ? htmlspecialchars($_POST['yourCompany']) : '';
            $message = isset($_POST['yourMessage']) ? htmlspecialchars($_POST['yourMessage']) : '';

            $errors = [];
            if (empty($email)) {
                $errors[] = "Email is required.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            }

            if (empty($phone)) {
                $errors[] = "Phone number is required.";
            } elseif (!preg_match('/^\(\d{3}\) \d{3}-\d{4}$/', formatPhoneNumber($phone))) {
                $errors[] = "Invalid phone number format. Use (000) 000-0000.";
            }
            if (empty($errors)) {
                $formattedPhone = formatPhoneNumber($phone);
                echo '<div class="card custom-card">';
                echo '<div class="card-header">';
                echo '<h3 class="card-title text-primary">Thank you for contacting us</h3>';
                echo '</div>';
                echo '<div class="card-body">';
                echo "<p class='mb-4'>We will be back in touch with you within one business day using the information you just privided below: </p>";
                echo "<p><strong>Your Name:</strong> $name</p>";
                echo "<p><strong>Phone:</strong> $formattedPhone</p>";
                echo "<p><strong>Email Address:</strong> <span class='text-decoration-underline text-primary'>$email</span></p>";
                echo "<p><strong>Company:</strong> $company</p>";
                // echo "<p><strong>Message:</strong> $message</p>";
                echo '</div>';
                echo '</div>';             
            } else {
                echo "<h1>There were errors with your submission</h1>";
                foreach ($errors as $error) {
                    echo "<p>$error</p>";
                }
            }
        } else {
            echo "No data received";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.js"></script>

</body>

</html>