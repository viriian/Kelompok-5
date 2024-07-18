<?php 
require "../../config/config.php"; 

$nimMember = $_GET["id"];
if(deleteMember($nimMember) > 0) {
    echo "<script>
    alert('Member berhasil dihapus!');
    document.location.href = 'member.php';
    </script>";
  }else {
    echo "<script>
    alert('Member gagal dihapus!');
    document.location.href = 'member.php';
    </script>";
}
?>
