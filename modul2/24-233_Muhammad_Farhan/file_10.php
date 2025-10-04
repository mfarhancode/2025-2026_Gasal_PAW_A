<?php
session_start();

$menu = array(
    ['code' => '1', 'name' => 'Burger', 'price' => 20000],
    ['code' => '2', 'name' => 'Shawarma', 'price' => 25000],
    ['code' => '3', 'name' => 'Biryani', 'price' => 30000]
);

echo "This is the menu: <br>";
echo "Code - Name - Price<br>";
foreach ($menu as $item) {
    echo "{$item['code']} --- {$item['name']} -- {$item['price']} <br>";
}

echo "<form method='post'>
Enter code from menu:
<input type='text' name='code'>
<input type='submit' name='buy' value='Buy'>
<input type='submit' name='clear' value='Clear Cart'>
</form>";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['clear'])) {
    $_SESSION['cart'] = [];
    echo "<p>Cart cleared!</p>";
}

elseif (isset($_POST['buy'])) {
    $code = $_POST['code'];
    $found = false;

    foreach ($menu as $item) {
        if ($item['code'] == $code) {
            $_SESSION['cart'][] = $item;
            $found = true;
            break;
        }
    }

    if (!$found) {
        echo "<p style='color:red;'>Invalid code!</p>";
    }
}

if (!empty($_SESSION['cart'])) {
    $total = 0;
    echo "<h3>Your Cart:</h3>";
    foreach ($_SESSION['cart'] as $cartItem) {
        echo "{$cartItem['name']} - {$cartItem['price']}<br>";
        $total += $cartItem['price'];
    }
    echo "<strong>Total: $total</strong>";
}
?>
