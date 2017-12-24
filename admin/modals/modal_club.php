<!-- Modal -->
<div id="addClub" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form method="POST" id="add_club" enctype="multipart/form-data">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Club</h4>
        </div>
        <div class="modal-body">
          <label>Club Name</label>
          <input type="text" name="clubname" id="clubname" class="form-control">
          <br>
          <label>Club Info</label>
          <textarea name="clubinfo" id="clubinfo" class="form-control" rows="5"></textarea>
          <br>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="club_id" id="club_id">
          <input type="hidden" name="operation" id="operation">
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>   
  </div>
</div>