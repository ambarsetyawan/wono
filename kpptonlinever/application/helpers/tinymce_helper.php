<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function initialize_tinymce() {
$tinymce = '<script type="text/javascript" src="' . base_url() . 'assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
   
	 selector: "textarea",

	plugins: [
	"advlist autolink lists link image charmap print preview anchor",
	"searchreplace visualblocks code fullscreen",
	"insertdatetime media table contextmenu paste jbimages"
	],

	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

	relative_urls: false
 });
</script>
';
return $tinymce;
 
}
