<?php
	//підключення файлу для обробки даних з форми
	require_once 'check-form-data.php';
?>

<h1>Settings Post icon</h1>

<?php
	$posts_id = get_option('posts_id');
	$icon_class = get_option('icon_class');
	$active = get_option('active');
	$icon_position = get_option('icon_position');
	global $message;
?>

<form class="post-icon-form" method="POST" action="">
	<input type="hidden" name="post_icon_form" value="true">
	<p>
		<label for="posts_id">Posts ID:</label>
		<input id="posts_id" type="text" name="posts_id" value="<?php echo $posts_id; ?>" required>
	</p>
	<p>
		<label for="icon_class">Icon class:</label>
		<input id="icon_class" type="text" name="icon_class" value="<?php echo $icon_class; ?>" required>
	</p>
	<p>
		<label for="active">Active:</label>
		<input id="active" type="checkbox" name="active" <?php echo ($active == "on") ? "checked" : ""; ?>>
	</p>
	<p>
		<label for="icon_position">Position:</label>
		<select id="icon_position" name="icon_position">
			<option value="Left" <?php if($icon_position == "Left") echo "selected";?>>Left</option>
			<option value="Right" <?php if($icon_position == "Right") echo "selected";?>>Right</option>
		</select>
	</p>
	<p>
		<input class="button-primary" type="submit" value="Save">
	</p>
</form>
<hr>
<p><?php echo $message; ?></p>




