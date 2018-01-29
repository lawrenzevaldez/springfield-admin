<!-- Modal -->
<div id="addAccount" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form method="POST" id="add_account" enctype="multipart/form-data">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Account</h4>
        </div>
        <div class="modal-body">
          <label>Username</label>
          <input type="text" name="username" id="username" class="form-control">
          <br>
          <label>Password</label>
          <input type="password" name="password" id="password" class="form-control">
          <br>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="account_id" id="account_id">
          <input type="hidden" name="operation" id="operation">
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>   
  </div>
</div>