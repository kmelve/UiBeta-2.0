<div class="large-6 columns show-for-medium-up">
	<div class="contain-to-grid">
		<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<!-- Title Area -->

				<li class="toggle-topbar">
					<a href="#"><span>MENY</span></a>
				</li>
			</ul>
			<section class="top-bar-section">
				<?php joints_main_nav(); ?>
			</section>
		</nav>
	</div>
</div>



<div class="small-6 columns show-for-small-only">
	<div class="contain-to-grid">
		<nav class="tab-bar">
			<section class="right">
				<a class="left-off-canvas-toggle btn btn-orange btn-border-rev" >MENY</a>
			</section>
		</nav>
	</div>
</div>

<aside class="left-off-canvas-menu show-for-small-only">
	<ul class="off-canvas-list">
		<li><label>Navigasjon</label></li>
			<?php joints_main_nav(); ?>
	</ul>
</aside>

<a class="exit-off-canvas"></a>
