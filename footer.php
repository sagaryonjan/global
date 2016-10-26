<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Global
 */

$background_color = get_theme_mod('global_footer_background_color');
?>

	</div><!-- #content -->

		<footer class="ts-footer" style="background-color:<?php echo $background_color ?>; ">
			<!--<div class="ts-container">
				<?php /*if (is_active_sidebar('global_footer1_area') || is_active_sidebar('global_footer2_area') || is_active_sidebar('global_footer3_area') || is_active_sidebar('global_footer4_area')) : */?>
					<div class="ts-footer-block ts-clearblock ts-footer-column-<?php /*echo global_footer_count(); */?>">
						<?php /*if (is_active_sidebar('global_footer1_area')) { */?>
							<div class="ts-footer-single">
								<?php
/*								if (!dynamic_sidebar('global_footer1_area')):
								endif;
								*/?>
							</div>
						<?php /*} */?>

						<?php /*if (is_active_sidebar('global_footer2_area')) { */?>
							<div class="ts-footer-single">
								<?php
/*								if (!dynamic_sidebar('global_footer2_area')):
								endif;
								*/?>

							</div>
						<?php /*} */?>

						<?php /*if (is_active_sidebar('global_footer3_area')) { */?>
							<div class="ts-footer-single">
								<?php
/*								if (!dynamic_sidebar('global_footer3_area')):
								endif;
								*/?>
							</div>
						<?php /*} */?>
						<?php /*if (is_active_sidebar('global_footer4_area')) { */?>
							<div class="ts-footer-single">
								<?php
/*								if (!dynamic_sidebar('global_footer4_area')):
								endif;

								*/?>
							</div>
						<?php /*} */?>
					</div>
				<?php /*endif; */?>

			</div>   -->

			<div class="ts-container">
				<div class="ts-footer-block ts-clearblock ts-footer-column-4">
					<div class="ts-footer-single">
						<section id="categories-3" class="widget widget_categories">
							<h2 class="widget-title">Categories</h2>
							<ul>
								<li class="cat-item cat-item-2"><a href="http://localhost/productpage/category/product/">Product</a> (1)
								</li>
								<li class="cat-item cat-item-3"><a href="http://localhost/productpage/category/single/">Single</a> (1)
								</li>
							</ul>
						</section>
					</div>
					<div class="ts-footer-single">
						<section id="archives-3" class="widget widget_archive">
							<h2 class="widget-title">Archives</h2>
							<ul>
								<li><a href="http://localhost/productpage/2016/08/">August 2016</a></li>
							</ul>
						</section>
					</div>
					<div class="ts-footer-single">
						<section id="calendar-2" class="widget widget_calendar">
							<h2 class="widget-title">Calendar</h2>
							<div id="calendar_wrap" class="calendar_wrap">
								<table id="wp-calendar">
									<caption>September 2016</caption>
									<thead>
									<tr>
										<th scope="col" title="Monday">M</th>
										<th scope="col" title="Tuesday">T</th>
										<th scope="col" title="Wednesday">W</th>
										<th scope="col" title="Thursday">T</th>
										<th scope="col" title="Friday">F</th>
										<th scope="col" title="Saturday">S</th>
										<th scope="col" title="Sunday">S</th>
									</tr>
									</thead>
									<tfoot>
									<tr>
										<td colspan="3" id="prev"><a href="http://localhost/productpage/2016/08/">« Aug</a></td>
										<td class="pad">&nbsp;</td>
										<td colspan="3" id="next" class="pad">&nbsp;</td>
									</tr>
									</tfoot>
									<tbody>
									<tr>
										<td colspan="3" class="pad">&nbsp;</td>
										<td>1</td>
										<td>2</td>
										<td>3</td>
										<td>4</td>
									</tr>
									<tr>
										<td>5</td>
										<td>6</td>
										<td>7</td>
										<td>8</td>
										<td>9</td>
										<td>10</td>
										<td>11</td>
									</tr>
									<tr>
										<td>12</td>
										<td>13</td>
										<td>14</td>
										<td>15</td>
										<td>16</td>
										<td>17</td>
										<td>18</td>
									</tr>
									<tr>
										<td>19</td>
										<td>20</td>
										<td>21</td>
										<td>22</td>
										<td>23</td>
										<td>24</td>
										<td>25</td>
									</tr>
									<tr>
										<td>26</td>
										<td>27</td>
										<td>28</td>
										<td id="today">29</td>
										<td>30</td>
										<td class="pad" colspan="2">&nbsp;</td>
									</tr>
									</tbody>
								</table>
							</div>
						</section>
					</div>
					<div class="ts-footer-single">
						<section id="recent-posts-3" class="widget widget_recent_entries">
							<h2 class="widget-title">Recent Post</h2>
							<ul>
								<li>
									<a href="http://localhost/productpage/2016/08/31/hello-world/">Hello world!</a>
									<span class="post-date">August 31, 2016</span>
								</li>
							</ul>
						</section>
					</div>
				</div>
			</div>
			<div class="ts-bottom-footer">
				<div class="ts-container">
					<div class="ts-footer-bottom">
						<div class="ts-container">
							<p class="ts-left"> © <a href="http://localhost/productpage/" title="ProductPage">Global</a> 2016. All Right Reserved. | Powered by <a href="http://wordpress.org" target="_blank" title="WordPress"><span>WordPress</span></a>.</p>
							<p class="ts-right">Designed By <a href="http://themespade.com/" target="_blank" title="themespade" rel="designer"><span>ThemeSpade ♠ </span></a>.</p>
						</div>
					</div>
				</div>
			</div>
		<!--	--><?php /*global_footer_copyright_info(); */?>

		</footer>

		<div class="ts-scroll-top">
			<span class="ts-scroll-top-inner"><i class="fa fa-long-arrow-up"></i></span>
		</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
