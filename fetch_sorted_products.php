<?php
// Database connection (replace with your actual connection details)
$host = 'localhost';
$dbname = 'grocery-shop';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Set the default sort order or use the one provided by Ajax
$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'id ASC';

// Prepare and execute the query
$query = "SELECT * FROM product_cart ORDER BY $sortOrder";
$select = $pdo->prepare($query);
$select->execute();
$products = $select->fetchAll(PDO::FETCH_OBJ);

// Generate HTML for each product in both Grid and List views
foreach ($products as $row): ?>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-30">
        <div class="product-item" data-id="<?= $row->id; ?>" data-name="<?= $row->name; ?>" data-price="<?= $row->price; ?>" data-image="./Admin/FoodImages/<?= $row->image; ?>">
            <?php if ($row->product_type == 'New'): ?>
                <div class="sale-badge"><span>new</span></div>
            <?php elseif ($row->product_type == 'Discount'): ?>
                <div class="sale-badge" style="background:brown;color:#fff"><span><i class="fa-solid fa-yen-sign"></i> <?= $row->txtdiscountprice; ?></span></div>
            <?php endif; ?>
            
            <div class="product-thumbnail">
                <a href="#">
                    <img src="./Admin/FoodImages/<?= $row->image; ?>" alt="<?= $row->name; ?> image">
                </a>
                <div class="product-overly-btn">
                    <ul>
                        <li><a href="#" class="add-to-cart"><i class="fas fa-shopping-cart"></i><span>Add to Cart</span></a></li>
                        <li><a href="#" class="quick-view" data-url="product_detail.php?id=<?= $row->id; ?>" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="far fa-eye"></i><span>Quick view</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="product-content">
                <h4><a href="#"><?= $row->name; ?></a></h4>
                <div class="pricing">
                    <span>¥<?= $row->price; ?> <del>¥<?= $row->previous_price; ?></del></span>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
