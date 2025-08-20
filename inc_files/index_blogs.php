<section class="blogs_section">
    <div class="blogs-container">
        <?php 
            // Sample data for blogs
            $blogs = [
                [
                    'image'   => 'images/blog.jpg',
                    'title'   => 'Why BLDC Fans Are the Future of Energy-Efficient Cooling',
                    'content' => "In today’s world, where energy efficiency and sustainable living are becoming top priorities, every appliance in our homes is undergoing a transformation - and the humble ceiling fan is no exception. Leading the change is the BLDC fan, a cutting-edge innovation redefining the role of fans in modern spaces. Whether you're upgrading your electric fan or building a smart home, a BLDC ceiling fan is one of the smartest choices you can make",
                    'link'    => '#'
                ],
                [
                    'image'   => 'images/blog.jpg',
                    'title'   => 'BLDC vs Traditional Ceiling Fans: Which One Should You Choose?',
                    'content' => "Understanding the Basics: Electric Fans vs. BLDC Fans As energy efficiency and smart technology take center stage in modern homes, the humble ceiling fan is undergoing a remarkable transformation. Today, homeowners are increasingly choosing BLDC fans over traditional electric fans for their performance, savings, and smart features. If you’re considering upgrading your cooling system, this detailed guide will help you understand why a smart fan like the Haneri Fan might be the right choice for you.",
                    'link'    => '#'
                ],
                [
                    'image'   => 'images/blog.jpg',
                    'title'   => 'How Smart Fans Are Revolutionizing Home Comfort',
                    'content' => "In today's fast-evolving world of home automation, the humble ceiling fan is undergoing a dramatic transformation. No longer just a basic cooling device, the modern smart fan is becoming a vital part of intelligent living spaces. Brands like Haneri Fan are leading the way with cutting-edge BLDC fan technology, offering smarter, quieter, and more energy-efficient alternatives to traditional electric fans. If you're still relying on conventional ceiling fans, it might be time to upgrade your comfort and efficiency with a smart fan.",
                    'link'    => '#'
                ]
            ];

            // Function to truncate blog content to 500 words
            function truncate_content($content, $word_limit = 100) {
                $words = explode(' ', $content);
                if (count($words) > $word_limit) {
                    $content = implode(' ', array_slice($words, 0, $word_limit)) . '...';
                }
                return $content;
            }

            // Loop through each blog item and display
            foreach ($blogs as $blog) {
                // Truncate content if it exceeds 500 words
                $truncated_content = truncate_content($blog['content']);
                
                echo "
                    <div class='blog-item'>
                        <div class='contents'>
                            <div class='blog-image'>
                                <img src='{$blog['image']}' alt='Blog Image'>
                            </div>
                            <div class='blog-content'>
                                <h3 class='blog-title'>{$blog['title']}</h3>
                                <p class='blog-snippet'>{$truncated_content}</p>
                            </div>
                            <a href='{$blog['link']}' class='btn btn_darkGreen read-more-button'>Read More</a>
                        </div>
                    </div>
                ";
            }
        ?>

    </div>
</section>