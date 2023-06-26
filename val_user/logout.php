/* Destroy current user session */

<?php
session_start();
session_unset($_SESSION['email']);
session_destroy();

echo'<script type="text/javascript">
window.location.href="../index.php";</script>';
?>