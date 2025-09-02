<?php

    $product_name = "";
    $category = "";
    $price = "";
    $stock_quantity = "";
    $expiration_date = "";
    $status = "";
    $product_name_error = "";
    $category_error = "";
    $price_error = "";
    $stock_quantity_error = "";
    $expiration_date_error = "";
    $status_error = "";
    $has_error = false;

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_name = trim(htmlspecialchars($_POST["product_name"]));
        $category = trim(htmlspecialchars($_POST["category"]));
        $price = trim(htmlspecialchars($_POST["price"]));
        $stock_quantity = trim(htmlspecialchars($_POST["stock_quantity"]));
        $expiration_date = trim(htmlspecialchars($_POST["expiration_date"]));
        $status = trim(htmlspecialchars($_POST["status"] ?? ""));

            if(empty($product_name)) {
                $product_name_error = "Product name is required.";
                $has_error = true;
            }

            if(empty($category)) {
                $category_error = "Category is required.";
                $has_error = true;
            }

            if(empty($price)) {
                $price_error = "Price is required.";
                $has_error = true;
            }
                elseif(!is_numeric($price) || $price < 0) {
                    $price_error = "The Price must be a number and greater than 0.";
                    $has_error = true;
                }

            if(empty($stock_quantity)) {
                $stock_quantity_error = "Stock quantity is required.";
                $has_error = true;
            }
                elseif(!is_numeric($stock_quantity) || $stock_quantity < 0) {
                    $stock_quantity_error = "The Stock Quantity must be a number and is not negative.";
                    $has_error = true;
                }

            if(empty($expiration_date)) {
                $expiration_date_error = "Expiration date is required.";
                $has_error = true;
            }
                elseif(strtotime($expiration_date) <= strtotime(date("Y-m-d"))) {
                    $expiration_date_error = "The Product must not be expired!";
                    $has_error = true;
                }

            if(empty($status)) {
                $status_error = "Status is required.";
                $has_error = true;
            }

        if(!$has_error) {
            header("Location: redirect.php");
            exit;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyProject</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<!--
The GET method makes it so that any data you have entered will display it to the URL while
the POST method makes it so that it hides the data you have entered, not showing in the URL.
-->
    <form action="" method="post">
        <form action="viewproduct.php" method="post">
        <label>Product Name: </label><br>
        <input type="text" name="product_name" value="<?php echo $product_name ?>"><br>
        <p style="color:red; margin:0;"><?php echo $product_name_error ?? ""; ?></p>

        <label>Category: </label><br>
        <select name="category" required>
            <option value="">--Select Category--</option>
            <option value="Category A" <?php if($category == "Category A") echo "selected"; ?>>Category A</option>
            <option value="Category B" <?php if($category == "Category B") echo "selected"; ?>>Category B</option>
            <option value="Category C" <?php if($category == "Category C") echo "selected"; ?>>Category C</option>
            <option value="Category D" <?php if($category == "Category D") echo "selected"; ?>>Category D</option>
        </select><br>
        <p class="error"><?php echo $category_error ?? ""; ?></p>


        <label>Price(&#8369;)</label><br>
        <input type="number" name="price" step="0.01" value="<?php echo $price ?>"><br>
        <p class="error"><?php echo $price_error ?? ""; ?></p>

        <label>Stock Quantity</label><br>
        <input type="number" name="stock_quantity" min="0" value="<?php echo $stock_quantity ?>"><br>
        <p class="error"><?php echo $stock_quantity_error ?? ""; ?></p>

        <label>Expiration Date:</label><br>
        <input type="date" name="expiration_date" value="<?php echo $expiration_date ?>"><br>
        <p class="error"><?php echo $expiration_date_error ?? ""; ?></p>

        <label>Status:</label><br>
        <input type="radio" name="status" value="active" <?php if($status == "active") echo "checked"; ?>> Active<br>
        <input type="radio" name="status" value="inactive" <?php if($status == "inactive") echo "checked"; ?>> Inactive<br>
        <p class="error"><?php echo $status_error ?? ""; ?></p>
        <input type="submit" value="Save Product">
    </form>
</body>
</html>