<?php
/*
 * Template Name: Launcher Homepage
 */
?>

<?php
the_post();
get_header();
/*$placeholder = get_post_meta(get_the_ID(),"placeholder",true);
$hint = get_post_meta(get_the_ID(),"hint",true);
$button = get_post_meta(get_the_ID(),"button",true);*/

?>

    <body <?php body_class();?>>
    <div class="fh5co-loader"></div>

    <aside id="fh5co-aside" role="sidebar" class="text-center home-side-style">
        <h1 id="fh5co-logo"><a href="<?php echo site_url(); ?>">
				<?php bloginfo("name"); ?>
            </a></h1>
    </aside>

    <div id="fh5co-main-content">
        <div class="dt js-dt">
            <div class="dtc js-dtc">
                <div class="simply-countdown-one animate-box" data-animate-effect="fadeInUp"></div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="fh5co-intro animate-box">
                                    <h2><?php the_title()?></h2>
                                    <p><?php the_content()?></p>
                                </div>
                            </div>

                            <div class="col-lg-7 animate-box">
                                <form action="#" id="fh5co-subscribe">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php the_field('placeholder')?>">
                                        <input type="submit" value="<?php the_field('button');?>" class="btn btn-primary">
                                        <p class="tip"><?php the_field('hint');?></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
<?php get_footer(); ?>