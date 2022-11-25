<?php
require_once './inc/header.php';
require_once './data_base/env.php';
$Query = "SELECT * FROM blog_posts WHERE 1";
$selectQuery = mysqli_query($connection, $Query);
$fetch = mysqli_fetch_all($selectQuery,1);
// var_dump($fetch);
?>

<?php
  if(isset($_SESSION['success_notification'])){
    ?>
    <!-- Add success tost notification -->
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" >
      <div class="toast-header">
        <img src="./assets/images/yes_check_circle.svg" style="width:40px;">
        <strong class="me-auto ml-3">POST STATUS:</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-white bg-success">
        <?= $_SESSION['success_notification'] ?>
      </div>
    </div>
  <?php
  }
  ?>



<?php
  if(isset($_SESSION['delete_notificaton'])){
    ?>
    <!-- Add delete tost notification -->
    <div class="toast show bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true" >
      <div class="toast-header bg-danger text-white">
        <strong class="me-auto ml-3">POST STATUS:</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-danger bg-white">
        <?= $_SESSION['delete_notificaton'] ?>
      </div>
    </div>
  <?php
  }
  ?>


<?php
  if(isset($_SESSION['update_notificaton'])){
    ?>
    <!-- Add success tost notification -->
    <div class="toast show bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true" >
      <div class="toast-header bg-success text-white">
                <img src="./assets/images/yes_check_circle.svg" style="width:40px;">
        <strong class="me-auto ml-3">POST STATUS:</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-primary bg-white">
        <?= $_SESSION['update_notificaton'] ?>
      </div>
    </div>
  <?php
  }
  ?>


<!-- Form starting hare -->
<div class="continer">
  <div class="col-10 mx-auto mt-5">
    <div class="card">
      <div class="card-header bg-info text-white">
        <strong>All Blog Posts</strong>
      </div>
      <div class="card-body">
      <table class="table table-striped">
  <thead>
    <tr>
      <th class="fw-bold" scope="col">#</th>
      <th class="fw-bold" scope="col">Titles</th>
      <th class="fw-bold" scope="col">Detiles</th>
      <th class="fw-bold" scope="col">Status</th>
      <th class="fw-bold" scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($fetch as $key => $data){
            // var_dump($data['id']);
        ?>
        <tr>
            <td><?= ++$key ?></td>
            <td><?= $data['title'] ?></td>
            <td><?php
                if(strlen($data['detiles']) > 30){
                   echo substr($data['detiles'], 0, 30) . " <a href='#' class='text-decoration-none '>more</a>";
                }
            ?></td>
            <td class="<?= ($data['status'] == '1') ? 'text-success' : 'text-danger' ?>">
            <?= ($data['status'] == '1') ? 'Active' : 'De-Active' ?> </td>
            <td>
                <span class="btn-group">
                <a href="./view_post.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-secondary btn-sm">View</button></a>
                <a href="./edit_post.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-info btn-sm">Edit</button></a>
                <a href="./controller/status_backend.php?id=<?= $data['id'] ?>&status=<?= $data['status'] ?>"><button type="button" class="btn btn-<?= ($data['status'] == '0') ? 'success' : 'warning' ?> btn-sm"><?= ($data['status'] == '0') ? 'Active' : 'De-Active' ?></button></a>
                <a href="./controller/delect_backend.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                </span>
            </td>
        </tr>
        <?php
        }
    ?>
    <?php
      if(mysqli_num_rows($selectQuery) == 0){
        ?>
        <tr class="text-center">
          <td colspan="5"> <img  src="./assets/images/no-data-icon.png" style="width:200px ; opacity: .5;"></td>
        </tr>
      <?php
      }
    ?>
  </tbody>
</table>
      </div>
    </div>
  </div>
</div>
<?php
require_once './inc/footer.php';
?>