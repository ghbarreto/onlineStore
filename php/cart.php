<?php
// Start a sesson called cart
if (!isset($_SESSION['cart'])) { 
    $_SESSION['cart'] = array();
}
//add to the cart
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'add') {
        $id = intval($_GET['id']);
        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = 1;
        } else {
            $_SESSION['cart'][$id] += 1;
        }
    }
}
    // remove
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'del') {
        $id = intval($_GET['id']);
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
    }
}
    //update cart
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'up') {
        if (is_array($_POST['prod'])) {
            foreach ($_POST['prod'] as $id => $qtd) {
                $id = intval($id);
                $qtd = intval($qtd);
                if (!empty($qtd) || $qtd <> 0) {
                    $_SESSION['cart'][$id] = $qtd;
                } else {
                    unset($_SESSION['cart'][$id]);
                }
            }
        }
    }
}
?>
<nav id="navCart">
    <table>
        <caption id="myCart"> MY CART </caption>
    <thead>
        <tr>
            <th width="244">Product</th>
            <th width="79">Quantity</th>
            <th width="89">Price</th>
            <th width="100">Total</th>
            <th width="64">Remove</th>
    </thead>

    <form action="?action=up" method='post'>

    <tfoot>
        <tr id="updateCart">
            <td colspan="5"><input  id="inputUpdate" type='submit'value='Update Cart'/> </td>
            <tr>
            <td colspan="5" id="cartCenter"><a id="cartPlusA"href="../html/jobs.php"><i id="cartPlus"class="fas fa-cart-plus"></i>Continue Buying</a></td>
    </tfoot>

    <tbody>
<?php
//adding/counting/final value/ of the cart
$finalValue = 0;
if(count($_SESSION['cart']) == 0){
    echo '<tr><td colspan="5"> There are not products in the cart</td></tr>';
}else{
    include('connection.php');
        foreach($_SESSION['cart'] as $id => $qtd){
            $sequel = "CALL selectProduct('$id');"; // calling the procedure for my cart items
            $qr = mysqli_query($conn, $sequel) or die (mysqli_error($conn));
            $ln= mysqli_fetch_assoc($qr);
            mysqli_free_result($qr);
            mysqli_next_result($conn);
            // I have used mysqli_free_result, next result
            // under my connection because if my store already
            // has 1 entry, the mysqli will be full of connection
            // and not be able to read the new one, to understand better
            // you can remove the line 76 and line 77 to check it by yourself

    $name = $ln['product_name'];
    $price = number_format($ln['product_price'], 2, ',', '.');
    $subTotal = number_format($ln['product_price']) * $qtd;
    $finalValue += $subTotal;

    echo'<tr>
        <nav>
            <td style="">
                ' . $name . ' 
            </td>
            <td>
                <input " 
                    type="text" 
                    size="3" 
                    name="prod[' . $id . ']" 
                    value="' . $qtd . '"/>
            </td>
            <td>
                $' . $price . '
            </td>
            <td>
                $' . $subTotal . '
            </td>
            <td>
                <a href="?action=del&id=' . $id . '"> <i id="bttRemove" class="fas fa-minus-circle"></i>
                </a>
            </td>
            </tr>
        </nav>';
            }
            
$finalValue = number_format($finalValue, 2, ',', '.');
            echo '
        <tr>
            <td colspan="4">Total
            </td>
            <td>$' . $finalValue . '
            </td>
        </tr>';
}
    ?>
    </tbody>

    </form>


</nav>
