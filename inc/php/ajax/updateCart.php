<?php
    /* TODO: Refactor */
    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    spl_autoload_register(function($class_name) {
        include "../" . $class_name . ".php";
    });

    if(isset($_POST["key"]) && !empty($_POST["key"])) {
        $classKey = "gun" . $_POST["key"];
        if(isset($_POST["decrement"]) && $_POST["decrement"] === "true") {
            if(isset($_SESSION[$classKey])) {
                $object = unserialize($_SESSION[$classKey]);
                $object->quantity -= 1;

                $cartObject = unserialize($_SESSION["cartTotal"]);
                $cartObject->subtractFromSubtotal($object->price);

                $_SESSION["cartTotal"] = serialize($cartObject);
                $_SESSION[$classKey] = serialize($object);
            }

            if(isset($_SESSION["cartCount"]))
                $_SESSION["cartCount"] = strval(intval($_SESSION["cartCount"]) - 1);
            else
                $_SESSION["cartCount"] = 0;
        }
        if(isset($_POST["increment"]) && $_POST["increment"] === "true") {
            if(isset($_SESSION[$classKey])) {
                $object = unserialize($_SESSION[$classKey]);
                $object->quantity += 1;

                $cartObject = unserialize($_SESSION["cartTotal"]);
                $cartObject->add2Subtotal($object->price);

                $_SESSION["cartTotal"] = serialize($cartObject);
                $_SESSION[$classKey] = serialize($object);
            }

            if(isset($_SESSION["cartCount"]))
                $_SESSION["cartCount"] = strval(intval($_SESSION["cartCount"]) + 1);
            else
                $_SESSION["cartCount"] = 0;
        }

        if($object->quantity === 0) {
            unset($_SESSION[$classKey]);
            $delete = "true";
        } else {
            $_SESSION[$classKey] = serialize($object);
            $delete = "false";
        }

        header('Content-type: application/json; charset=UTF-8');
        echo json_encode(array("cartTotal" => $_SESSION["cartCount"], "subtotal" => $cartObject->subtotal, "tax" => $cartObject->totalTax, "total" => $cartObject->total, "delete" => $delete));
        exit;
    }
