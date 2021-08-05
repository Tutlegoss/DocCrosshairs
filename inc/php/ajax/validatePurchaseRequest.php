<?php
    session_status() === PHP_SESSION_ACTIVE ?: session_start();

    function sendEmail($name, $email, $address, $address2, $city, $state, $zip, $telephone)
    {
        require_once("../CartGuns.php");
        $gunsInCart = array_filter($_SESSION,fn($key) => preg_match('/^gun./',$key),ARRAY_FILTER_USE_KEY);

        foreach($gunsInCart as $key => $value) {
            $object = unserialize($value);
            $requestedGuns[] = "<p>$object->name: Qty: $object->quantity @ $object->msrp</p>";
        }
        $requestedGuns = implode(' ', $requestedGuns);
        $object_cartTotal = unserialize($_SESSION["cartTotal"]);

        $subject = "DocCrosshairs.com Inquiry";
        $message = "<html>"
                    ."<head>"
                      ."<title>DocCrosshairs.com Purchase Request</title>"
                    ."</head>"
                    ."<body>"
                      ."<p style='color: #ca0d0d; font-size: 20px;'>Message from Landen: Do not click any links that may be in this Email to avoid any chance of malicious intent.</p>"
                      ."<p>Name: " . $_POST['Name'] . "</p>"
                      ."<p>Email: " . $_POST['Email'] . "</p>"
                      ."<p>Telephone: " . $_POST['Telephone'] . "</p>"
                      ."<p>Address: " . $_POST['Address'] . "</p>"
                      ."<p>City: " . $_POST['City'] . "</p>"
                      ."<p>State: " . $_POST['State'] . "</p>"
                      ."<p>Zip: " . $_POST['Zip'] . "</p>"
                      ."<br><br>"
                      ."<p>REQUESTED:</p>"
                      ."<br>"
                      . $requestedGuns
                      ."<br>"
                      ."<p>Subtotal: " . $object_cartTotal->subtotal . "</p>"
                      ."<p>Tax: " . $object_cartTotal->totalTax . "</p>"
                      ."<p>Total: " . $object_cartTotal->total . "</p>"
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

            if(!isset($_SESSION["cartCount"]) || $_SESSION["cartCount"] === "0")
                $invalid["cartCount"] = "No items in cart. Cannot process.";

            if(!isset($_POST["Name"]) || (strlen($_POST["Name"]) < 2))
                $invalid["Name"] = "Name was not processed.";

            if(!isset($_POST["Email"]) ||
               !preg_match("/[A-Za-z0-9\._%+-]+@[A-Za-z0-9\._%+\-]+/", $_POST["Email"]) ||
               !filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL))
                $invalid["Email"] = "Email was invalid.";

            if(!isset($_POST["Address"]) || (strlen($_POST["Address"]) < 2))
                $invalid["Address"] = "Address is incomplete.";

            if(!isset($_POST["City"]) || (strlen($_POST["City"]) < 2))
                $invalid["City"] = "City is incomplete.";

            if(!isset($_POST["State"]) || (strlen($_POST["State"]) === 0))
                $invalid["State"] = "State is invalid.";

            if(!isset($_POST["Zip"]) || (strlen($_POST["Zip"]) < 5))
                $invalid["Zip"] = "Zip is incomplete.";

            if(count($invalid) > 1) {
                header('Content-Type: application/json');
                echo json_encode($invalid);
                exit;
            }

            $telephone = (empty($_POST["Telephone"])) ? NULL : substr($_POST["Telephone"], 0, 17);

            $sql = "INSERT INTO Cart (Name, Email, Address, Address2, City, State, Zip, Telephone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$_POST["Name"], $_POST["Email"], $_POST["Address"], $_POST["Address2"], $_POST["City"], $_POST["State"], $_POST["Zip"], $telephone]);

            foreach($_POST as $key => $value)
                $_POST[$key] = htmlspecialchars($value, ENT_NOQUOTES, "UTF-8");

            sendEmail($_POST["Name"], $_POST["Email"], $_POST["Address"], $_POST["Address2"], $_POST["City"], $_POST["State"], $_POST["Zip"], $_POST["Telephone"]);

            session_destroy();
            header('Content-Type: application/json');
            echo json_encode(["Inquiry processed. We will contact you ASAP, thank you."]);
            exit;
        }
