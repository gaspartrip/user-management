<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
    <p class="text-center text-white">Copyright &copy; Gaspar 2019</p>
    </div>
</footer>

<!-- "Alertify" messages -->
<?php
if(isset($message) && isset($messageType)) {
    if($messageType == 0) {
        echo "<script> alertify.error('" . $message . "'); </script>";
    }
    else if($messageType == 1) {
        echo "<script> alertify.success('" . $message . "'); </script>";
    }
}
?>

<!-- Bootstrap core JavaScript -->
<script src="<?= STYLE_PATH; ?>jquery/jquery.min.js"></script>
<script src="<?= STYLE_PATH; ?>bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="<?= STYLE_PATH; ?>jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="<?= STYLE_PATH; ?>js/scrolling-nav.js"></script>

</body>
</html>
