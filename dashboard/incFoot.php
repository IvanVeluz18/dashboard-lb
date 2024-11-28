<link href="../assets/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="../assets/custom.css" rel="stylesheet">
<link href="../assets/select2.min.css" rel="stylesheet">
<link href="../assets/datatables.min.css" rel="stylesheet">
<link href="../assets/fontawesome/css/all.min.css" rel="stylesheet">

<script src="../assets/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="../assets/custom.js" crossorigin="anonymous"></script>
<script src="../assets/select2.full.min.js" crossorigin="anonymous"></script>
<script src="../assets/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../assets/datatables.min.js" crossorigin="anonymous"></script>

<script>
$(()=>{

 alert = "<?=$AlertMsg?>";
 if (alert != "") msgbox(alert);

 $('.btn-go').removeClass('disabled');
 
});
</script>

<style>
h3 { color:#198754 !important }
</style>

</body>
</html>