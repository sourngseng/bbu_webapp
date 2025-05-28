<?php
// ពន្ធទំនិញនៅកម្ពុជា (VAT 10%)
function calculateVAT($price) {
    $vatRate = 0.1; // 10%
    $vatAmount = $price * $vatRate;
    return $vatAmount;
}

// គណនាតម្លៃតែមួយរួមពន្ធ
function calculatePriceWithVAT($price) {
    $vatAmount = calculateVAT($price);
    $totalPrice = $price + $vatAmount;
    return $totalPrice;
}

// គណនាតម្លៃសរុបសម្រាប់ទំនិញច្រើន
function calculateTotalPrice($items) {
    $subtotal = 0;
    
    foreach ($items as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
    
    $vatAmount = calculateVAT($subtotal);
    $totalPrice = $subtotal + $vatAmount;
    
    return [
        'subtotal' => $subtotal,
        'vat' => $vatAmount,
        'total' => $totalPrice
    ];
}

// ឧទាហរណ៍៖ ការគណនាតម្លៃទំនិញ
$price = 2;
echo "តម្លៃដើម: $price<br>";
echo "ពន្ធអាករ: " . calculateVAT($price) . "<br>";
echo "តម្លៃរួមពន្ធ: " . calculatePriceWithVAT($price) . "<br>";

// ឧទាហរណ៍៖ ការគណនាវិក័យប័ត្រ
$shoppingCart = [
    ['name' => 'ទូរស័ព្ទដៃ', 'price' => 200, 'quantity' => 1],
    ['name' => 'កាស', 'price' => 50, 'quantity' => 2],
    ['name' => 'ប៊ិច', 'price' => 2, 'quantity' => 5]
];

$result = calculateTotalPrice($shoppingCart);
echo "<h3>លម្អិតវិក័យប័ត្រ</h3>";
echo "តម្លៃទំនិញសរុប: $" . $result['subtotal'] . "<br>";
echo "ពន្ធអាករ: $" . $result['vat'] . "<br>";
echo "តម្លៃសរុប: $" . $result['total'];
?>