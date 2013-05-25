<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<div id="commentlist"> 
<h3 id="comments"><?php comments_number('No Comment', 'One Comment', '% Comments' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

<?php if ( have_comments() ) : ?>

	<ol>
	<?php wp_list_comments(); ?>
	</ol>

	<div id="commentnavi">
		<div class="prev"><?php previous_comments_link('Older Comments') ?></div>
		<div class="next"><?php next_comments_link('Newer Comments') ?></div>
	<div class="clr"></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
		<ol><li class="odd">No Comment yet. Be the first to comment...</li></ol>
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<ol><li class="odd">Comments are closed.</li></ol>

	<?php endif; ?>
<?php endif; ?>
</div>

<?php if ('open' == $post->comment_status) : ?>

<div id="respond">
<h3>Leave your comment here:</h3>
<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<p><input class="textfield" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input class="textfield" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input class="textfield" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website (Optional)</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea class="text_input text_area" name="comment" id="comment" rows="7" tabindex="4" cols="100%"></textarea></p>
	<div id="submitbox">
		<a class="feed" href="<?php bloginfo('comments_rss2_url'); ?>">Subscribe to comments feed</a>
		<div class="submitbutton">
			<input name="submit" type="submit" id="submit" class="button" tabindex="5" value="Submit Comment" />
		</div>

		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		<div class="fixed"></div>
	</div>

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
