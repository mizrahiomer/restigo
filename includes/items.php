<?php
require_once 'db_connection.php';


$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {

  if (isset($_GET['edit_item_id'])) {
    $id = $_GET['edit_item_id'];
    $sql = "SELECT * FROM items WHERE catalog_number = '" . $id . "'";
    $item = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($item);
    $row['has_vat'] = $row['has_vat'] == 1 ? true : false;
    $row['enable'] = $row['enable'] == 1 ? true : false;
    echo json_encode($row, JSON_UNESCAPED_UNICODE);
  } else {
    $items = mysqli_query($conn, "SELECT * FROM items");
    if (mysqli_num_rows($items) > 0) {
      $rows = array();
      while ($row = mysqli_fetch_assoc($items)) {
        $row['has_vat'] = $row['has_vat'] == 1 ? true : false;
        $row['enable'] = $row['enable'] == 1 ? true : false;
        $rows[] = $row;
      }
      echo json_encode($rows, JSON_UNESCAPED_UNICODE);
    } else {
      echo -1;
    }
  }
} else if ($method === 'POST') {

  if (isset($_POST['name']) && isset($_POST['catalog_number']) && isset($_POST['price']) && isset($_POST['diversity'])) {

    $name = ucwords($_POST['name']);
    $catalog_number = $_POST['catalog_number'];
    $price = $_POST['price'];
    $has_vat = !isset($_POST['has_vat']) ? 0 : 1;
    $enable = !isset($_POST['enable']) ? 0 : 1;
    $diversity = $_POST['diversity'];


    if (isset($_POST['edit_item_id'])) {
      $id = $_POST['edit_item_id'];
      $sql = "Update items Set name='$name',catalog_number=$catalog_number,price=$price, has_vat=$has_vat ,enable=$enable Where catalog_number=$id";
      $sql2 = "Update diversities_items set item_id=$id, diversity_name='$diversity' Where item_id = $id";
    } else {
      $sql = "Insert into items (name, catalog_number, price, has_vat, enable) values ('$name', $catalog_number, $price, $has_vat, $enable)";
      $sql2 = "Insert into diversities_items (item_id, diversity_name) values ($catalog_number, '$diversity')";
    }
  } else if (isset($_POST['delete_item_id'])) {
    $id = $_POST['delete_item_id'];
    $sql = "Delete from items Where catalog_number=$id";
    $sql2 = "Delete from diversities_items Where item_id=$id";
  }

  $items = mysqli_query($conn, $sql);
  $items_diversities = mysqli_query($conn, $sql2);

  if ($items && $items_diversities) {
    header('location:../index.php');
  } else {
    echo "<script type='text/javascript'>
      alert('Item Allready Exist');
      window.location = '../index.php';
     </script>";
  }
}
