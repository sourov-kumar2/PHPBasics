<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <h1 style="padding: 20px 0;">Admin Panel</h1>
            <strong><img src="img/logo/logosn.png" alt="" /></strong>
        </div>
        <div class="nalika-profile">
            <div class="profile-dtl">
                <img src="./uploads/profile_picture.png" alt="" srcset="">
                
                <h2>Shuvo Mondal</h2>
            </div>
            <div class="profile-social-dtl">
                <ul class="dtl-social">
                    <li><a href="#"><i class="icon nalika-facebook"></i></a></li>
                    <li><a href="#"><i class="icon nalika-twitter"></i></a></li>
                    <li><a href="#"><i class="icon nalika-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li class="">
                        <a class="" href="./">
                            <i class="icon nalika-home icon-wrap"></i>
                            <span class="mini-click-non <?= $pageName == "index.php" ? "text-danger" : null ?>">Dashboard</span>
                        </a>
                    </li>
                    <!-- <li class="<?= $pageName == "all-products.php" || $pageName == "add-product.php" || $pageName == "products-categories.php" || $pageName == "products-brands.php" ? "active" : null ?>">
                        <a class="has-arrow" href="" aria-expanded="false"> -->
                            <!-- nalika products
                            <i class="icon nalika-table icon-wrap"></i>
                            <span class="mini-click-non">Products</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li>
                                <a title="Inbox" href="./all-products.php">
                                    <span class="mini-sub-pro <?= $pageName == "all-products.php" ? "text-danger" : null ?>">
                                        All Products
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a title="Inbox" href="./add-product.php">
                                    <span class="mini-sub-pro <?= $pageName == "add-product.php" ? "text-danger" : null ?>">
                                        Add Product
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a title="Compose Mail" href="./products-categories.php">
                                    <span class="mini-sub-pro <?= $pageName == "products-categories.php" ? "text-danger" : null ?>">
                                        Product Categories
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a title="Compose Mail" href="./products-brands.php">
                                    <span class="mini-sub-pro <?= $pageName == "products-brands.php" ? "text-danger" : null ?>">
                                        Product Brands
                                    </span>
                                </a>
                            </li>
                        </ul></a></li></a>
                    </li>
                    <li> -->
                        <a class="" href="./regular_sales.php">
                            <!-- nalika orders -->
                            <i class="icon nalika-forms icon-wrap"></i>
                            <span class="mini-click-non <?= $pageName == "regular_sales.php" ? "text-danger" : null ?>">Regular Sales</span></a>
                    </li>
                    <li>
                        <a class="" href="./mobile_sales.php">
                            <!-- nalika users -->
                            <i class="icon nalika-user icon-wrap"></i>
                            <span class="mini-click-non <?= $pageName == "mobile_sales.php" ? "text-danger" : null ?>">Mobile Sales</span></a>
                    </li>
                    <li>
                        <a class="" href="./dues.php">
                            <!-- nalika users -->
                            <i class="icon nalika-user icon-wrap"></i>
                            <span class="mini-click-non <?= $pageName == "dues.php" ? "text-danger" : null ?>">Dues</span></a>
                    </li>
                    <!-- go to website -->
                    <li>
                        <a class="" href="../">
                            <!-- nalika home -->
                            <i class="icon nalika-home icon-wrap"></i>
                            <span class="mini-click-non">Go to Website</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>