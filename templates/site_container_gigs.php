<?php
global $wp_query;
$news_query = array(
    'post_type' => 'gig',
    'orderby'   => 'meta_value',
    'meta_key' => 'post_gig_elements_gig_date',
    'order'     => 'ASC',
    'numberposts' => -1,

);
$gigs = get_posts( $news_query );

$gigs_active = array();
$gigs_archive = array();
foreach($gigs as $gig){
    $date = get_field('post_gig_elements_gig_date',$gig);
    $timestamp = strtotime($date);
    $newgig = array(
        'timestamp' => $timestamp,
        'date' => date('d.m.Y',$timestamp),
        'location' => get_field('post_gig_elements_gig_location',$gig),
        'title' => get_the_title($gig),
        'link' => get_field('post_gig_elements_gig_link',$gig)
    );

    $today = (new DateTime())->setTime(0,0);
    if( $timestamp >= $today->getTimestamp() ){
        array_push($gigs_active, $newgig);
    }else{
        array_push($gigs_archive, $newgig);
    }

}

?>

<div class="n-pink">
    <div id="gigs" class="container n-gig-list">
        <input class="hidden" id="c_gigs_active" name="gigs" type="radio" checked="checked" />
        <input class="hidden" id="c_gigs_archive" name="gigs" type="radio" />
        <div class="row">
            <div class="col-md-6">
                <label for="c_gigs_active"><h2>Gigs</h2></label>
            </div>
            <div class="col-md-6">
                <label for="c_gigs_archive"><h2>Past gigs</h2></label>
            </div>            
        </div>
        <div id="gigs_active" class="row">
            <?php foreach($gigs_active as $gig): ?>
                <div class="col-md-3">
                    <div class="gig-item">
                    <span><?= $gig['date'];?></span>
                    <h3><?= $gig['location'];?></h3>
                    <a target="_blank" href="<?= $gig['link'];?>"><?= $gig['title'];?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div id="gigs_archive" class="row">
            <?php foreach($gigs_archive as $gig): ?>
                <div class="col-md-3">
                    <div class="gig-item">
                    <span><?= $gig['date'];?></span>
                    <h3><?= $gig['location'];?></h3>
                    <a target="_blank" href="<?= $gig['link'];?>"><?= $gig['title'];?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>