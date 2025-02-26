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
                    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .blog-box {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            transition: transform 0.3s ease-in-out;
        }
        .blog-box:hover {
            transform: translateY(-5px);
        }
        .blog-img img {
            width: 100%;
            height: auto;
        }
        .blog-content {
            padding: 20px;
        }
        .blog-content h3 {
            color: #333;
            font-size: 20px;
            margin-bottom: 10px;
        }
        .blog-content p {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .blog-content a {
            display: inline-block;
            text-decoration: none;
            background: #ff6b6b;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 14px;
            transition: background 0.3s;
        }
        .blog-content a:hover {
            background: #e63946;
        }
        @media (max-width: 600px) {
            .blog-box {
                max-width: 90%;
            }
        }
    </style>
<body>
    <div class="blog-box">
        <div class="blog-img">
            <img src="https://via.placeholder.com/400x200" alt="Blog Image">
        </div>
        <div class="blog-content">
            <h3>Responsive Blog Design</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi eget nulla scelerisque aliquam.</p>
            <a href="#">Read More</a>
        </div>
    </div>
</body>
                </div>