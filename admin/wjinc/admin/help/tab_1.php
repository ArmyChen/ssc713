<script type="text/javascript">
function BeforeAddTab(){}
function AddTab(err, data){
	if(err){
		error(err);
	}else{
		success(data);
	}
}
<?php $content=$this->getValue("select content from {$this->prename}problem where id=?", 1); 
      $content=str_replace('&', '&amp;', $content);?>
var editor = CKEDITOR.replace("editor1");
editor.setData("<?=$content ?>");

</script>
<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
<header><h3 class="tabs_involved">常见问题列表</h3></header>
<form action="/admin778899.php/help/tab_1_add" dataType="html" target="ajax" method="post" onajax="BeforeAddTab" call="AddTab">
         <div class="tableList">
			 <textarea id="editor1" name="editor1"></textarea>
            <script type="text/javascript">
                CKEDITOR.replace( 'editor1' );
            </script>
			<input type="submit" class="btn btn-action" value="确认保存" style="margin:10px auto 10px 30%; text-align:center;" />*该功能需要一定的技术人员进行修改，以免造成修改出现乱码！
		</div>
</form>
</article>