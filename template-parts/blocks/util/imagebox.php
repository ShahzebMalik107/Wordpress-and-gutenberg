<?php
$className = 'image_box';

if (!empty($block['className'])) {
    $className .= ' ' .  $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' ' .  $block['align'];
}

// Getting values 

$image =  get_field('image_box_image');
$heading = get_field('image_box_heading');
$body = get_field('image_box_body')

?>

<div class="<?php echo $className; ?>">
    <div class="container">
        <div class="image_box_container">
            <div class="image_box_image">
                <img src="<?php echo $image["url"] ?>" alt="<?php echo $image["alt"] ?>" />
            </div>
            <div class="image_box_body">
                <h2 class="subheading">
                    <?php echo $heading ?>
                </h2>
                <p class="paragraph">
                    <?php echo $body ?>
                </p>
            </div>
        </div>
    </div>
</div>