<?php
require_once './includes/db_connection.php';

$diversities = mysqli_query($conn, "SELECT name FROM diversities");
if (mysqli_num_rows($diversities) > 0) {
  $rows = array();
  while ($row = mysqli_fetch_assoc($diversities)) {
    $rows[] = $row;
  }
  $rows = json_encode($rows, JSON_UNESCAPED_UNICODE);
}
?>

<div class="modal fade shadow" id="edit_item_modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="was-validated" action="./includes/items.php" method="POST">
          <input hidden name='edit_item_id' id="edit_item_id">
          <div class="form-group">
            <label for="catalog_number">Catalog Number</label>
            <input type="text" class="form-control" id="item_catalog_number" name="catalog_number" placeholder="Enter Catalog Number" pattern="^[1-9]\d*$">
            <div class="invalid-feedback">Please Enter A Number</div>
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input required type="text" class="form-control" id="item_name" name="name" placeholder="Enter Name">
            <div class="invalid-feedback">Please Enter Item Name</div>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input required type="text" class="form-control" id="item_price" name="price" placeholder="Enter price" pattern="^[1-9]\d*$">
            <div class="invalid-feedback">Please Enter A Number</div>
          </div>
          <div class="form-group">
            <label for="diversity">Item Diversity</label>
            <select required class="custom-select" id='item_diversity' name='diversity'>
              <option value="">Please Select Diversity</option>
              <?php
              $rows = json_decode($rows);
              foreach ($rows as $value) {
                echo "<option value ='$value->name'>" . str_replace('_', ' ', $value->name) . "</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="item_vat" name="has_vat" value='1'>
            <label class="form-check-label text-dark" for="vat">Vat</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="item_enable" name='enable' value='1'>
            <label class="form-check-label text-dark" for="enable">Enable</label>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-success">Edit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>