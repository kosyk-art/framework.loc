<?php
    
?>
<html>
    <head><title><?=$this->title;?></title></head>
    <?=$this->insertCss();?>
    <body>
        <?=$content;?>
        
    <?=$main_header_title;?><br>
    <?=$main_header_description;?><br>
    <?=$index_crumbs_first_crumb;?>
    </body>
</html>
<?=$this->insertJs();?>