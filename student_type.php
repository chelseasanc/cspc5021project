<?php
  $sql = "SELECT STUDENT_TYPE_ID, STUDENT_TYPE_NAME FROM STUDENT_TYPE";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
  echo "<select name='student_type'>\n";
  while($row = mysqli_fetch_row($result)) {
    echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>\n";
  }
  echo "</select>\n";
  } else {
    echo "0 results";
  }
?>
