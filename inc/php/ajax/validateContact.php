<?php
    function sendEmail($name, $email, $telephone, $comment)
    {
        $subject = "DocCrosshairs.com Inquiry";
        $message = "<html>"
                    ."<head>"
                      ."<title>DocCrosshairs.com Inquiry for" . $name . "</title>"
                    ."</head>"
                    ."<body>"
                      ."<p style='color: #ca0d0d; font-size: 20px;'>Message from Landen: Do not click any links that may be in this Email to avoid any chance of malicious intent.</p>"
                      ."<p>Name: " . $name . "</p>"
                      ."<p>Email: " . $email . "</p>"
                      ."<p>Telephone: " . $telephone . "</p>"
                      ."<p>Inquiry: " . $comment . "</p>"
                    ."</body>"
                  ."</html>";
        $headers = "MIME-Version: 1.0\r\n"
                  ."Content-type:text/html;charset=UTF-8\r\n"
                  ."From: <doccrosshairs@doccrosshairs.com>\r\n";

        mail("doccrosshairs@gmail.com", $subject, $message, $headers);
    }

    if($_POST) {
        require_once("/home/____________/pdoconfig.php");
        $invalid = [];
        $invalid[] = "There were errors when filling out the form:";

        if(!isset($_POST["Name"]) || (strlen($_POST["Name"]) < 2))
            $invalid["Name"] = "Name was not processed.";

        if(!isset($_POST["Email"]) ||
           !preg_match("/[A-Za-z0-9\._%+-]+@[A-Za-z0-9\._%+\-]+/", $_POST["Email"]) ||
           !filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL))
            $invalid["Email"] = "Email was invalid.";

        if(!isset($_POST["Comment"]) || (strlen($_POST["Comment"]) == 0))
            $invalid["Comment"] = "Comment was empty or could not be processed.";

        if(count($invalid) > 1) {
            header('Content-Type: application/json');
            echo json_encode($invalid);
            exit;
        }

        $telephone = (empty($_POST["Telephone"])) ? NULL : substr($_POST["Telephone"], 0, 17);

        $sql = "INSERT INTO Contact (Name, Email, Telephone, Comment) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST["Name"], $_POST["Email"], $telephone, $_POST["Comment"]]);

        foreach($_POST as $key => $value)
            $_POST[$key] = htmlspecialchars($value, ENT_NOQUOTES, "UTF-8");

        sendEmail($_POST["Name"], $_POST["Email"], $_POST["Telephone"], $_POST["Comment"]);

        header('Content-Type: application/json');
        echo json_encode(["Your inquiry has been sent. We will contact you ASAP, thank you."]);
        exit;
    }
