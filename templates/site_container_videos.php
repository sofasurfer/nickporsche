


<div  id="videos" class="container-fluid?">
    <div id="carousel-example-generic" class="carousel slide" data-interval="false" data-ride="carousel">

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <?php $first=true; ?>
        <?php foreach( $site_element['site_container_videos_youtube'] as $video ): ?>
          <div class="item <?= ($first) ? 'active' : ''; ?>">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe src="<?= $video['url'];?>" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          <?php $first = false; ?>
        <?php endforeach; ?>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</div>