<?php
// Start the session
session_start();
?>


<?php
// initialize shopping cart class
include 'Cart.php';
$cart = new Cart;
// include database configuration file
include 'connector.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get product details
        $query = $dbconn->query("SELECT * FROM products WHERE product_ID = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['product_ID'],
            'userID' => $row['user_ID'],
            'name' => $row['productName'],
            'price' => $row['price'],
            'qty' => 1
        );
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'viewCart.php':'index.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: viewCart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['user_ID'])){
      // insert order details into database
        $insertOrder = $dbconn->query("INSERT INTO orders (user_ID, total_price, created, modified, order_process) VALUES ('".$_SESSION['user_ID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."', 'Processing')");
        if($insertOrder){
            $orderID = $dbconn->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (order_id, Seller_ID, product_ID, qty) VALUES ('".$orderID."','".$item['userID']."', '".$item['id']."', '".$item['qty']."');";

                $_SESSION["orderID1"] = $orderID;

            }

            // insert order items into database
            $insertOrderItems = $dbconn->multi_query($sql);
            if($insertOrderItems){
              $cart->destroy();

                include 'buyertest.php';
                header("Location: orderSuccess.php?id=$orderID");
                include 'sellertest.php';
            }else{
                header("Location: checkout.php");
            }
        }else{
            header("Location: checkout.php");
        }
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}
