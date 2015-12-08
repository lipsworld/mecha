<?php echo $messages; ?>
<form class="form-repair form-cache" id="form-repair" action="<?php echo $config->url_current . $config->url_query; ?>" method="post">
  <?php echo Form::hidden('token', $token); ?>
  <?php

  $e = File::E($path !== false ? $path : "");
  $is_text = $path === false || strpos(',' . SCRIPT_EXT . ',', ',' . $e . ',') !== false;
  $path = File::url($path);

  ?>
  <?php if($is_text && $content !== false): ?>
  <p>
  <?php echo Form::textarea('content', Request::get('content', Guardian::wayback('content', $content)), $speak->manager->placeholder_content, array(
      'class' => array(
          'textarea-block',
          'textarea-expand',
          'code'
      )
  )); ?>
  </p>
  <?php endif; ?>
  <p>
    <?php echo Form::hidden('name', $path); ?>
    <?php echo Jot::button('action', $is_text ? $speak->update : $speak->rename); ?>
    <?php echo Jot::btn('destruct', $speak->delete, $config->manager->slug . '/cache/kill/file:' . $path); ?>
  </p>
</form>