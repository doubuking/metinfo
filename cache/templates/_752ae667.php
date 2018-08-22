<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>
<ul class="nav nav-tabs nav-tabs-line m-b-10">
	        <?php
            $sub = count($_M['pay_nav']);
            $num = 30;
            if(!is_array($_M['pay_nav'])){
                $_M['pay_nav'] = explode('|',$_M['pay_nav']);
            }
            foreach ($_M['pay_nav'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($_M['pay_nav'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $v = $val;
            ?>
	<li class='nav-item'><a class="nav-link <?php echo $v['active'];?>" href="<?php echo $v['url'];?>"><?php echo $v['name'];?></a></li>
	<?php }?>
</ul>
<div class="alert alert-danger"><?php echo $word['pay_tips2'];?></div>