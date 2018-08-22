<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
if(!$foot_no){
	$foot = str_replace('$metcms_v',$_M['config']['metcms_v'], $_M['config']['met_agents_copyright_foot']);
	$foot = str_replace('$m_now_year',date('Y',time()), $foot);
?>
</div>
<footer class="metadmin-foot container-fluid m-t-10 grey-600"><?php echo $foot;?></footer>
<?php } ?>
<button type="button" class="btn btn-icon btn-primary btn-squared met-scroll-top" hidden><i class="icon wb-chevron-up" aria-hidden="true"></i></button>
</body>
<script>
var MET=[];
MET['url']=[];
MET['langtxt'] = {
	"jsx15":"<?php echo $_M['word']['jsx15'];?>",
	"js35":"<?php echo $_M['word']['js35'];?>",
	"jsx17":"<?php echo $_M['word']['jsx17'];?>",
	"formerror1":"<?php echo $_M['word']['formerror1'];?>",
	"formerror2":"<?php echo $_M['word']['formerror2'];?>",
	"formerror3":"<?php echo $_M['word']['formerror3'];?>",
	"formerror4":"<?php echo $_M['word']['formerror4'];?>",
	"formerror5":"<?php echo $_M['word']['formerror5'];?>",
	"formerror6":"<?php echo $_M['word']['formerror6'];?>",
	"formerror7":"<?php echo $_M['word']['formerror7'];?>",
	"formerror8":"<?php echo $_M['word']['formerror8'];?>",
	"js46":"<?php echo $_M['word']['js46'];?>",
	"js23":"<?php echo $_M['word']['js23'];?>",
	"checkupdatetips":"<?php echo $_M['word']['checkupdatetips'];?>",
	"detection":"<?php echo $_M['word']['detection'];?>",
	"try_again":"<?php echo $_M['word']['try_again'];?>"
};
MET['langset']="<?php echo $_M['langset'];?>";
MET['anyid']="<?php echo $_M['form']['anyid'];?>";
MET['met_editor']="<?php echo $_M['config']['met_editor'];?>";
MET['met_keywords']="<?php echo $_M['config']['met_keywords'];?>";
MET['url']['basepath']="<?php echo $_M['url']['site_admin'];?>";
MET['url']['ui']="<?php echo $_M['url']['ui'];?>";
MET['url']['own_form']="<?php echo $_M['url']['own_form'];?>";
MET['url']['own_name']="<?php echo $_M['url']['own_name'];?>";
MET['url']['own']="<?php echo $_M['url']['own'];?>";
MET['url']['own_tem']="<?php echo $_M['url']['own_tem'];?>";
MET['url']['api']="<?php echo $_M['url']['api'];?>";
</script>
<script src="<?php echo $_M['url']['site'];?>public/ui/v2/static/js/basic_admin.js?<?php echo $met_file_version;?>"></script>
<script src="<?php echo $_M['url']['site'];?>cache/lang_json_admin_<?php echo $_M['langset'];?>.js?<?php echo $met_file_version;?>"></script>
<?php if(file_exists(PATH_OWN_FILE."templates/js/own.js")){ ?>
<script src="<?php echo $_M['url']['own_tem'];?>js/own.js?<?php echo $met_file_version;?>"></script>
<?php } ?>
</html>