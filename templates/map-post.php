<?php snippet('post-container', slots: true,) ?>
  <?php slot('post') ?>
      <?php snippet('post-header', $post) ?>
      <?php snippet('entry-content', slots: true) ?>
        <?php slot('content') ?>
          <?php snippet('post-content', $post) ?>
          <?php echo css($stylesheet);?>
          <?php echo js($script);?>
        <?php endslot() ?>
      <?php endsnippet() ?>
  <?php endslot() ?>
<?php endsnippet();