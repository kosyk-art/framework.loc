<?php
    $this->css['layout'][] = 'css/style1';
?>
<html>
    <head><title><?=$this->title;?></title></head>
    <?=$this->insertCss();?>
    <body>
        <?=$content;?>
    </body>
</html>
<?=$this->insertJs();?>