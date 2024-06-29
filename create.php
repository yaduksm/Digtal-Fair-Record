<?php


session_start();
$p=$_SESSION["per"];
// PHP code
echo <<<EOD
<script>
  alert("Plagiarism Percentage "+$p+"%");
</script>
EOD;
?>