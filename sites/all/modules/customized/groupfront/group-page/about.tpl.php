<?

$string = <<<EOT
<div class="D_box chapterPage">
  <div class="D_boxbody">
    <div class="D_boxhead">
      <h1>{$node->field_site_title[0][value]}</h1>
      <ul class="D_actions hasIcons">
      </ul>
    </div>
    <div class="D_boxsection ">
      <div class="D_bbcode">
        {$node->body}
      </div>
    </div>
  </div>
</div>
EOT;
