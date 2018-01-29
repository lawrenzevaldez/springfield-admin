<!-- Modal -->
<div id="addAdvisers" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form method="POST" id="addAdviser" enctype="multipart/form-data">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Adviser</h4>
        </div>
        <div class="modal-body">
          <label>Adviser Name:</label>
          <select class="form-control" name="advisername" id="advisername" required="">
            <option value="" selected="">-Select-</option>
            <?php
              include 'config/db.php';

              $query = "SELECT * FROM users";
              $result = $conn->query($query);
              $result->setFetchMode(PDO::FETCH_ASSOC);
              while ($rows = $result->fetch()) 
              {
                echo '<option value="'.$rows['user_name'].'">'.$rows['user_name'].'</option>';
              }

              ?>
          </select>
          <br>
          <label>Club Assgined:</label>
            <select id="clubassigned" name="clubassigned" class="form-control" required="">
              <option value="na" selected="" disabled="">-Select-</option>
              <?php
              include 'config/db.php';

              $query = "SELECT * FROM clubs";
              $result = $conn->query($query);
              $result->setFetchMode(PDO::FETCH_ASSOC);
              while ($rows = $result->fetch()) 
              {
                echo '<option value="'.$rows['club_name'].'">'.$rows['club_name'].'</option>';
              }

              ?>
            </select>
          <br>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="adviser_id" id="adviser_id">
          <input type="hidden" name="operation" id="operation">
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>   
  </div>
</div>