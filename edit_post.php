<?php
require_once './inc/header.php';
require_once './data_base/env.php';
$id = $_GET['id'];
$query = "SELECT * FROM blog_posts WHERE id = $id";
$selectQuery = mysqli_query($connection, $query);
$fetch = mysqli_fetch_assoc($selectQuery);

?>

<!-- Form starting hare -->
<div class="continer">
  <div class="col-6 mx-auto mt-5">
    <div class="card">
      <div class="card-header">
        <strong>Edit Blog Post</strong>
      </div>
      <div class="card-body">
        <a href="./all_posts.php?id=<?= $id ?>" class="btn btn-danger btn-sm">Back</a>
      <form method="POST" action="./controller/edit_post_backend.php?id=<?= $id ?>">
        <div class="mb-3">
          <label for="inputPostTitle" class="form-label">Post Title</label>
          <input type="text" name="title" value="<?= $fetch['title'] ?>" class="form-control" id="inputPostTitle" aria-describedby="emailHelp">
          <?php
            if(isset($_SESSION['errors']['title'])){
              ?>
              <span class="text-danger">
              <?php
                echo $_SESSION['errors']['title'];
              ?>
            </span>  
          <?php
            }
          ?>
        </div>
           <div class="mb-3">
          <label for="inputPostDetiles" class="form-label">Post Detiles</label>
          <textarea name="detiles" placeholder="Please input your post detiles..." class="form-control"  name="detiles" id="inputPostDetiles" cols="30" rows="5"><?= $fetch['detiles'] ?></textarea>
          <?php
            if(isset($_SESSION['errors']['detiles'])){
              ?>
              <span class="text-danger">
              <?php
                echo $_SESSION['errors']['detiles'];
              ?>
            </span>  
          <?php
            }
          ?>  
        </div>
        <button type="submit" name="save_changed" class="btn btn-primary w-100">Save Changed</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php
require_once './inc/footer.php';
?>