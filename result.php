<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Result</title>
</head>
<body>
    <h1>This is the php result from the form: </h1>
    <br>

    <?php
    require_once ('/home/jensen/abuse.php');  // log all questionable submissions
    
        $firstName = htmlspecialchars($_POST["FirstName"]);
        $lastName = htmlspecialchars($_POST["LastName"]);
        $email = htmlspecialchars($_POST["Email"]);
        $website = htmlspecialchars($_POST["Website"]);
        $message = htmlspecialchars($_POST["Message"]);
        $termsService = htmlspecialchars($_POST["TermsServices"]);
        abuse($message);

        $guest = fopen("guestBook.txt", "a");
        fwrite($guest,"Name: $firstName $lastName \n
email: $email \n
website: $website \n
message: $message \n
terms and services: $termsService \n");
        fwrite($guest, date("d M Y - h:i a\n\n"));
        fwrite($guest, "------------------------");
        fclose($guest)
    ?>

    <h1>Welcome <?php echo $firstName; ?> <?php echo $lastName; ?></h1>
    <p>Your email is: <?php echo $email; ?> </p>
    <br />
    <p> Your website is: <?php echo $website; ?> </p>
    <br />
    <p> Your message is: <?php echo $message; ?> </p>
    <br />
    <p> Terms and service: <?php echo $termsService; ?> </p>

</body>
</html>