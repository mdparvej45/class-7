<?php
require_once './inc/header.php';
?>

<!-- Add tost notifacation -->
<?php
if(isset($_SESSION['unsuccess_notification'])){
    ?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" >
    <div class="toast-header">
    <img src="./assets/images/no_check_circle.png" style="width:40px;">
      <strong class="me-auto">POST STATUS:</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body text-white bg-danger">
      <?= $_SESSION['unsuccess_notification'] ?>
    </div>
  </div>
  <?php
  }
?>

<!-- Form starting hare -->
<div class="continer">
  <div class="col-6 mx-auto mt-5">
    <div class="card">
      <div class="card-header">
        <strong>Add Blog Post</strong>
      </div>
      <div class="card-body">
      <form method="POST" action="./controller/post_store_backend.php">
        <div class="mb-3">
          <label for="inputPostTitle" class="form-label">Post Title</label>
          <input type="text" name="title" placeholder="Please input your post title" class="form-control" id="inputPostTitle" aria-describedby="emailHelp">
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
          <textarea name="detiles" placeholder="Please input your post detiles..." class="form-control"  name="detiles" id="inputPostDetiles" cols="30" rows="5"></textarea>
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
        <button type="submit" name="submit" id="liveToastBtn" class="btn btn-primary w-100">Submit</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php
require_once './inc/footer.php';
?>