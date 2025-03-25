<section class="blogs_section">
    <h2 class="heading_1">BLOGS</h2>
    <div class="blogs-container">
        <?php 
            // Sample data for blogs
            $blogs = [
                [
                    'image'   => 'images/f14.png',
                    'title'   => 'Blog Title 1',
                    'content' => 'This is a short snippet or summary of the blog content for Blog Title 1...',
                    'link'    => '#'
                ],
                [
                    'image'   => 'images/f15.png',
                    'title'   => 'Blog Title 2',
                    'content' => 'A short snippet or summary for Blog Title 2. This could be a couple of lines...',
                    'link'    => '#'
                ],
                [
                    'image'   => 'images/f16.png',
                    'title'   => 'Blog Title 3',
                    'content' => 'A short snippet or summary for Blog Title 3. Add a teaser or interesting excerpt...',
                    'link'    => '#'
                ]
            ];

            // Loop through each blog item
            foreach ($blogs as $blog) {
                echo "
                    <div class='blog-item'>
                        <div class='contents'>
                            <div class='blog-image'>
                                <img src='{$blog['image']}' alt='Blog Image'>
                            </div>
                            <div class='blog-content'>
                                <h3 class='blog-title'>{$blog['title']}</h3>
                                <p class='blog-snippet'>{$blog['content']}</p>
                            </div>
                        </div>
                        <div class='btns'>
                            <a href='{$blog['link']}' class='btn btn_darkGreen read-more-button'>Read More</a>
                        </div>
                    </div>
                ";
            }
        ?>
    </div>
</section>