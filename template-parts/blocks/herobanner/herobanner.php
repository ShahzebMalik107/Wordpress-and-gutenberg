<?php

$className = 'herobanner';

if (!empty($block['className'])) {
    $className .= ' ' .  $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' ' .  $block['align'];
}

// loading Value
$title = get_field('hero_title');
$banner_image = get_field('banner_image');
?>

<?php if( !empty($banner_image) ): ?>
    <div class="<?php echo esc_attr($className) ?>" style="background: url('<?php echo $banner_image['url']; ?>')">
<?php else : ?>
    <div class="<?php echo esc_attr($className) ?>" style="background: #F4F4F4">
<?php endif; ?>
        <div class="container">
            <h1>
                <?php echo $title ?>
            </h1>
        </div>
    </div>
