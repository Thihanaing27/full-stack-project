<?php
session_start();
include_once("top_bar.php");
include_once("nav_bar.php");
include_once("config.php");

$qry = ("SELECT * FROM posts");
$post_array = mysqli_query($config, $qry);

?>


<!-- promo content start-->
<div class="content">
    <h1 class="text-danger">>>> Happy Promotion <<<< </h1>
            <h3>Electronic Products up to 20% discount</h3>

            <div>
                <img src="upload/background.png " alt="content__img" class="content__img">
            </div>
</div>
<!-- promo content start-->
<!-- cards start-->
<div class="card_header_container">
    <h3 class="card_header">Products</h3>
</div>

<div class="card_container">
    <?php foreach ($post_array as $items) { ?>
        <div class="cards">
            <div class="card__title">
                <h3><?php echo $items['title'] ?></h3>
            </div>
            <img src="upload/<?php echo $items['imglink']; ?>" class="cards__img fluid">
            <div class="card__content">
                <p>
                    <?php echo $items['price']; ?>
                </p>
                <p>
                    <?php echo $items['description']; ?>
                </p>
                <a class="btn but-sm btn-primary" href="order_confirm.php?product=<?php echo $items['title'] ?>">Order Now!</a>
            </div>
        </div>
    <?php } ?>
</div>
<!-- cards end -->
<?php
include_once("footer.php");
?>