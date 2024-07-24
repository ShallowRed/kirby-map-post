<?php
$label = $block->content()->label();
$attrs = [
  "class" => "vv-map-spot-link",
  "data-lat" => $block->content()->lat(),
  "data-lon" => $block->content()->lon(),
  "data-zoom" => $block->content()->zoom(),
];
?>
<button <?php echo attr($attrs) ?>>
  <?php echo $label ?>
</button>
