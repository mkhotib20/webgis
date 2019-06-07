<!DOCTYPE html>
<html>
<head>
	<title>Potensi Wilayah</title>
	<?php include 'rel.php' ?>
</head>
<body>

<section class="homepage" >
	<div class="row no-gutters">
		<div class="col-md-7"></div>
		<div class="col-md-5">
			<div class="main-text">
				<h1>PETA <br>POTENSI <br>KECAMATAN <br>MAGERSARI </h1>
				<h3>Kelurahan Balongsari, <br>Kedundung, Wates <br>(Kecamatan Magersari, <br>Kota Mojokerto)</h3>
			</div>
		</div>
		<div class="col-md-12">
		<center><a href="#" class="arrowDown" ><span class="fas fa-angle-double-down"></span></a ></center>
		</div>
		
	</div>
</section>
<?php include 'nav.php' ?>
<section id="kec" class="kecamatan">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="kec-judul">
					<h1>KECAMATAN MAGERSARI</h1>
					<h2>KOTA MOJOKERTO</h2>
				</div>
			</div>
			<div class="col-md-6">
				<a href="#">
					<img style="width: 80%" id="myImgId" src="<?php echo base_url('assets/img/kec.png') ?>">
					
				</a>
			</div>
		</div>
		
	</div>
</section>

</body>
<?php include 'script.php' ?>

<script type="text/javascript">
	$('#myImgId').mousemove(function(){
		var PosX = 0;
		  var PosY = 0;
		  var ImgPos;
		  ImgPos = FindPosition(this);
		  if (!e) var e = window.event;
		  if (e.pageX || e.pageY)
		  {
		    PosX = e.pageX;
		    PosY = e.pageY;
		  }
		  else if (e.clientX || e.clientY)
		    {
		      PosX = e.clientX + document.body.scrollLeft
		        + document.documentElement.scrollLeft;
		      PosY = e.clientY + document.body.scrollTop
		        + document.documentElement.scrollTop;
		    }
		  PosX = PosX - ImgPos[0];
		  PosY = PosY - ImgPos[1];
		  if (PosX>239 && PosX<576 && PosY > 221 && PosY < 346) {
		  	$(this).attr('src', '<?php echo base_url('assets/img/kedundung.png') ?>')
		  	$(this).parents('a').attr('href', '<?php echo base_url('map/kedundung#15/-7.4626/112.4596') ?>')
			  
		  }
		  else if(PosX>125 && PosX<233 && PosY > 224 && PosY < 406){
		  	$(this).attr('src', '<?php echo base_url('assets/img/balong.png') ?>')
		  	$(this).parents('a').attr('href', '<?php echo base_url('map/wates#15/-7.4570/112.4499') ?>')
			  
		  }
		  else if(PosX>207 && PosX<397 && PosY > 65 && PosY < 232){
		  	$(this).attr('src', '<?php echo base_url('assets/img/wates.png') ?>')
		  	$(this).parents('a').attr('href', '<?php echo base_url('map/balongsari#15/-7.4719/112.4514') ?>')
			  
		  }
		  else{
		  	$(this).attr('src', '<?php echo base_url('assets/img/kec.png') ?>')
		  	$(this).parents('a').attr('href', '#')
			}
	})


</script>
<script type="text/javascript">

function FindPosition(oElement)
{
  if(typeof( oElement.offsetParent ) != "undefined")
  {
    for(var posX = 0, posY = 0; oElement; oElement = oElement.offsetParent)
    {
      posX += oElement.offsetLeft;
      posY += oElement.offsetTop;
    }
      return [ posX, posY ];
    }
    else
    {
      return [ oElement.x, oElement.y ];
    }
}

</script>

</html>