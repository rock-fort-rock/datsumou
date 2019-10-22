<select onChange="location.href=value;">
	<option selected>カテゴリ選択</option>
	<?php
		$parent_terms = get_terms('category', array('parent' => 0) );
		foreach($parent_terms as $parent_value):
	?>
	<optgroup label="<?php echo $parent_value->name; ?>">
		<?php $parent_url = ($parent_value->description)?$parent_value->description:esc_url( get_category_link( $parent_value->term_id ) ); ?>
		<option value="<?php echo $parent_url; ?>"><?php echo $parent_value->name; ?>一覧</option>
		<?php
			$parent_id = $parent_value->term_id;
			$child_terms = get_terms( 'category', array('parent' => $parent_id) );
			foreach($child_terms as $child_value):
			$child_url = ($child_value->description)?$child_value->description:esc_url( get_category_link( $child_value->term_id ) );
		?>
		<option value="<?php echo $child_url; ?>"><?php echo $child_value->name; ?></option>
		<?php endforeach; ?>
	</optgroup>
	<?php endforeach; ?>
</select>
