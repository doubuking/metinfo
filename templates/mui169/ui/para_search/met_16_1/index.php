<?php defined('IN_MET') or exit('No permission'); ?>
<if value="$data[index_num] neq 163">
<div class="$uicss" m-id='{$ui.mid}'>
	<div class="<if value="$ui['type'] eq 1">container<else/>container-fluid</if>">
		<div class="row">
			<tag action='search.option' type="page" order="1"></tag>
				<list data="$search.para" name="$type"></list>
				<if value="$sub && $ui['attr_ok']">
				    <div class="type-order">
				    	<list data="$search.para" name="$type">
				    	<div class="clearfix">
				    		<div class="attr-name col-xl-1 col-lg-2 col-md-2 col-sm-3">{$type.name}：</div>
				    		<ul class="type-order-attr col-xl-11 col-lg-10 col-md-10 col-sm-9">
								<list data="$type.list" name="$attr" >
									<li class="inline-block attr-value {$attr.check}"><a href="{$attr.url}" class="p-x-10 p-y-5">{$attr.name}</a></li>
								</list>
				    		</ul>
				    	</div>
				    	</list>
				    </div>
				</if>
				<if value="$ui['sort_ok']">
					<tag action='search.option' type="page" order="1"></tag>
					<div class="clearfix">
						<ul class="order m-y-20 p-0">
						<list data="$search.order" name="$res">
						<li class="order-list inline-block m-r-10"><a href="{$res.url}" class="p-x-10 p-y-5">{$res.name}<i class="icon wb-triangle-up" aria-hidden="true"></i></a></li>
						</list>
						</ul>
					</div>
				</if>
		</div>
	</div>
</div>
</if>
