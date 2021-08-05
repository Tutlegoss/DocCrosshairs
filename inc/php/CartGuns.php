<?php

class CartGuns {
    public ?string $image = null;
    public ?string $name = null;
    public ?string $msrp = null;
    public $quantity = 1;
    public $price;

    public function __construct($image, $name, $msrp, $price) {
        $this->image = $image;
        $this->name = $name;
        $this->msrp = $msrp;
        $this->price = $price;
    }
}

class CartTotal {
    public $subtotal = 0;
    public static $tax = 725;
    public $totalTax = "0";
    public $total = "0";

    public function __construct($subtotal) {
        $this->subtotal = $subtotal;
        $this->calculate();
    }

    public function add2Subtotal($price) {
        $this->subtotal += $price;
        $this->calculate();
    }

    public function subtractFromSubtotal($price) {
        $this->subtotal -= $price;
        if($this->subtotal <= 0) {
            $this->subtotal = 0;
            $this->totalTax = "0";
            $this->total = "0";
        } else
            $this->calculate();
    }

    public function calculate() {
        $calculation = strval($this->subtotal * self::$tax);
        $calculationRoundingDigit = strlen($calculation) - 2;

        /* If rounding is needed, add 1 and convert to string. Then take value less extra digits */
        if($calculation[$calculationRoundingDigit] >= "5")
            $calculation = strval(intval(substr($calculation, 0, $calculationRoundingDigit)) + 1);
        else
            $calculation = substr($calculation, 0, $calculationRoundingDigit);

        /* Get cents portion and add 0 if cents is 0 - 9 */
        $cents = substr($calculation,-2);
        $cents = str_pad($cents, 2, "0", STR_PAD_LEFT);

        /* Get dollars portion */
        if(strlen($calculation) > 2)
            $dollars = substr($calculation,0,-2);
        else
            $dollars = "0";

        /* Concatenate into tax and total amounts */
        $this->totalTax = $dollars . "." . $cents;
        $total = intval($dollars) + intval($this->subtotal);
        $this->total = strval($total) . "." . $cents;
    }
}
