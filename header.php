<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
	
	<header>
		<nav>
			<ul class="main-menu">
				<?php
					$menu = my_get_menu("main-nav");
					$numItems = count($menu);
					$i = 0;
					foreach($menu as $item) :
				
						//First level menu ?>
						<?php if (count($item->children) === 0) : ?>
							<?php if ($i < ($numItems-1)) : ?>
								<li class="menu--element">
									<a class="menu-link 
									<?php 
										if (get_permalink($the_page) == $item->url) {
											echo "active";
										}
									?>
									" href="<?php echo $item->url; ?>">
										<?php echo $item->title; ?> 
									</a>
								</li>
							<?php endif; ?>

							<?php  if ($i === ($numItems-1)) : ?>
								<li><a href="<?php echo $item->url; ?>" class="btn btn-primary"><?php echo $item->title; ?></a></li>
							<?php endif; ?>
						<?php endif; ?>
						
						<?php 
							//Second level menu
							if(count($item->children) > 0) :
						?>
							<li class="submenu-li">
								<a class="menu-link" href="<?php echo $item->url; ?>">
									<?php echo $item->title; ?>
								</a>
								<i class="fas fa-chevron-down fa-xs"></i>
								<ul class="submenu">
									<?php foreach($item->children as $child) { ?>
									<li>
										<a href="<?php echo $child->url; ?>">
											<?php echo $child->title; ?>
										</a>
									</li>
									<?php } ?>
								</ul>
							</li>
						<?php endif; ?>
						<?php $i++; ?>
					<?php endforeach; ?>
			</ul>
		</nav>
	</header>