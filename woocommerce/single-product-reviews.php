<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to
 * yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see           https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       4.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
if ( ! comments_open() ) {
	return;
}
?>
<div id="reviews" class="woocommerce-Reviews">
	<div class="review-rating-details row">
		<div class="review-rating-calculation col-md-3 col-lg-3 col-xl-3">
			<div class="review-rating-score">
				<span class="review-rating-score-average"><?php echo esc_html( $product->get_average_rating() ); ?></span>
				<span class="review-rating-score-max">/5</span>
			</div>
			<div class="review-rating-average">
				<div class="review-rating-container-star" style="width: <?php echo esc_attr( $product->get_average_rating() * 100 / 5 ); ?>%;">
					<i class="fa">&#x2605;&#x2605;&#x2605;&#x2605;&#x2605;</i>
				</div>
			</div>
			<div class="review-rating-count"><?php echo esc_html( $product->get_review_count() ) . esc_html__( ' Ratings', 'actavista' ); ?></div>
		</div>
		<div class="detail col-md-9 col-lg-8 col-xl-6">
			<ul>
				<li>
					<div class="review-rating-container-star review-rating-progress-title five">
						<i class="fa fa-star"></i> <i class="fa fa-star"></i>
						<i class="fa fa-star"></i> <i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
					<div class="review-rating-progress-wrap">
						<div class="progress review-rating-pdp-review-progress">
							<div class="progress-bar" role="progressbar" style="width: <?php echo actavista_set( $product->get_rating_counts(), 5 ) ? round( actavista_set( $product->get_rating_counts(), 5 ) * 100 / $product->get_review_count(), 5 ) . '%' : '0%'; ?>" aria-valuenow="<?php echo actavista_set( $product->get_rating_counts(), 5 ) ? round( actavista_set( $product->get_rating_counts(), 5 ) * 100 / $product->get_review_count(), 1 ) : '0'; ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<span class="review-rating-percent"><?php echo actavista_set( $product->get_rating_counts(), 5 ) ? round( actavista_set( $product->get_rating_counts(), 5 ) * 100 / $product->get_review_count(), 1 ) . '%' : '0%'; ?></span>
				</li>
				<li>
					<div class="review-rating-container-star review-rating-progress-title four">
						<i class="fa fa-star"></i> <i class="fa fa-star"></i>
						<i class="fa fa-star"></i> <i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
					<div class="review-rating-progress-wrap">
						<div class="progress review-rating-pdp-review-progress">
							<div class="progress-bar" role="progressbar" style="width: <?php echo actavista_set( $product->get_rating_counts(), 4 ) ? round( actavista_set( $product->get_rating_counts(), 4 ) * 100 / $product->get_review_count(), 5 ) . '%' : '0%'; ?>" aria-valuenow="<?php echo actavista_set( $product->get_rating_counts(), 4 ) ? round( actavista_set( $product->get_rating_counts(), 4 ) * 100 / $product->get_review_count(), 1 ) : '0'; ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<span class="review-rating-percent"><?php echo actavista_set( $product->get_rating_counts(), 4 ) ? round( actavista_set( $product->get_rating_counts(), 4 ) * 100 / $product->get_review_count(), 1 ) . '%' : '0%'; ?></span>
				</li>
				<li>
					<div class="review-rating-container-star review-rating-progress-title three">
						<i class="fa fa-star"></i> <i class="fa fa-star"></i>
						<i class="fa fa-star"></i> <i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
					<div class="review-rating-progress-wrap">
						<div class="progress review-rating-pdp-review-progress">
							<div class="progress-bar" role="progressbar" style="width: <?php echo actavista_set( $product->get_rating_counts(), 3 ) ? round( actavista_set( $product->get_rating_counts(), 3 ) * 100 / $product->get_review_count(), 5 ) . '%' : '0%'; ?>" aria-valuenow="<?php echo actavista_set( $product->get_rating_counts(), 3 ) ? round( actavista_set( $product->get_rating_counts(), 3 ) * 100 / $product->get_review_count(), 1 ) : '0'; ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<span class="review-rating-percent"><?php echo actavista_set( $product->get_rating_counts(), 3 ) ? round( actavista_set( $product->get_rating_counts(), 3 ) * 100 / $product->get_review_count(), 1 ) . '%' : '0%'; ?></span>
				</li>
				<li>
					<div class="review-rating-container-star review-rating-progress-title two">
						<i class="fa fa-star"></i> <i class="fa fa-star"></i>
						<i class="fa fa-star"></i> <i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
					<div class="review-rating-progress-wrap">
						<div class="progress review-rating-pdp-review-progress">
							<div class="progress-bar" role="progressbar" style="width: <?php echo actavista_set( $product->get_rating_counts(), 2 ) ? round( actavista_set( $product->get_rating_counts(), 2 ) * 100 / $product->get_review_count(), 5 ) . '%' : '0%'; ?>" aria-valuenow="<?php echo actavista_set( $product->get_rating_counts(), 2 ) ? round( actavista_set( $product->get_rating_counts(), 2 ) * 100 / $product->get_review_count(), 1 ) : '0'; ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<span class="review-rating-percent"><?php echo actavista_set( $product->get_rating_counts(), 2 ) ? round( actavista_set( $product->get_rating_counts(), 2 ) * 100 / $product->get_review_count(), 1 ) . '%' : '0%'; ?></span>
				</li>
				<li>
					<div class="review-rating-container-star review-rating-progress-title one">
						<i class="fa fa-star"></i> <i class="fa fa-star"></i>
						<i class="fa fa-star"></i> <i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
					<div class="review-rating-progress-wrap">
						<div class="progress review-rating-pdp-review-progress">
							<div class="progress-bar" role="progressbar" style="width: <?php echo actavista_set( $product->get_rating_counts(), 1 ) ? round( actavista_set( $product->get_rating_counts(), 1 ) * 100 / $product->get_review_count(), 5 ) . '%' : '0%'; ?>" aria-valuenow="<?php echo actavista_set( $product->get_rating_counts(), 1 ) ? round( actavista_set( $product->get_rating_counts(), 1 ) * 100 / $product->get_review_count(), 1 ) : '0'; ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<span class="review-rating-percent"><?php echo actavista_set( $product->get_rating_counts(), 1 ) ? round( actavista_set( $product->get_rating_counts(), 1 ) * 100 / $product->get_review_count(), 1 ) . '%' : '0%'; ?></span>
				</li>
			</ul>
		</div>
	</div>
	<div id="comments">
		<h2 class="woocommerce-Reviews-title"><?php
			if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) ) {
				/* translators: 1: reviews count 2: product name */
				printf( esc_html( _n( '%1$s Review', '%1$s Reviews', $count, 'actavista' ) ), esc_html( $count ) );
			} else {
				_e( 'Reviews', 'actavista' );
			}
			?></h2>
		<?php if ( have_comments() ) : ?>
			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>
		<?php else : ?>
			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'actavista' ); ?></p>
		<?php endif; ?>
	</div>
	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div id="review_form_wrapper" class="comment-respond">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12">
					<div id="review_form">
						<?php
						$commenter    = wp_get_current_commenter();
						$comment_form = array(
							'title_reply'         => have_comments() ? esc_html__( 'Add New Review:', 'actavista' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'actavista' ), get_the_title() ),
							'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'actavista' ),
							'title_reply_before'  => '<h3 id="reply-title" class="reply-title">',
							'title_reply_after'   => '</h3>',
							'comment_notes_after' => '',
							'fields'              => array(
								'author' => '<p class="comment-form-author"><label>' . esc_html__( 'Your Name*', 'actavista' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" size="30" aria-required="true" required /></p>',
								'email'  => '<p class="comment-form-email"><label>' . esc_html__( 'Email*', 'actavista' ) . '</label><input id="email" name="email" type="email" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" size="30" aria-required="true" required /></p>',
							),
							'label_submit'        => esc_html__( 'Submit', 'actavista' ),
							'logged_in_as'        => '',
							'comment_field'       => '',
						);
						if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
							$comment_form[ 'must_log_in' ] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be <a href="%s">logged in</a> to post a review.', 'actavista' ), esc_url( $account_page_url ) ) . '</p>';
						}
						if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
							$comment_form[ 'comment_field' ] = '<div class="comment-form-rating"><select name="rating" id="rating" aria-required="true" required>
                                                    <option value="">' . esc_html__( 'Rate&hellip;', 'actavista' ) . '</option>
                                                    <option value="5">' . esc_html__( 'Perfect', 'actavista' ) . '</option>
                                                    <option value="4">' . esc_html__( 'Good', 'actavista' ) . '</option>
                                                    <option value="3">' . esc_html__( 'Average', 'actavista' ) . '</option>
                                                    <option value="2">' . esc_html__( 'Not that bad', 'actavista' ) . '</option>
                                                    <option value="1">' . esc_html__( 'Very poor', 'actavista' ) . '</option>
                                            </select></div>';
						}
						$comment_form[ 'comment_field' ] .= '<p class="comment-notes"><label>' . esc_html__( 'Enter your reviews*', 'actavista' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea></p>';
						comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
						?>
					</div>
				</div>
			</div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'actavista' ); ?></p>
	<?php endif; ?>
	<div class="clear"></div>
</div>
