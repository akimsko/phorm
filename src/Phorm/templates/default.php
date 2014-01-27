<<?php
	echo $element->getType();
	foreach($element->getAttributes() as $name=>$value){
		echo " $name=\"$value\"";
	}
?>>
<?php if (isset($children)): ?>
<?php foreach ($children as $child): ?>
	<?php echo $this->render($child); ?>
<?php endforeach; ?>
</<?php echo $element->getType(); ?>>
<?php endif; ?>
