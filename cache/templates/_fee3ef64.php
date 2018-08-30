<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>


<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" name="username" required class="form-control" placeholder="<?php echo $_M['word']['memberName'];?>"
               data-fv-remote="true"
               data-fv-remote-url="<?php echo $_M['url']['register_userok'];?>"
               data-fv-remote-message="<?php echo $_M['word']['userhave'];?>"

               data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"

               data-fv-stringlength="true"
               data-fv-stringlength-min="2"
               data-fv-stringlength-max="30"
               data-fv-stringlength-message="<?php echo $_M['word']['usernamecheck'];?>"
        />
    </div>
</div>

<div class="form-group">
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
		<input type="email" name="email" required class="form-control" placeholder="<?php echo $_M['word']['memberemail'];?>"
		data-fv-remote="true"
		data-fv-remote-url="<?php echo $_M['url']['register_useremailok'];?>"
		data-fv-remote-message="<?php echo $_M['word']['emailhave'];?>"

		data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"

		data-fv-emailaddress="true"
		data-fv-emailaddress-message="<?php echo $_M['word']['emailcheck'];?>"
		/>
	</div>
</div>
<div class="form-group">
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
		<input type="password" name="password" required class="form-control" placeholder="<?php echo $_M['word']['password'];?>"
		data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"

		data-fv-identical="true"
		data-fv-identical-field="confirmpassword"
		data-fv-identical-message="<?php echo $_M['word']['passwordsame'];?>"

		data-fv-stringlength="true"
		data-fv-stringlength-min="3"
		data-fv-stringlength-max="30"
		data-fv-stringlength-message="<?php echo $_M['word']['passwordcheck'];?>"
		>
	</div>
</div>


<div class="form-group">
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
		<input type="password" name="confirmpassword" required data-password="password" class="form-control" placeholder="<?php echo $_M['word']['renewpassword'];?>"
		data-fv-identical="true"
		data-fv-identical-field="password"
		data-fv-identical-message="<?php echo $_M['word']['passwordsame'];?>"
		>
	</div>
</div>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-group"></i></span>
            <input type="text" name="enterprisel" required class="form-control" placeholder="企业名称"
                   data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"

                   data-fv-stringlength="true"
                   data-fv-stringlength-min="2"
                   data-fv-stringlength-max="30"
                   data-fv-stringlength-message="请正确填写"
            />
        </div>
    </div>


    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <input type="text" name="enterprisel_phone" required class="form-control" placeholder="联系电话(可以是座机或手机)"
                   data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"
                   data-fv-phone="true"
                   data-fv-phone-message="<?php echo $_M['word']['telok'];?>"

                   data-fv-stringlength="true"
                   data-fv-stringlength-min="2"
                   data-fv-stringlength-max="30"
                   data-fv-stringlength-message="请正确填写"
            />
        </div>
    </div>





    <div class="form-group">
        <div class="input-group">
            以下内容为选填
        </div>
    </div>



    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-male"></i></span>
            <input type="text" name="contacts"  class="form-control" placeholder="联系人"

            />
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
            <input type="text" name="contacts_phone"  class="form-control" placeholder="联系人电话"
                   data-fv-phone="true"
                   data-fv-phone-message="<?php echo $_M['word']['telok'];?>"
            />
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
            <input type="text" name="contacts_post"  class="form-control" placeholder="职位"

            />
        </div>
    </div>


    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-institution"></i></span>
            <input type="text" name="enterprisel_address"  class="form-control" placeholder="公司地址"

            />
        </div>
    </div>


<?php
 if($_M['config']['met_memberlogin_code']){ ?>
<div class="form-group">
    <div class="input-group input-group-icon">
        <span class="input-group-addon"><i class="fa fa-shield"></i></span>
        <input type="text" name="code" required class="form-control" placeholder="<?php echo $_M['word']['memberImgCode'];?>" data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>">
        <div class="input-group-addon p-5 login-code-img">
            <img src="<?php echo $_M[url][entrance];?>?m=include&c=ajax_pin&a=dogetpin" title="<?php echo $_M['word']['memberTip1'];?>" id='getcode' align="absmiddle" role="button">
        </div>
    </div>
</div>

<?php } ?>