<?php
	//якщо натиснута кнопка "Save"
	if ( isset($_POST['post_icon_form']) ) {
		$posts_id = $_POST['posts_id'];
		$icon_class = $_POST['icon_class'];
		$active = $_POST['active'];
		$icon_position = $_POST['icon_position'];
		global $message;
		
		//перевірка чи були всі поля заповнені (крім поля "active")
		if ( !empty($posts_id) && !empty($icon_class) && !empty($icon_position) ) {
			//оновлення значень усіх полів
			update_option('posts_id', $posts_id );
			update_option('icon_class', $icon_class );
			update_option('active', $active );
			update_option('icon_position', $icon_position );
			$message = 'Налаштування збережено';
		}
		//якщо не заповнене хоча б одне з полів
		else {
			$message = 'Не всі поля заповнені!';
		}
	}

?>