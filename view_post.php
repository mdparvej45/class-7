<?php
require_once './inc/header.php';
require_once './data_base/env.php';
$id = $_GET['id'];
$Query = "SELECT * FROM blog_posts WHERE id = $id";
$selectQuery = mysqli_query($connection, $Query);
$fetch = mysqli_fetch_assoc($selectQuery);
// var_dump($fetch);     
?>

<!-- Form starting hare -->
<div class="continer">
  <div class="col-6 mx-auto mt-5">
    <div class="card">
      <div class="card-header">
        <strong>View Blog Post</strong>
      </div>
      <div class="card-body">
        <a href="./all_posts.php" class="btn btn-danger btn-sm">Back</a>
        <a href="./edit_post.php?id=<?= $id ?>" class="btn btn-primary btn-sm">Edit</a>
      <form method="POST" action="./controller/post_store_backend.php">
        <div class="mb-3">
            <h3 class="mt-3">
                <?= $fetch['title'] ?>
            </h3>
        </div>
           <div class="mb-3">
            <h3 id="inputPostDetiles" class="form-control">
            <?= $fetch['detiles'] ?>
            </h3>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<?php
require_once './inc/footer.php';
?>