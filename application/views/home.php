<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.hasthemes.com/belly-v5/belly/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2019 10:54:48 GMT -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/plugins/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/plugins/fontawesome-free/css/all.min.css" />
  <link href="<?php echo base_url(); ?>assets/front/plugins/ion-font/css/ionicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/plugins.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/main.css" />
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/front/image/favicon.ico">
  <title>Sumber Pangan Sukses</title>
</head>

<body class="belly-light-version belly-color-chocolate">
  <div class="site-wrapper belly-homepage-white">
    <header class="site-header sticky-init fixed-header header-4 site-header--right-menu ">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-2 col-6 order-first">
              <div class="site-brand">
                <a href="index4.html" class="brand_logo">
                  <img src="" alt="">
                </a>
              </div>
            </div> 
            <div class="col-lg-1 col-6 order-lg-3">
              <div class="header-right-options">
      </div>
            </div>
            <div class="col-lg-10 col-12 order-lg-2 position-mobile">
              <div class="mean-wrapper">
                <nav class="mean-active">
                    <ul class="main-menu">
        <li class="menu-item has-dropdown normal-dropdown"><a href="#home-menu" class="menu-link"><span>Home</span></a>
        </li>
        <li class="menu-item has-dropdown mega-menu"><a href="#about-menu" class="menu-link"><span>About</span></a>
        </li>
        <li class="menu-item has-dropdown normal-dropdown"><a href="#product-menu" class="link menu-link"><span>Recent Product</span></a>
        </li>
        <li class="menu-item has-dropdown normal-dropdown"><a href="#testimoni-menu" class="menu-link"><span>Testimoni</span></a>
        </li>
        <li class="menu-item has-dropdown normal-dropdown"><a href="#footer-menu" class="link menu-link">Contact</a>
        </li>
      </ul>
                </nav>
              </div>
            </div>
        </div>
        
      </div>
    </header>


<!-- Start Slider -->
<div class="hero-area" id="home-menu">
    <div class="banner-content-wrapper hero-slider-wrapper">
        <?php
            foreach ($slider->result() as $row)
            {
        ?>
        <div class="banner-content single-slide bg-image text-black" data-bgimage="<?php echo $row->img ; ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10">
                        <h3 class="title--sm title-sm-shadowlight" data-animation="fadeInDown" data-duration="1.5s" data-delay=".8s"><?php echo $row->slogan ; ?></h3>
                        <h1 class="title--lg title-lg-arvo--bold" data-animation="fadeInLeft" data-duration="1.5s" data-delay=".8s"><?php echo $row->nama_produk ; ?></h1>
                        <div style="width: 50vw;">
                            <p data-animation="fadeInLeft" data-duration="1.5s" data-delay=".8s"><?php echo $row->deskripsi ; ?></p>
                        </div>  
                        <div class="banner_btn" data-animation="fadeInUp" data-duration="1.5s" data-delay=".8s">
                            <a href="shop-grid--fullwidth-three-light..html" class="theme-btn">Discover Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>
<!-- End Slider -->

<!-- Start Welcome To -->
<?php
    foreach ($about->result() as $row)
    {
?>
<section class="home-4__welcome-section section-padding pb-0" id="about-menu">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="welcome__description text-center">
                    <h3 class="welcome__title--sm">Welcome My Friends</h3>
                    <h2 class="welcome__title--mid text-black">Who We Are</h2>
                    <p><?php echo $row->content ;  ?></p>
                    <div class="welcome_sig-image  img-border-bottom">
                        <img src="<?php echo $row->img; ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    }
?>
<!-- End Welcome To -->

<!-- Start Recent Product -->
<section class="product-section section-padding" id="product-menu">
    <div class="container">
        <div class="section-title section-title-sep-3 text-black">
            <h2>Recent Product</h2>
            <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum.</p>
        </div>
        <div class="product-slider mini-items-slider">

            <?php
                foreach ($barang->result() as $row)
                {
            ?>
            <div class="product__single-slide">
                <div class="belly-product product-style-2">
                    <div class="product__image">
                        <img src="<?php echo $row->gambar; ?>" alt="">
                        <div class="hover-content">
                            <a href="product-details-light.html" class="hover-image">
                                <img src="<?php echo $row->gambar; ?>" alt="">
                            </a>
                            <div class="hover-btns btn-type-2">
                                <a href="wishlist-light.html" class="single-btn"><i class="ion-md-heart-empty"></i></a>
                                <a href="compare-light.html" class="single-btn"><i class="ion-md-options"></i></a>
                                <a href="#" class="single-btn" role="button" class="btn btn-primary" data-toggle="modal" data-target="#quick-view"><i class="ion-md-open"></i></a>
                            </div>
                        </div>
                        <span class="product-badge badge--sell-chocolate"></span>
                    </div>
                    <div class="product-description text-center">
                        <h3 class="product__caption">
                            <a href="product-details-light.html"><?php echo $row->nama; ?></a>
                        </h3>
                        <div class="rating-widget">
                            <span class="single-rating"><i class="ion-md-star"></i></span>
                            <span class="single-rating"><i class="ion-md-star"></i></span>
                            <span class="single-rating"><i class="ion-md-star"></i></span>
                            <span class="single-rating"><i class="ion-md-star-half"></i></span>
                            <span class="single-rating"><i class="ion-md-star-outline"></i></span>
                        </div>
                        <div class="product__price">
                            <span class="price--old">Rp.<?php echo number_format($row->harga); ?></span>
                            <span class="price--new">Rp.<?php echo number_format($row->harga); ?></span>
                        </div>   
                        <div class="product__btn">
                           <a href="cart-light.html" class="theme-btn-outlined theme-btn-outlined--type-2">add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>

        </div>
    </div>
</section>
<!-- End Recent Product -->


<!-- Start Banner -->
<?php
    foreach ($sale->result() as $row)
    {
?>
<div class="dicover-area">
    <div class="banner-content-wrapper banner-2 home-4--banner">
        <div class="banner-content bg-image text-white" data-bgimage="<?php echo $row->img; ?>">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <h3 class="title--sm">SALE MAKING PEOPLE HAPPY</h3>
                        <h1 class="title--lg title-seperator--1 title-xl-arvo--bold"><?php echo $row->tittle; ?></h1>
                        <p><?php echo $row->subtittle; ?></p>  
                        <div class="banner_btn">
                            <a href="shop-grid--fullwidth-three-light..html" class="theme-btn-outlined--primary">Discover Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<!-- End Banner -->

<!-- Start Recent Product -->
<section class=" home-4__product--new section-padding space-db--30">
    <div class="container">
        <div class="section-title section-title-sep-3 text-black">
            <h2>Recent Product</h2>
            <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum.</p>
        </div>
        <div class="product-slider-2 mini-items-slider">
            <?php
                foreach ($barang->result() as $row)
                {
            ?>
            <div class="product__single-slide">
                <div class="belly-product product-style-2">
                    <div class="product__image">
                        <img src="<?php echo $row->gambar; ?>" alt="">
                        <div class="hover-content">
                            <a href="product-details-light.html" class="hover-image">
                                <img src="<?php echo $row->gambar; ?>" alt="">
                            </a>
                            <div class="hover-btns">
                                <a href="wishlist-light.html" class="single-btn"><i class="ion-md-heart-empty"></i></a>
                                <a href="compare-light.html" class="single-btn"><i class="ion-md-options"></i></a>
                                <a href="#" class="single-btn" role="button" class="btn btn-primary" data-toggle="modal" data-target="#quick-view"><i class="ion-md-open"></i></a>
                            </div>
                        </div>
                        <span class="product-badge badge--sell-chocolate"></span>
                    </div>
                    <div class="product-description text-center">
                        <h3 class="product__caption">
                            <a href="product-details-light.html"><?php echo $row->nama; ?></a>
                        </h3>
                        <div class="rating-widget">
                            <span class="single-rating"><i class="ion-md-star"></i></span>
                            <span class="single-rating"><i class="ion-md-star"></i></span>
                            <span class="single-rating"><i class="ion-md-star"></i></span>
                            <span class="single-rating"><i class="ion-md-star-half"></i></span>
                            <span class="single-rating"><i class="ion-md-star-outline"></i></span>
                        </div>
                        <div class="product__price">
                            <span class="price--old">Rp.<?php echo number_format($row->harga); ?></span>
                            <span class="price--new">Rp.<?php echo number_format($row->harga); ?></span>
                        </div>   
                        <div class="product__btn">
                            <a href="cart-light.html" class="theme-btn-outlined">add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</section>
<!-- End Recent Product 2 -->

<!-- Start Tetimonial -->
<section id="testimoni-menu" class="section-padding testimonial-section bg-image "  data-bgimage="<?php echo base_url(); ?>assets/front/image/bg-images/home-4/testimonial-bg.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6 col-md-8 offset-md-4">
                <div class="testimonial-block testimonial-slider">
                <?php
                    foreach ($testimoni->result() as $row)
                    {
                ?>
                    <div class="single-block">
                        <div class="section-title title-seperator-1">
                            <h2 class="testimonial-title">What Clients Say?</h2>
                        </div>
                        <p><?php echo $row->komentar ; ?></p>
                        <div class="testimonial_client-profile">
                            <div class="client-img">
                                <img src="<?php echo $row->img ; ?>" alt="">
                            </div>
                            <div class="client-details">
                                <h6><?php echo $row->nama ; ?></h6>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial -->


<!-- Home Blog Section -->
<section class="home-blog section-padding space-db--30">
    <div class="container">
        <div class="section-title section-title-sep-2 text-black">
            <h2>From Our Blog</h2>
            <p>Update the latest article, to help customers capture the most authentic of the operation of the store.</p>
        </div>
        <!-- Blog Slider -->
        <div class="mini-blog-slider mini-items-slider">
            <?php
                foreach ($event_content->result() as $row)
                {
            ?>           
            <div class="single-blog">
                <!-- Single Blog Item -->
                <div class="belly-mini-blog blog-style-2">
                    <a href="blog-details-light.html" class="blog-image">
                        <img src="<?php echo $row->img ; ?>" alt="">
                        <div class="blog-badge">
                            <span><?php echo $row->tgl ; ?></span>
                        </div>
                    </a>
                    <div class="blog-content">
                        <h4 class="blog-title"><a href="blog-details-light.html"><?php echo $row->tittle ; ?></a></h4>
                        <p><?php echo $row->subtittle ; ?></p>
                        <div class="blog-btn">
                            <a href="blog-details-light.html" class="theme-btn-outlined--type-2">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- Single Blog Item /Ends-->
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</section>


<!-- Start Footer -->
<!-- Home Blog Section -->
<div class="site-bottom" id="footer-menu">
    <section class="newsletter-area py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="newsletter-details">
                        <h3>Join Our Newsletter Now </h3>
                        <h6>Get E-mail updates about our latest shop and special offers.</h6>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="subscription-form form-inline">
                        <input type="text" class="form-control" placeholder="Enter you email address here...">
                        <button class="theme-btn">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <footer class="site-footer">
      <div class="container">
          <div class="footer-inner">
            <div class="row">
            <?php
                foreach ($contact->result() as $row)
                {
            ?>
                <div class="col-lg-4  col-md-8 mb-30 mb-lg-0">
                  <div class="single-footer">
                    <h3 class="footer-title">Contact Us</h3>
                    <p><?php echo $row->subtittle ;  ?></p>
                    <div class="single-footer__details">
                      <div class="contact-widget widget-phone">
                        <div class="widget-logo">
                          <img src="<?php echo base_url(); ?>assets/front/image/icons/icon-phone--chocolate.png" alt="">
                        </div>
                        <span class="widget-text"><?php echo $row->phone ;  ?></span>
                      </div>
                      <div class="contact-block">
                          <p><?php echo $row->location ;  ?></p>
                          <p><?php echo $row->email ;  ?></p>
                      </div>
                      <div class="social-links links-rounded-bg">
                        <a href="<?php echo $row->facebook ;  ?>" class="single-social"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo $row->twitter ;  ?>" class="single-social"><i class="fab fa-twitter"></i></a>
                        <a href="<?php echo $row->instagram ;  ?>" class="single-social"><i class="fab fa-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                    }
                ?>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-30 mb-lg-0">
                  <div class="single-footer">
                      <h3 class="footer-title">Information</h3>
                    <ul class="footer-list">
                      <li><a href="#">
                      About Us</a></li>
                      <li><a href="#">Delivery Information</a></li>
                      <li><a href="#">Privacy Policy</a></li>
                      <li><a href="#">Terms & Conditions</a></li>
                      <li><a href="#">Brands</a></li>
                      <li><a href="#">Gift Certificates</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-30 mb-lg-0">
                  <div class="single-footer">
                      <h3 class="footer-title">My Account</h3>
                    <ul class="footer-list">
                      <li><a href="#">My Account</a></li>
                      <li><a href="#">Order History</a></li>
                      <li><a href="#">Wish List</a></li>
                      <li><a href="#">Newsletter</a></li>
                      <li><a href="#">Affiliate</a></li>
                      <li><a href="#">Specials</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-4 col-md-8 mb-30 mb-lg-0">
                  <div class="single-footer">
                      <h3 class="footer-title">Our Product</h3>
                      <div class="instagram-photos">
                        <?php
                            foreach ($barang->result() as $row)
                            {
                        ?>
                        <a href="#" class="single-image">
                          <img src="<?php echo $row->gambar ; ?>" alt="">
                        </a>
                        <?php
                            }
                        ?>
                      </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <div class="copyright-area">
        <div class="container">
          <div class="row align-items-md-center">
            <div class="col-lg-6 col-md-6">
              <p>Copyright © 2018 <a href="#" class="company-link">Belly</a>. All Right Reserved.</p>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="payment-cards text-lg-right">
                <a href="#" class="single-card"><img src="<?php echo base_url(); ?>assets/front/image/icons/paypal.jpg" alt=""></a>
                <a href="#" class="single-card"><img src="<?php echo base_url(); ?>assets/front/image/icons/paypal1.jpg" alt=""></a>
                <a href="#" class="single-card"><img src="<?php echo base_url(); ?>assets/front/image/icons/discover.jpg" alt=""></a>
                <a href="#" class="single-card"><img src="<?php echo base_url(); ?>assets/front/image/icons/mastercard.jpg" alt=""></a>
                <a href="#" class="single-card"><img src="<?php echo base_url(); ?>assets/front/image/icons/mastercard-2.jpg" alt=""></a>
                <a href="#" class="single-card"><img src="<?php echo base_url(); ?>assets/front/image/icons/amarican-express.jpg" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    </div>
  </div>

<script src="<?php echo base_url(); ?>assets/front/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/front/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/front/js/plugins.js"></script>
<script src="<?php echo base_url(); ?>assets/front/js/custom.js"></script>
</body>


<!-- Mirrored from demo.hasthemes.com/belly-v5/belly/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2019 10:55:03 GMT -->
</html>