<?php load_lib('date'); ?>
<h1 class="title" ><?=$data['title']?></h1>
<hr />
<div class="row" >
    <div class="col-md-5" >
        <p><u>Created:</u> <?=timestamp_to_date($data['created']); ?></p>
        <div id="description" >
            <?=$data['description']?>
        </div>
        <div class="text-center">
            <button class="btn btn-success" onclick="expand_description()" >Expand/Collapse</button>
        </div>
        <p><u>Stack Overflow Post:</u><br /> <a href="<?=$data['origin_url']?>" ><?=$data['origin_url']?></a></p>
    </div>
    <div class="col-md-7" >
        <h3 class="title" >Solution</h3>
        <p>
            <?=$data['solution']?>
        </p>
        <form target="viewport" method="POST" action="<?= WEBSITE_URL . '/frm.php' ?>" id="content-form">
            <pre id="content-text" ><?=htmlspecialchars($data['content'])?></pre>
            <textarea id="content-box" class="hidden" name="content" placeholder="Content" ></textarea>
            <button class="btn btn-primary" onclick="frm_submit()" >View Result</button>
        </form>
    </div>
</div>
<div class="row" >
    <div class="col-md-12" >
        <?php load_tpl('sidebar/adsense'); ?>
    </div>
</div>
<div class="row" >
    <div class="col-md-12">
        <iframe name="viewport" class="viewport" ></iframe>
    </div>
</div>

<?php
$script = <<<EOT
<script>
var editor = ace.edit("content-text");
editor.setTheme("ace/theme/twilight");
editor.getSession().setMode("ace/mode/html");

function frm_submit() {
    $("#content-box").val(editor.getValue());
    $("#content-form").submit();
}

function expand_description() {
    if($("#description").hasClass("expand")) {
        $("#description").removeClass("expand");
    } else {
        $("#description").addClass("expand");
    }
}
</script>
EOT;
enqueue_script('ace/ace.js');
enqueue_inline_script($script);
?>