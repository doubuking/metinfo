<?php defined('IN_MET') or exit('No permission'); ?>
<main class="$uicss page-content" m-id='{$ui.mid}'>
	<div class="container">
		<div class="row">
			<div class="met-search-body panel panel-body m-b-0">
				<tag action="search.form"></tag>
				<ul class="list-group list-group-full list-group-dividered m-t-20 met-pager-ajax met-search-list" >
					<include file='ui_ajax/search'/>
				</ul>
<!--分页-->
			<div class='m-t-20 text-xs-center hidden-sm-down' m-type="nosysdata">
			    <pager/>
			</div>
			<div class="met_pager met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-type="nosysdata">
			    <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left" data-url="" data-page="1">
			        <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
			    </button>
			</div>
<!--分页-->
			</div>
		</div>
	</div>
</main>