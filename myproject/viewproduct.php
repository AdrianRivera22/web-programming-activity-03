

<label for="">Product Name: <?php echo htmlspecialchars($_POST ["product_name"]); ?></label><br>
<label for="">Category: <?php echo htmlspecialchars($_POST ["category"]); ?></label><br>
<label for="">Price: <?php echo htmlspecialchars(number_format($_POST ["price"], 2)); ?></label><br>
<label for="">Stock Quantity: <?php echo htmlspecialchars($_POST ["stock_quantity"]); ?></label><br>
<label for="">Expiration Date: <?php echo htmlspecialchars(date("M-d-Y", strtotime($_POST ["expiration_date"]))); ?></label><br>
<label for="">Status: <?php echo htmlspecialchars($_POST ["status"]); ?></label><br>

