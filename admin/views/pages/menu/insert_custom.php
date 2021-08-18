<div class="card-header" id="headingFor">
    <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFor" aria-expanded="false" aria-controls="collapseFor">Tùy biến liên kết</button>
    </h5>
</div>
<div id="collapseFor" class="collapse" aria-labelledby="headingFor" data-parent="#accordion">
    <div class="card-body">
    <form action="index.php?option=menu&cat=insert" method="post">
        <fieldset class="form-group">
            <label for="formGroupExampleInput">Tên Menu</label>
            <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Tên Menu">
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput2">Liên kết</label>
            <input type="text" name="link" class="form-control" id="formGroupExampleInput2" placeholder="Link">
        </fieldset>
        <fieldset class="form-group">
            <input type="hidden" name="type" value="custom">
            <button class="btn btn-success form-control" type="submit" name="THEM">Thêm</button>
        </fieldset>
    </form>
    </div>
</div>