<?php
include('connection.php'); //include connection

$sql = "CALL selectCart()";//call the sql
$result = mysqli_query($conn, $sql); // scan the sql
echo '<div class="flexStore">'; // div so i can use flex
while ($rows = mysqli_fetch_assoc($result)) { //display on all the rows with prices / pics / names.
    echo'
    
    <div class="store"> 
    <div id="storeImg"> <img src="../images/'.$rows['product_img'].'"/> </div> <br />
    <div id="storeName"> '.$rows['product_name'].' </div> 
    <div id="storeDescription"> '.$rows['product_description'] .' </div> <br /> 
    <div id="storePrice">$'. number_format($rows['product_price'], 2, ',', '.') .' </div><br /> 
    <div id="storeBuy"> <a href ="../html/order.php?action=add&id=' . $rows['product_id'] . '"><i class="far fa-money-bill-alt"></i> </a></div>
    
    </div>';

}
echo'</div>';
?>

