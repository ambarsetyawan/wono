<html>
      <head>
        <title>SIM Pelayanan KPPT</title>
		<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img" type="image/x-icon" />
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
		
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
		
		<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        
		<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.file-input.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.selectBoxIt.min.js"></script>
	
		<script>
			$(function(){$.fn.bootstrapFileInput=function(){this.each(function(i,elem){var $elem=$(elem);if(typeof $elem.attr('data-bfi-disabled')!='undefined'){return;}
			var buttonWord='Browse';if(typeof $elem.attr('title')!='undefined'){buttonWord=$elem.attr('title');}
			var input=$('<div>').append($elem.eq(0).clone()).html();var className='';if(!!$elem.attr('class')){className=' '+$elem.attr('class');}
			$elem.replaceWith('<a class="file-input-wrapper btn'+className+'">'+buttonWord+input+'</a>');}).promise().done(function(){$('.file-input-wrapper').mousemove(function(cursor){var input,wrapper,wrapperX,wrapperY,inputWidth,inputHeight,cursorX,cursorY;wrapper=$(this);input=wrapper.find("input");wrapperX=wrapper.offset().left;wrapperY=wrapper.offset().top;inputWidth=input.width();inputHeight=input.height();cursorX=cursor.pageX;cursorY=cursor.pageY;moveInputX=cursorX-wrapperX-inputWidth+20;moveInputY=cursorY-wrapperY-(inputHeight/2);input.css({left:moveInputX,top:moveInputY});});$('.file-input-wrapper input[type=file]').change(function(){var fileName;fileName=$(this).val();$(this).parent().next('.file-input-name').remove();if(!!$(this).prop('files')&&$(this).prop('files').length>1){fileName=$(this)[0].files.length+' files';}
			else{fileName=fileName.substring(fileName.lastIndexOf('\\')+1,fileName.length);}
			$(this).parent().after('<span class="file-input-name">'+fileName+'</span>');});});};var cssHtml='<style>'+'.file-input-wrapper { overflow: hidden; position: relative; cursor: pointer; z-index: 1; }'+'.file-input-wrapper input[type=file], .file-input-wrapper input[type=file]:focus, .file-input-wrapper input[type=file]:hover { position: absolute; top: 0; left: 0; cursor: pointer; opacity: 0; filter: alpha(opacity=0); z-index: 99; outline: 0; }'+'.file-input-name { margin-left: 8px; }'+'</style>';$('link[rel=stylesheet]').eq(0).before(cssHtml);});
		</script>
		<script>
			$(document).ready(function(){$('input[type=file]').bootstrapFileInput();});
		</script>
      </head>

<body>
<div class="">
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</a>
		<img class="brand logonav"src="<?php echo base_url(); ?>/assets/img/logo.png">	
		<a class="brand" href="#">SIM Pelayanan KPPT</a>
		<?php foreach($user as $data): ?>
			<div class="nav-collapse collapse">
				<ul class="nav pull-right">
					<li class="dropdown">
					<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon-user icon-white"></i> <?php echo $data->profil_nama; ?> <strong class="caret"></strong></a>
					<div class="dropdown-menu">
						<form method="post">
							<div class="span4 wellku">
								<div class="row">
									<div class="span1"><a href="#" class="thumbnail"><img src="<?php echo base_url(); ?>assets/img/<?php echo $data->profil_avatar; ?>"></a></div>
									<div class="span3">
										<p><strong>Online KPPT</strong><br><?php echo $data->profil_nama; ?><br></p>
										<a class="btn btn-primary" href="ubahpengguna.php"><i class="icon-wrench icon-white"></i>Ubah</a>  
										<a class="btn btn-warning"href="<?php echo base_url(); ?>index.php/login/logout"><i class="icon-user icon-white"></i>Keluar</a>
									</div>
								</div>
							</div>
						</form>
					</div>
					</li>
				</ul>
			</div>
		<?php endforeach; ?>		
		</div>
	</div>
</div>