<?php load_lib('pagination'); ?>
<h1 class="title" ><?=$data['title']?></h1>
<div class="table-responsive" >
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" colspan="4" >List of Developers' Stacks</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['posts'] as $post) : ?>
            <tr>
                <td><?=$post['title']?></td>
                <td></td>
                <td><?=show_tags($post['tags'])?></td>
                <td>
                    <a href="<?php echo build_url(array('controller'=>'post', 'action'=>'index', 'id'=>$post['seo_url'])); ?>" class="btn btn-primary">Detail</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th class="text-right" colspan="4" >
                    <?=pagination($data['pagination']['url'], $data['pagination']['field'],
                                  $data['pagination']['page'], $data['pagination']['max_page'], 'pagination'
                    )?>
                </th>
            </tr>
        </tfoot>
    </table>
    
</div>