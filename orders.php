<html>
<head>
  <title> Order List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin/css/style.css">
</head>
<body>

<div class="nevigation">
  <a href="category-list.php">Manage Category</a>
  <a href="product-list.php">Manage Product</a>
 <a href="orders.php">Manage Orders</a>
  <a href="logout.php">Logout</a>
</div>
<h1 align="center"> Order List </h1>
<?php 
  include("admin/confs/Connection.php");
  $orders= $conn->query("SELECT * FROM orders");
?>
<ul class="orders">
  <?php while($order=$orders->fetch(PDO::FETCH_ASSOC))
  { 
    ?>
      <?php if($order['status']):?>
      <li class="delivered">
      <?php else: ?>
     <li>
      <?php endif; ?>
   
     <div class="order">
         <b>Name:<?php echo $order['name']?></b>
         <i>Email:<?php  echo $order['email']?></i>
         <span>Phone:<?php echo $order['phoneno']?></span>
         <p>Address:<?php echo $order['address']?></p>
         <?php if($order['status']): ?>

			<a href="order-status.php?id=<?php echo $order['id'] ?>&status=0">
            Undo</a>
         <?php else: ?>
            <a href="order-status.php?id=<?php echo $order['id'] ?>&status=1">
            Mark as delivered</a>
            <?php  endif; ?>
       </div>   
        <div class="items">
           <?php 
               $order_id=$order['id'];
               $items= $conn->query("SELECT order_items.*, types.product_name FROM order_items
                   LEFT JOIN types ON order_items.type_id=types.id WHERE order_items.order_id=$order_id
                   ");              
             while($item=$items->fetch(PDO::FETCH_ASSOC)){
               ?>
             <b>
               <?php  echo $item['product_name'] ?>
               ( <?php  echo $item['qty']?>)
            </b> 
            <?php }?>        
        </div>  
         </li>
         <?php }?>
</ul>
</body>
</html>




