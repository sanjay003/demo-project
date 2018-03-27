<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'event.php';



// First lets set some arguments for the query:
// Optionally, those could of course go directly into the query,
// especially, if you have no others but post type.
$args = array(
    'post_type' => 'post_type',
    'posts_per_page' => 5
    // Several more arguments could go here. Last one without a comma.
);

// Query the posts:
$obituary_query = new WP_Query($args);

// Loop through the obituaries:
while ($obituary_query->have_posts()) : $obituary_query->the_post();
    // Echo some markup
    echo '<p>';
    // As with regular posts, you can use all normal display functions, such as
    the_title();
    the_content();
    // Within the loop, you can access custom fields like so:
    echo get_post_meta($post->ID, 'birth_date', true); 
    // Or like so:
    $birth_date = get_post_custom_values('birth_date');
    echo $birth_date[0];
    echo '</p>'; // Markup closing tags.
endwhile;

// Reset Post Data
wp_reset_postdata();

?>
<?php echo "this is sanjay ";?>