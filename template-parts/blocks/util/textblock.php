<?php
$className = 'text-block-1';

if (!empty($block['className'])) {
    $className .= ' ' .  $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' ' .  $block['align'];
}

// Loading Values 

$heading = get_field('text_block_heading');
$text_body = get_field('text_block_body');

?>

<div class="<?php echo $className; ?>">
    <div class="container">
        <h2 class="subheading">
            <?php echo $heading; ?>
        </h2>
        <p class="paragraph">
            <?php echo $text_body ?>
        </p>
    </div>
</div>