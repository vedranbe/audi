<?php
/** 
/* Template Name: Homepage Template
*/
get_header();
?>

<main role="main" aria-label="Content" itemscope itemtype="http://schema.org/WebPageElement">
    <div class="wrapper">
        
        <?php if ( have_rows( 'slides' ) ) : ?>
        <!-- HOME -->    
        <section id="home">
        <div class="header-overlay"></div>
        <?php
            echo '<div class="slides">';
            while ( have_rows( 'slides' ) ) : the_row();
                echo '<div class="slide" style="background: url('.get_sub_field( 'background' ).') top center no-repeat; background-attachment: fixed;">';
                echo '<div class="container flex">'; 
                echo '<div>';
                echo '<h5>'.get_sub_field( 'subtitle' ).'</h5>'; 
                echo '<h2 class="white">'.get_sub_field( 'title' ).'</h2>'; 
                echo '<p class="quote">'.get_sub_field( 'text' ).'</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            endwhile; 
            echo '</div>';
        ?>
        </section>
        <?php endif; ?>

        <?php if ( have_rows( 'left_about' ) ) : ?>
        <!-- ABOUT US -->    
        <section id="about_us">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 order-md-1 order-12">
                    <?php
                        while ( have_rows( 'left_about' ) ) : the_row();
                            echo '<div class="image_about"><img src="'.get_sub_field( 'image' ).'"></div>';
                            echo '<div class="background"><div class="note">'.get_field('note').'</div></div>';
                        endwhile;
                    ?>
                    </div>
                    <div class="col-md-5 order-md-12 order-1 content">
                    <?php
                        while ( have_rows( 'right_about' ) ) : the_row();
                            echo '<div class="flex">'; 
                            echo '<div>';
                            echo '<h5>'.get_sub_field( 'subtitle' ).'</h5>'; 
                            echo '<h2>'.get_sub_field( 'title' ).'</h2>'; 
                            echo get_sub_field( 'text' );
                            echo '</div>';
                            echo '</div>';
                        endwhile;
                    ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php if ( have_rows( 'featured' ) ) : 
            while ( have_rows( 'featured' ) ) : the_row();
                $background = get_sub_field( 'background' );
            endwhile;
        ?>
        <!-- PRODUCTS -->    
        
        <section id="products" style="background: url(<?php echo $background; ?>) top center no-repeat; background-attachment: fixed;">
            <div class="gradient-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 order-md-1 order-12">
                    <?php
                        while ( have_rows( 'featured' ) ) : the_row();
                            echo '<div class="flex">'; 
                            echo '<div>';
                            echo '<h5>'.get_sub_field( 'subtitle' ).'</h5>'; 
                            echo '<h2 class="white">'.get_sub_field( 'title' ).'</h2>'; 
                            echo '<div class="lightgrey">'.get_sub_field( 'text' ).'</div>';
                            if ( have_rows( 'features' ) ) :
                                echo '<div class="row features">';
                                while ( have_rows( 'features' ) ) : the_row(); 
                                    echo '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-4">';
                                    echo '<div class="feature">';
                                    echo '<h5 class="white">'.get_sub_field( 'feature' ).'</h5>'; 
                                    echo '<h3 class="white">'.get_sub_field( 'feature_value' ).'</h3>'; 
                                    echo '<div class="additional">'.get_sub_field( 'feature_text' ).'</div>'; 
                                    echo '</div>';
                                    echo '</div>';
                                endwhile; 
                            endif; 
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        endwhile;
                    ?>
                    </div>
                    <div class="col-md-6 order-md-12 order-1 content">
                    
                    </div>
                </div>
            </div>
        </section>
        <section id="other_cars">
        <?php if ( have_rows( 'other_cars' ) ) : ?>
            <!-- OTHER CARS -->
            <div class="container">
                    <?php while ( have_rows( 'other_cars' ) ) : the_row(); 
                        echo '<h2 class="text-center">'.get_sub_field( 'title' ).'</h2>'; 
                        if ( have_rows( 'vehicles' ) ) : 
                            echo '<div class="row">';
                            while ( have_rows( 'vehicles' ) ) : the_row(); 
                                echo '<div class="col-lg-3 col-sm-6">';
                                echo '<div class="inner">';
                                if ( get_sub_field( 'image' ) ) { 
                                    echo '<div class="image">';
                                    echo '<img src="'.get_sub_field( 'image' ).'" />';
                                    echo '</div>';
                                } 
                                echo '<h4>'.get_sub_field( 'subtitle' ).'</h4>'; 
                                echo '<h3>'.get_sub_field( 'title' ).'</h3>'; 
                                echo '<div class="list">'.get_sub_field( 'text' ).'</div>';
                                echo '<div class="price">';
                                echo '<h3><span>Starting from</span>'.get_sub_field( 'price' ).'</h3>'; 
                                echo '</div>';
                                echo '<div class="buy"><a href="#">Buy now</a></div>';
                                echo '</div>';
                                echo '</div>';
                            endwhile;
                        endif;
                    endwhile; ?>
                </div>
            </div>
        <?php endif; ?>

        </section>
        <?php endif; ?>

        <?php if ( have_rows( 'left_contact' ) ) : ?>
        <!-- CONTACT US -->    
        <section id="contact_us">
            <?php 
            while ( have_rows( 'left_contact' ) ) : the_row();
                if ( get_sub_field( 'image_contact' ) ) :
                    echo '<div class="image"><img src="'.get_sub_field( 'image_contact' ).'" /></div>';
                endif;
            endwhile;
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-7 order-md-1">
                    <?php
                        while ( have_rows( 'left_contact' ) ) : the_row();
                            echo '<h5>'.get_sub_field( 'subtitle_contact' ).'</h5>'; 
                            echo '<h1 class="white">'.get_sub_field( 'title_contact' ).'</h1>'; 
                        endwhile;
                    ?>
                    </div>
                    <div class="col-md-5 order-md-12">
                        <div class="form">
                        <?php 
                            while ( have_rows( 'right_contact' ) ) : the_row();
                                echo get_sub_field('contact_form');
                            endwhile;
                        ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 copyright">
                    &copy; <?php auto_copyright("2020"); ?> FSD. All rights reserved.
                    </div>
                    <div class="col-md-6 links text-right">
                        <a href="#">Terms of Agreement</a>
                        <a href="#">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>           
        
    </div>
</main>

<?php get_footer(); ?>