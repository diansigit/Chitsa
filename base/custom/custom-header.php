<?php 
$font_color = theme_options('sidebar', 'font_color');

?>
<style type="text/css">

</style>

<script type="text/javascript">
(function(){
	conditionizr();
})();

<?php 
	$font_size_normal = theme_options('content', 'font_size_small');
	$font_size_medium = theme_options('content', 'font_size_medium');
	$font_size_large  = theme_options('content', 'font_size_large');
?>

var home_url = '<?php echo home_url(); ?>/',
	ajax_url = '<?php echo home_url()."/wp-admin/admin-ajax.php"; ?>';
var font_size_small = <?php echo $font_size_normal; ?>,
	line_height_small = <?php echo ($font_size_normal+4); ?>,
	font_size_medium = <?php echo $font_size_medium; ?>,
	line_height_medium = <?php echo ($font_size_medium+4); ?>,
	font_size_large = <?php echo $font_size_large; ?>,
	line_height_large = <?php echo ($font_size_large+4); ?>;
</script>