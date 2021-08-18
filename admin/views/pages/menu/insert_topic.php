<div class="card-header" id="headingTopic">
    <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTopic" aria-expanded="true" aria-controls="collapseTopic">
        Chủ đề bài viết
        </button>
    </h5>
</div>
<div id="collapseTopic" class="collapse" aria-labelledby="headingTopic" data-parent="#accordion">
    <div class="card-body">
    <form action="index.php?option=menu&cat=insert" method="post">
        <fieldset class="form-group">
            <?php foreach ($list_topic as $row) : ?>
            <div class="form-check">
                <input class="form-check-input" name="itemtopic" type="radio" value="<?=$row['topic_id'];?>" id="itemtopic<?=$row['topic_slug']?>">
                <label class="form-check-label" for="itemtopic<?=$row['topic_slug']?>">
                <?=$row['topic_name']?>
                </label>
            </div>
            <?php endforeach; ?>
        </fieldset>
        <fieldset class="form-group">
            <input type="hidden" name="type" value="topic">
            <button class="btn btn-success form-control" type="submit" name="THEM">Thêm</button>
        </fieldset>
    </form>
    </div>
</div>