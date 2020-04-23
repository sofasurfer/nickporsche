<?php
global $wp_query;
$news_query = array(
    'post_type' => 'release',
    'orderby'   => 'meta_value',
    'meta_key' => 'post_release_elements_release_date',
    'order'     => 'DESC',
    'numberposts' => -1,

);
$releases = get_posts( $news_query );

error_log(print_r($releases,true));
?>

<div class="n-dark">
    <div id="releases" class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Releases</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach($releases as $release): ?>
                <div class="col-md-4">
                    <div class="n-release item-hover">
                        <img class="img-responsive" src="<?= get_field('post_release_elements_release_cover',$release); ?>" />
                        <div class="caption item-hover-caption" style="display: none;">
                            <h3><?= get_the_title($release); ?></h3>
                            <p><?= get_field('post_release_elements_release_text',$release); ?></p>
                            <a class="buy" title="" href="<?= get_field('post_release_elements_release_link',$release); ?>" target="_blank">Buy</a>
                        </div>  
                    </div>
                </div>                
            <?php endforeach;?>
        </div>
    </div>
</div>