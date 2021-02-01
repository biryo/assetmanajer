<?php
    if(!empty($_SESSION['notifmsg'])){
        $notifmsg = $_SESSION['notifmsg'];
        $this->notifmsg($notifmsg);
        unset($_SESSION['notifmsg']);
    }
?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="#">ASSET Management</a>.</strong> All rights reserved.
</footer>
</div>
<!-- Ajax Calculation -->
<!-- jQuery 2.1.3 -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="asset/js/autocalc/jautocalc.js"></script>
<!--<script src="templates/bootstrap/01/plugins/jQuery/jQuery-2.1.3.min.js"></script>-->
<!-- jQuery UI 1.11.2 -->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- ajax hint search -->
    <script src="asset/js/typeahead.min.js"></script>
    <!-- end ajax hint -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.2 JS -->
<script src="templates/bootstrap/01/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
<!-- Morris.js charts -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- <script src="templates/bootstrap/01/plugins/morris/morris.min.js" type="text/javascript"></script> ERROR Console Not Defiend-->
<!-- Sparkline -->
<script src="templates/bootstrap/01/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="templates/bootstrap/01/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="templates/bootstrap/01/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="templates/bootstrap/01/plugins/knob/jquery.knob.js" type="text/javascript"></script>
<!-- InputMask -->
<script src="templates/bootstrap/01//plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="templates/bootstrap/01//plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="templates/bootstrap/01//plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="templates/bootstrap/01/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="templates/bootstrap/01/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="templates/bootstrap/01/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="templates/bootstrap/01/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- Slimscroll -->
<script src="templates/bootstrap/01/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='templates/bootstrap/01/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="templates/bootstrap/01/dist/js/app.min.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="templates/bootstrap/01/dist/js/pages/dashboard.js" type="text/javascript"></script> ERROR Console Not Defiend-->

</html>
