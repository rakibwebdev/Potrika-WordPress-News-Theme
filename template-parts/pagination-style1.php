<?php 

global $wp_query;

// stop execution if there's only 1 page
if ( $wp_query->max_num_pages <= 1 ){
    return;
}

$potrika_paged	 = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
$potrika_max	 = intval( $wp_query->max_num_pages );

// add current page to the array
if ( $potrika_paged >= 1 ){
    $potrika_links[] = $potrika_paged;
}

// add the pages around the current page to the array
if ( $potrika_paged >= 3 ) {
    $potrika_links[] = $potrika_paged - 1;
    $potrika_links[] = $potrika_paged - 2;
}

if ( ( $potrika_paged + 2 ) <= $potrika_max ) {
    $potrika_links[] = $potrika_paged + 2;
    $potrika_links[] = $potrika_paged + 1;
}

echo '<ul class="pagination justify-content-center">' . "\n";

// previous Post Link
if ( get_previous_posts_link() ){
    printf( '<li>%s</li>' . "\n", wp_kses_post(get_previous_posts_link( '<i class="fa fa-long-arrow-left"></i>' )) );
}

// link to first page, plus ellipses if necessary
if ( !in_array( 1, $potrika_links ) ) {
    $potrika_class = 1 == $potrika_paged ? ' class="active"' : '';

    printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", esc_attr($potrika_class), esc_url( get_pagenum_link( 1 ) ), '1' );

    if ( !in_array( 2, $potrika_links ) )
        echo '<li class="pagination-dots">&middot;&middot;&middot;</li>';
}

// link to current page, plus 2 pages in either direction if necessary
sort( $potrika_links );
foreach ( (array) $potrika_links as $potrika_link ) {
    $potrika_class = $potrika_paged == $potrika_link ? ' class="active"' : '';
    printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", esc_attr($potrika_class), esc_url( get_pagenum_link( $potrika_link ) ), wp_kses_post($potrika_link) );
}

// link to last page, plus ellipses if necessary
if ( !in_array( $potrika_max, $potrika_links ) ) {
    if ( !in_array( $potrika_max - 1, $potrika_links ) )
        echo '<li>&middot;&middot;&middot;</li>';

    $potrika_class = $potrika_paged == $potrika_max ? ' class="active"' : '';
    printf( '<li%s><a class="page-link" href="%s" >%s</a></li>' . "\n", esc_attr($potrika_class), esc_url( get_pagenum_link( $potrika_max ) ), esc_html($potrika_max) );
}

// next Post Link
if ( get_next_posts_link() ){
    printf( '<li>%s</li>' . "\n", wp_kses_post(get_next_posts_link( '<i class="fa fa-long-arrow-right"></i>' )) );
}

echo '</ul>' . "\n";