<script type="text/javascript">
<!--
function confirmation() {
	var answer = confirm("Are you sure you want to delete all files?")
	if (answer){
			window.location = "/index.php/upload/do_delete_all";
	}

}
//-->
</script>
<br>
<form>
<input type="button" value="Delete All Files" onClick="confirmation();" />
</form>
<? //return false; window.open ('/index.php/upload/do_delete_all','_self',false); ?>