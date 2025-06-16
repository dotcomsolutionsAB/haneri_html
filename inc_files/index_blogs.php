<section class="blogs_section">
    <div class="blogs-container">
        <?php 
            // Sample data for blogs
            $blogs = [
                [
                    'image'   => 'images/blog.jpg',
                    'title'   => 'Blog Title 1',
                    'content' => 'Haneri is the brainchild of a passionate team with over 75 years of collective experience in the consumer durable industry. With expertise spanning product creation, innovation, engineering, and manufacturing.',
                    'link'    => '#'
                ],
                [
                    'image'   => 'images/blog.jpg',
                    'title'   => 'Blog Title 2',
                    'content' => 'Haneri is the brainchild of a passionate team with over 75 years of collective experience in the consumer durable industry. With expertise spanning product creation, innovation, engineering, and manufacturing.',
                    'link'    => '#'
                ],
                [
                    'image'   => 'images/blog.jpg',
                    'title'   => 'Blog Title 3',
                    'content' => 'Haneri is the brainchild of a passionate team with over 75 years of collective experience in the consumer durable industry. With expertise spanning product creation, innovation, engineering, and manufacturing.',
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
                            <a href='{$blog['link']}' class='btn btn_darkGreen read-more-button'>Read More</a>
                        </div>
                    </div>
                ";
            }
        ?>
    </div>
</section>