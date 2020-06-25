<div class="modal fade" id="add_diversity_modal" taria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Diversity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="was-validated" action="./includes/diversities.php" method="post">
          <div class="form-group">
            <label for="name">Name</label>
            <input required type="text" class="form-control" id="name" name="name" placeholder="Enter Diverisity Name">
            <div class="invalid-feedback">Please Enter Diversity Name</div>
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" name='enable' value='1'>
            <label class="form-check-label text-dark" for="enable">Enable</label>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>