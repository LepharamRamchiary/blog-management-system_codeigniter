<?php
$this->load->view('adminpanel/header');
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h2>Edit Blog</h2>

    <form enctype="multipart/form-data" action="<?= base_url() . 'admin/blog/editblog_post' ?>" method="post">

        <select class="custom-select" name="publish_unpublish">
            <option value="1" <?= ($result[0]['status'] == "1") ? "selected" : "" ?>>Publish</option>
            <option value="0" <?= ($result[0]['status'] == "0") ? "selected" : "" ?>>Unpublish</option>
        </select>
        <br>

        <input type="hidden" name="blog_id" value="<?= $blog_id ?>">
        <div class="form-group" style="margin-top: 10px">
            <input type="text" value="<?= $result[0]['blog_title'] ?>" class="form-control" name="blog_title" placeholder="Title" />
        </div>
        <div class="form-group">
            <textarea name="blog_desc" class="form-control" placeholder="Description"><?= $result[0]['blog_desc'] ?></textarea>
        </div>
        <div class="form-group">
            <img width="100" src="<?= base_url() . $result[0]['blog_img'] ?>">
            <input type="file" class="form-control" name="file" />
        </div>
        <button type="submit" class="btn btn-primary">Edit Blog</button>

    </form>

</main>
</div>
</div>

<?php
$this->load->view('adminpanel/footer');
?>

<script type="text/javascript">
    <?php
    if (isset($_SESSION['inserted'])) {
        if ($_SESSION['inserted'] == 'yes') {
            echo "alert('Blog is created Sucessfully!')";
        } else {
            echo "alert('BLog is not created')";
        }
    }
    ?>
</script>


<!-- CKEDITOR -->
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('blog_desc');
</script>