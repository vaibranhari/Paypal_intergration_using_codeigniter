<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paypal</title>
</head>
<body>
    <form action="<?php echo base_url().'Paypal/buy'; ?>" method="post">
    <h4 style="text-align: center;">You can Buy whatever you think</h4>
    <div style="text-align: center;">
        <p style="margin-bottom: 0;">Enter the Product name </p>
        <input type="text" name="name">
        <p style="margin-bottom: 0;">Enter the quntity</p>
        <input type="number" name="it">
        <p style="margin-bottom: 0;">Enter the amount</p>
        <input type="number" name="amt">
        <!-- <p>Enter the Currency type</p>
        <input type="text"> -->
        <div style="text-align: center; margin-top:20px;">
        <input type="submit" value="Buy Now">
        </div>
    </div>
</form>
</body>
</html>