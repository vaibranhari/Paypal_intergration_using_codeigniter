<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  table,th,td{
    border:2px groove black;
    border-collapse: collapse;
    padding: 22px;
  }
  table{
    margin-top: 80px;
    margin-left: 20px;
    object-position: center;
  }
  .head{
    background-color: #f45353;
  }
  .h2{
    background-color:#d6d1d1;
    text-align: center;
  }
  .wo{
    color: blue;
  }
  .bo{
    padding: 8px;
    background-color: green;
    border:1px solid green;
    color:black;
    border-radius: 5px;
    cursor:pointer;
  }
  .bo:hover{
    opacity: 0.7;
  }
  .bo:active{
    border:1px solid black;
    color: blue;
    background-color: white;
  }
  .user{
    padding:15px;
    background-color: black;
    color: white;
    margin-left: 80%;
  }
  .btn:visited{
    color:#38BA15;
  }
  .btn{
    color:#38BA15;
    text-decoration: none;
  }
  .btn:active{
  color:blue;
  }
  .btn:hover{
    text-decoration: underline;
    font-weight: 550;
  }
</style>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

</head>
<body>
 <title> table</title>
  <table id="table">
  <thead>
    <tr>
      <th class="head">ID</th>
      <th class="head">txn_id</th>
      <th class="head">payment_amt</th>
      <th class="head">currency_code</th>
      <th class="head">status</th>
      <th class="head">payer_email</th>
      <th class="head">payer_id</th>
      <th class="head">payment_date</th>
      <th class="head">receiver_id</th> 
    </tr>
  </thead>
  <tbody>

<?php foreach ($payment as $row): ?>
<tr>
<td class="h3"><?php echo $row['id'];?></td>
<td class="h2"><?php echo $row['txn_id']; ?></td>
<td class="h3"><?php echo $row['payment_amt'];?></td>
<td class="h2"><?php echo $row['currency_code'];?></td>
<td class="h3"><?php echo $row['status']; ?></td>
<td class="h2"><?php echo $row['payer_email']; ?></td>
<td class="h3"><?php echo $row['payer_id']; ?></td>
<td class="h2"><?php echo $row['payment_date']; ?></td>
<td class="h3"><?php echo $row['receiver_id']; ?></td>

      </tr>
  <?php endforeach; ?> 
</tbody>
</table>
</div>


<script>
$(document).ready( function () {
    $('#table').DataTable();
} );
</script>
 

</body>
</html>