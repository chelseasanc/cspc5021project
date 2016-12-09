<?php
  $sql = "SELECT RACE_CODE, RACE_NAME FROM RACE";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_row($result)) {
    echo "<input name=\"race[]\" type=\"checkbox\" value=" . $row[0] . "'>" . $row[1] . "</input>\n";
  }
  } else {
    echo "0 results";
  }
?>
