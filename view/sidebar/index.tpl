<ul class="sidebar-nav">
    <li class="sidebar-brand">
        <a href="<?=build_url(array('controller'=>'home','action'=>'index'))?>">
            <img src="static/img/logo.png" />
        </a>
    </li>
    <?php foreach($data['tags'] as $tag) : ?>
    <li class="sidebar-item" >
        <a href="<?=build_url(array('controller'=>'home','action'=>'index','id'=>$tag['name']))?>" ><?=$tag['name']?></a>
    </li>
    <?php endforeach; ?>
</ul>