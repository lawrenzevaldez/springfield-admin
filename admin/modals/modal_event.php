<!-- Modal -->
<div id="addEvent_Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form method="POST" id="add_event" enctype="multipart/form-data">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Club</h4>
        </div>
        <div class="modal-body">
          <label>Event Date</label>
          <input type="text" name="eventDate" id="eventDate" class="form-control">
          <br>
          <label>Event Title</label>
          <input type="text" name="eventTitle" id="eventTitle" class="form-control">
          <br>
          <label>Event Description</label>
          <textarea name="eventTextArea" id="eventTextArea" class="form-control" rows="5"></textarea>
          <br>
          <label>Event Status</label>
          <select id="eventStatus" name="eventStatus" class="form-control" required="">
              <option value="1" selected="">Show</option>
              <option value="0">Hide</option>
            </select>
          <br>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="event_id" id="event_id">
          <input type="hidden" name="operation" id="operation">
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>   
  </div>
</div>