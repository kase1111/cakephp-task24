<h1>詳細画面</h1>
<p>名前:<?php echo h($post['User']['name']); ?></p>
<p>題名:<?php echo h($post['Post']['title']); ?></p>
<p>内容:<?php echo h($post['Post']['body']); ?></p>
<p>更新日時:<?php echo h($post['Post']['created']); ?></p>
