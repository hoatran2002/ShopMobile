<?php 
$product = loadModel('product');
$category = loadModel('category');
$list = $product->product_list(true);
$ntrash = count($product->product_list(false));
?>
<?php require_once 'views/header.php';?>

<section class="clearfix maincontent py-3">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-danger text-uppercase">Quản lý sản phẩm</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="index.php?option=product&cat=insert" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Thêm</a>
                        <a href="index.php?option=product&cat=trash" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác (<?=$ntrash?>)</a>
                    </div>
                </div>
            </div>
            <div class="card-block p-2">
                <?php require_once 'views/message.php'; ?>
                <table id="myTable" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 20px;">ID</th>
                            <th style="width: 90px;">Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Ngày đăng</th>
                            <th style="width:180px;">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list as $row): ?>
                        <?php
							$id=$row['product_id'];
							$categoryrow = $category->category_rowid($row['product_catid']);
						?>
                        <tr>
                            <td class="text-center">
                                <?php echo $id;?>
                            </td>
                            <td class="text-center">
                                <img src="../public/images/product/<?php echo $row['product_img'];?>" class="img-fluid" alt="SP">
                            </td>
                            <td>
                                <?php echo $row['product_name'];?>
                            </td>
                            <td>
                                <?php echo $categoryrow['category_name'];?>
                            </td>
                            <td class="text-center">
                                <?php echo $row['product_createdat'];?>
                            </td>
                            <td class="text-center">
                                <?php if($row['product_status']==1): ?>
                                <a class="btn btn-sm btn-success" href="index.php?option=product&cat=status&id=<?php echo $id;?>"><i class="fas fa-eye"></i></a>
                                <?php else: ?>
                                <a class="btn btn-sm btn-danger" href="index.php?option=product&cat=status&id=<?php echo $id;?>"><i class="fas fa-eye"></i></a>
                                <?php endif; ?>
                                <a class="btn btn-sm btn-info" href="index.php?option=product&cat=update&id=<?php echo $id;?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger" href="index.php?option=product&cat=deltrash&id=<?php echo $id;?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php require_once 'views/footer.php';?>