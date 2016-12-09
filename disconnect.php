<?php
if ($result) {
  mysqli_free_result($result);
}
mysqli_close($conn);
?>
