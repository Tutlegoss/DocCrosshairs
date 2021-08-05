<?php
    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    spl_autoload_register(function($class_name) {
        include "../" . $class_name . ".php";
    });

    if(isset($_POST["gunNum"]) && !empty($_POST["gunNum"])) {
        $gunJSON = file_get_contents("../../js/gunCatalog.json");
        $gunInfo = json_decode($gunJSON, true);
        $gunInfoKey = strval(json_decode($_POST["gunNum"], true));
        $classKey = "gun" . $gunInfoKey;

        if(isset($_SESSION[$classKey])) {
            $object = unserialize($_SESSION[$classKey]);
            $object->quantity += 1;
        } else {
            $object = new CartGuns(
                $gunInfo[$gunInfoKey]["Img"],
                $gunInfo[$gunInfoKey]["Name"],
                $gunInfo[$gunInfoKey]["MSRP"],
                $gunInfo[$gunInfoKey]["Price"]);
        }

        if(isset($_SESSION["cartTotal"])) {
            $cartObject = unserialize($_SESSION["cartTotal"]);
            $cartObject->subtotal += $object->price;
            $cartObject->calculate();
        } else {
            $cartObject = new CartTotal($object->price);
        }

        if(isset($_SESSION["cartCount"]))
            $_SESSION["cartCount"] = strval(intval($_SESSION["cartCount"]) + 1);
        else
            $_SESSION["cartCount"] = "1";

        $_SESSION[$classKey] = serialize($object);
        $_SESSION["cartTotal"] = serialize($cartObject);

        header('Content-type: application/json; charset=UTF-8');
        echo json_encode($_SESSION["cartCount"]);
        exit;
    }
