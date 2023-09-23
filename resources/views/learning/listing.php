<h1><?php echo $heading; ?></h1>
<?php foreach ($noBladeListings as $listing) : ?>
    <h2><?php echo $listing['title']; ?></h2>
    <p><?php echo $listing['description']; ?></p>
<?php endforeach; ?>