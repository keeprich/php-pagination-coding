<?php
include_once'dbConnection.php';

// PAGINATION CODING START
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

// number of pages wishing to display on the browser
$num_per_page = 01;
$start_form = ($page -1) * 01;


// PAGINATION CODING ENDS

// QUERY FOR PAGINATION IN PHP
$query = "SELECT * FROM toys LIMIT $start_form, $num_per_page";


// $query = "SELECT * FROM toys";
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <title>Pagination</title>

    <style>
    .btn {
        margin:10px;
    }
    </style>
</head>
<body>


<table class="table table-striped">
<tr>
<td><strong>Product id</strong></td>
 <td><strong>Product name</strong></td>
 <td><strong>Product code</strong></td>
 <td><strong>Product category</strong></td>
 <td><strong>Product price</strong></td>
 <td><strong>Product stock_count</strong></td>
</tr>

<tr>
<?php
    while($row=mysqli_fetch_assoc($result)){
     ?>


<td> <?php echo $row['id'] ?></td>
 <td><?php echo $row['name'] ?></td>
 <td><?=$row['code'] ?></td>
 <td><?=$row['category'] ?></td>
 <td><?=$row['price'] ?></td>
 <td><?=$row['stock_count'] ?></td>

</tr>

<?php   } ?>

</table>

<!-- PAGINARION CONT. -->

<?php
$pr_query = "SELECT * FROM toys";
$pr_result = mysqli_query($conn, $pr_query);

// CHECKING THE TOTAL NUMBER OF RECORDS
$total_record = mysqli_num_rows($pr_result);
// echo $total_record;
$total_page = ceil($total_record/$num_per_page);
// echo $total_page;

if($page > 1) {
    echo "<a href='index.php?page=".($page - 1)."' class='btn btn-danger'>Prev</a>";

}

for($i = 1; $i < $total_page; $i++ ) {
    // echo "<a href='index.php?page=".$i."' class='btn btn-primary'>$i</a>";

}

if($i > $page) {
    echo "<a href='index.php?page=".($page + 1)."' class='btn btn-danger'>Next</a>";

}

elseif($i = $page) {
    echo "<a href='index.php?page=".($page + 1)."' class='btn btn-info'>Submit</a>";

}

?>

<!-- PAGINARION CONT. -->


<!-- echo "<a href="index.php?page=".$i.""></a>" -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    
</body>
</html>