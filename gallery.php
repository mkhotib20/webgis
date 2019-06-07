<!DOCTYPE html>
<html>
<head>
	<title>Potensi Wilayah</title>
	<?php include 'rel.php' ?>
</head>
<body>
<style>
    .main-content {
        position: relative;
    }
    .main-content .owl-theme .custom-nav {
        position: absolute;
        top: 35%;
        left: 0;
        right: 0;
    }
    .main-content .owl-theme .custom-nav .owl-prev, .main-content .owl-theme .custom-nav .owl-next {
        position: absolute;
        color: inherit;
        background: none;
        border: none;
        z-index: 100;
    }
    .main-content .owl-theme .custom-nav .owl-prev span, .main-content .owl-theme .custom-nav .owl-next span {
        font-size: 2.5rem;
        background-color: rgba(255,255,255,0.7);
        padding: 10px;
        color: #666;
        font-size: 29px;
    }
    .main-content .owl-theme .custom-nav .owl-prev {
        left: 0;
    }
    .main-content .owl-theme .custom-nav .owl-next {
        right: 0;
    }
    
</style>
<?php include 'nav.php' ?>

<section id="kec" class="kecamatan">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
            <center><h2>Gallery</h2></center>
            <br>
            <div class="main-content">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="<?php echo base_url('assets/img/balong-bg.png') ?>" alt="Picture 1">
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url('assets/img/kedondong-bg.png') ?>" alt="Picture 1">
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url('assets/img/wates-bg.png') ?>" alt="Picture 1">
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url('assets/img/balong-bg.png') ?>" alt="Picture 1">
                    </div>
                </div>
                <div class="owl-theme">
                    <div class="owl-controls">
                        <div class="custom-nav owl-nav"></div>
                    </div>
                </div>
            </div>
			</div>
		</div>
		
	</div>
</section>

</body>
<?php include 'script.php' ?>

<script>
$('.main-content .owl-carousel').owlCarousel({
    stagePadding: 20,
    loop: true,
    margin: 10,
    nav: true,
    navText: [
        '<span class="fa fa-angle-left control" aria-hidden="true"></span>',
        '<span class="fa fa-angle-right control" aria-hidden="true"></span>'
    ],
    navContainer: '.main-content .custom-nav',
    responsive:{
        0:{
            items: 1
        },
        480:{
            items: 1
        },
        1000:{
            items: 2
        }
    }
});
</script>

</html>