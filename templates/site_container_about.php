<div class="n-dark">
    <div id="nickporsche" class="container">
        <div class="row">
            <div class="col-md-8">
                <h1><?= $site_element['site_container_about_title']; ?></h1>
                <?= $site_element['site_container_about_content']; ?>
            </div>
            <div class="col-md-3 col-md-offset-1">
                <ul class="n-link-list">
                    <?php foreach( $site_element['site_container_about_downloads'] as $download ): ?>
                        <li><a target="<?= $download['site_container_about_downloads_link']['url']; ?>" href="<?= $download['site_container_about_downloads_link']['url']; ?>"><?= $download['site_container_about_downloads_text']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
</div>