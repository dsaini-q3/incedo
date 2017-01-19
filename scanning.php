<?php
/**
 * An invoice system that counts products and calculates the total
 * cost of all the products based on product counts, product price 
 * and group pricing
 */
Class Scanning {

    public $totalPrice = 0;
    public $priceProductA = 0;
    public $priceProductB = 0;
    public $priceProductC = 0;
    public $priceProductD = 0;
    public $groupPriceA = 0;
    public $groupPriceB = 0;
    public $groupPriceC = 0;
    public $groupPriceD = 0;
    public $countProductA = 0;
    public $countProductB = 0;
    public $countProductC = 0;
    public $countProductD = 0;

    /**
     * To initialize products grouping
     * @param type $groupA
     * @param type $groupB
     * @param type $groupC
     * @param type $groupD
     */
    public function __construct($groupA, $groupB, $groupC, $groupD) {
        $this->groupA = $groupA;
        $this->groupB = $groupB;
        $this->groupC = $groupC;
        $this->groupD = $groupD;
    }

    /**
     * To add a product to the cart
     * @param type $product
     */
    function scan($product) {
        switch ($product) {
            case 'A':
                $this->countProductA++;
                break;
            case 'B':
                $this->countProductB++;
                break;
            case 'C':
                $this->countProductC++;
                break;
            case 'D':
                $this->countProductD++;
                break;
        }
    }

    /**
     * To calculate total cost of the cart
     */
    function setTotal() {
        if (!empty($this->countProductA)) {
            $divResult = $this->getQuotientAndRemainder($this->countProductA, $this->groupA);
            $this->subTotal($divResult, $this->priceProductA, $this->groupPriceA);
        }
        if (!empty($this->countProductB)) {
            $divResult = $this->getQuotientAndRemainder($this->countProductB, $this->groupB);
            $this->subTotal($divResult, $this->priceProductB, $this->groupPriceB);
        }
        if (!empty($this->countProductC)) {
            $divResult = $this->getQuotientAndRemainder($this->countProductC, $this->groupC);
            $this->subTotal($divResult, $this->priceProductC, $this->groupPriceC);
        }
        if (!empty($this->countProductC)) {
            $divResult = $this->getQuotientAndRemainder($this->countProductD, $this->groupC);
            $this->subTotal($divResult, $this->priceProductD, $this->groupPriceD);
        }
    }

    function subTotal($productCount, $price, $groupPrice) {
        $subTotal = $productCount[0] * $groupPrice;
        $subTotal1 = $productCount[1] * $price;
        $this->totalPrice += ($subTotal + $subTotal1);
    }

    /**
     * To perform devision of two numbers
     * and get quotient and remainder
     * @param type $divisor
     * @param type $dividend
     * @return type
     */
    function getQuotientAndRemainder($divisor, $dividend) {
        $quotient = (int) ($divisor / $dividend);
        $remainder = $divisor % $dividend;
        return array($quotient, $remainder);
    }

    /**
     * To set price and group price of the products
     * @param type $priceA
     * @param type $priceB
     * @param type $priceC
     * @param type $priceD
     * @param type $priceGroupA
     * @param type $priceGroupB
     * @param type $priceGroupC
     * @param type $priceGroupD
     */
    function setPricing($priceA, $priceB, $priceC, $priceD, $priceGroupA, $priceGroupB, $priceGroupC, $priceGroupD) {
        $this->priceProductA = $priceA;
        $this->priceProductB = $priceB;
        $this->priceProductC = $priceC;
        $this->priceProductD = $priceD;
        $this->groupPriceA = $priceGroupA;
        $this->groupPriceB = $priceGroupB;
        $this->groupPriceC = $priceGroupC;
        $this->groupPriceD = $priceGroupD;
    }

}

?>