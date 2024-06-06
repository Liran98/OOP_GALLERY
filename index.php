<?php include("includes/header.php"); ?>

<?php
$photos = Photo::find_all();

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

$items_per_page = 4;

$items_total_count = Photo::count_all();

$paginate = new Paginate($page,$items_per_page,$items_total_count);
                                      // ($this->current_page - 1) * $this->item_per_page;    if cur page is 2 - 1 = 1 , 1 * 4 = 4
$sql = "SELECT * FROM photos LIMIT {$items_per_page} OFFSET {$paginate->offset()}";

$photos = Photo::find_by_query($sql);

$total_pages =  $paginate->page_total();
?>
<div class="row">
  <!-- Blog Entries Column -->
  <div class="col-md-12">
    <div class="thumbnails row">
      <?php
      foreach ($photos as $photo):
      ?>
        <div class="col-xs-6 col-md-3">
          <a class="thumbnail" href="photo.php?photo_id=<?php echo $photo->id; ?>">
            <img class="img-responsive home_page_picture" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
          </a>
        </div>
      <?php
      endforeach;
      ?>
    </div>


<div class="row">
  <ul class="pagination">
    <?php
    
    if($paginate->page_total() > 1){
      
      
    if($paginate->has_next()){

      echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";
    }
  }
 
  ?>

<?php


for($i = 1; $i <= $total_pages; $i++){
  if($paginate->current_page == $i){
    echo "<li class='active'><a href='index.php?page={$i}'>$i</a></li>";
  }else{
    echo "<li><a href='index.php?page={$i}'>$i</a></li>";

  }
}
if($paginate->has_previous()){
  echo "<li class='next'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
}
?>
   
  </ul>
</div>



  </div>
</div>
















<?php include("includes/footer.php"); ?>