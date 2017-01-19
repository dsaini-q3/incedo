<?php
/**
 * To Display Shopping Cart's Total cost 
 */
require_once '.\scanning.php';

/**
 * To initialze the grouping and pricing of the products
 */
$scanObject = new Scanning(4, 1, 6, 1);
$scanObject->setPricing(2, 12, 1.25, 0.15, 7, 12, 6, 4);

$scanObject1 = clone $scanObject;
$scanObject2 = clone $scanObject;
$scanObject3 = clone $scanObject;

$scanObject->scan('A');
$scanObject->scan('B');
$scanObject->scan('C');
$scanObject->scan('D');
$scanObject->scan('A');
$scanObject->scan('B');
$scanObject->scan('A');
$scanObject->scan('A');

$scanObject1->scan('C');
$scanObject1->scan('C');
$scanObject1->scan('C');
$scanObject1->scan('C');
$scanObject1->scan('C');
$scanObject1->scan('C');
$scanObject1->scan('C');

$scanObject2->scan('A');
$scanObject2->scan('B');
$scanObject2->scan('C');
$scanObject2->scan('D');

echo 'Total cost of shopping cart:<br />';
$scanObject->setTotal();
echo '<br />Case 1 (ABCDABAA):<br /> Total Cost- $' . number_format($scanObject->totalPrice, 2);
$scanObject1->setTotal();
echo '<br /><br />Case 2 (CCCCCCC):<br /> Total Cost- $' . number_format($scanObject1->totalPrice, 2);
$scanObject2->setTotal();
echo '<br /><br />Case 3 (ABCD):<br /> Total Cost- $' . number_format($scanObject2->totalPrice, 2);
?>