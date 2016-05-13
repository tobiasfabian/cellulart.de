<?php
  $video = $section->video_url()->html();
  $vimeo_id = '';
  if(preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $video, $output_array)) {
    $vimeo_id = $output_array[5];
  }
?>
<iframe src="https://player.vimeo.com/video/<?= $vimeo_id ?>?color=EA564B&title=0&byline=0&portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen class="vimeo_video"></iframe>
