<footer class="footer text-right">
                    <?php echo date('Y');?> © 
                </footer>
<script>
function hide_hint() {
	$.ajax({
	type: "POST",
	url: 'ajax.php',
	data:'hide_hint='+1,
	success: function(data){
		$().html(data);
	}
	});
}
</script>