<!-- Modal -->
<div id="addStudents" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form method="POST" id="addStudent" enctype="multipart/form-data">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Student</h4>
        </div>
        <div class="modal-body">
          <label>First Name:</label>
          <input type="text" name="firstName" id="firstName" class="form-control" required="">
          <br>
          <label>Middle Name:</label>
          <input type="text" name="middleName" id="middleName" class="form-control" required="">
          <br>
          <label>Last Name:</label>
          <input type="text" name="lastName" id="lastName" class="form-control" required="">
          <br>
          <label>Grade:</label>
          <input type="text" name="schoolGrade" id="schoolGrade" class="form-control" required="">
          <br>
          <label>Club:</label>
          <select class="form-control" name="clubassigned" id="clubassigned" required="">
            <option value="" selected="" disabled="">-Select-</option>
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
          <input type="hidden" name="student_id" id="student_id">
          <input type="hidden" name="operation" id="operation">
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>   
  </div>
</div>