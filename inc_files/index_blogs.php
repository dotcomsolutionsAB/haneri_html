        <!-- Blogs Section -->
        <div class="container">
            <section class="blogs_section">
                <h2 class="heading_1">BLOGS</h2>
                <div class="blogs-container">
                    <?php 
                    $blogs = [
                        "images/f14.png", 
                        "images/f15.png", 
                        "images/f16.png"
                    ];
                    foreach ($blogs as $blog) {
                        echo "<div class='blog-item'>
                                <img src='$blog' alt='Blog Image'>
                              </div>";
                    }
                    ?>