<?php include("header.php"); ?>

<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index"><i class="icon-home"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					Blog
				</li>
			</ol>
		</div>
	</nav>

	<div class="blog_section">
		<!-- Blog Section -->
		<?php
            // Sample data for blogs
            $blogs = [
                [
                    'image'   => 'images/blog.jpg',
                    'title'   => 'Why BLDC Fans Are the Future of Energy-Efficient Cooling',
                    'content' => "In today’s world, where energy efficiency and sustainable living are becoming top priorities, every appliance in our homes is undergoing a transformation - and the humble ceiling fan is no exception. Leading the change is the BLDC fan, a cutting-edge innovation redefining the role of fans in modern spaces. Whether you're upgrading your electric fan or building a smart home, a BLDC ceiling fan is one of the smartest choices you can make.
                    Among these innovations stands the Haneri Fan, an example of performance, intelligence, and design. With the perfect balance of form and function, this smart fan reflects the future of energy-conscious living.
                    Understanding the BLDC Advantage
                    A BLDC fan, or Brushless Direct Current fan, replaces the traditional induction motor with a brushless motor and electronic control system. This not only reduces energy consumption drastically but also delivers smooth, consistent airflow.
                    Unlike conventional electric fans, a BLDC fan consumes about 65% less electricity while delivering equal or superior performance. This makes it a game-changer for homes, offices, and commercial spaces. For instance, fans like the Haneri Fan operate on as low as 25-35 watts, compared to the 70-90 watts drawn by standard ceiling fans - a major shift in both savings and sustainability.",
                    'link'    => '#',
                    'id'      => 'blog1'
                ],
                [
                    'image'   => 'images/blog.jpg',
                    'title'   => 'BLDC vs Traditional Ceiling Fans: Which One Should You Choose?',
                    'content' => "Understanding the Basics: Electric Fans vs. BLDC Fans As energy efficiency and smart technology take center stage in modern homes, the humble ceiling fan is undergoing a remarkable transformation. Today, homeowners are increasingly choosing BLDC fans over traditional electric fans for their performance, savings, and smart features. If you’re considering upgrading your cooling system, this detailed guide will help you understand why a smart fan like the Haneri Fan might be the right choice for you.",
                    'link'    => '#',
                    'id'      => 'blog2'
                ],
                [
                    'image'   => 'images/blog.jpg',
                    'title'   => 'How Smart Fans Are Revolutionizing Home Comfort',
                    'content' => "In today's fast-evolving world of home automation, the humble ceiling fan is undergoing a dramatic transformation. No longer just a basic cooling device, the modern smart fan is becoming a vital part of intelligent living spaces. Brands like Haneri Fan are leading the way with cutting-edge BLDC fan technology, offering smarter, quieter, and more energy-efficient alternatives to traditional electric fans. If you're still relying on conventional ceiling fans, it might be time to upgrade your comfort and efficiency with a smart fan.",
                    'link'    => '#',
                    'id'      => 'blog3'
                ]
            ];

            // Function to truncate blog content to 500 words
            function truncate_content($content, $word_limit = 500) {
                $words = explode(' ', $content);
                if (count($words) > $word_limit) {
                    $content = implode(' ', array_slice($words, 0, $word_limit)) . '...';
                }
                return $content;
            }

            // Loop through each blog item and display full content in a section
            foreach ($blogs as $blog) {
                // Truncate content if it exceeds 500 words
                $truncated_content = truncate_content($blog['content']);
                
                echo "
                    <section id='{$blog['id']}' class='blog-section'>
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
                    </section>
                ";
            }
        ?>

		<div class="mb-2"></div>
	</div>

<div class="mb-2"></div>
</main>

<?php include("footer.php"); ?>