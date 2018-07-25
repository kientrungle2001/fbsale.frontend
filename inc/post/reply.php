<textarea class="discussion-input ng-pristine ng-valid ng-isolate-scope ng-empty ng-touched" placeholder="Viết trả lời...  [Nhấn Enter để gửi]" aria-invalid="false" style="" id="commentInput" onkeydown="handle_comment_reply(event)" onkeyup="clear_comment_reply(event)"></textarea>
<!--end textarea-->
<div class="discussion-buttons clearfix">
	<div class="discussion-button">
		<span class="fa fa-file-image-o"></span> Gửi ảnh
	</div>
	<div class="btn-group dropup btn-quick-reply dropdown" >
		<div class="discussion-button dropdown-toggle" data-toggle="dropdown">
			<span class="fa fa-commenting-o"></span> Trả lời nhanh
		</div>
		<ul class="dropdown-menu">
			<li class="dropdown-header clearfix">
				<a style="padding:0 5px;font-weight:500;" class="pull-right" ng-href="#!/sys/setting" href="#!/sys/setting"><i class="fa fa-cog"></i> Cài đặt</a>
				<b class="pull-left">Gõ tắt = "/Số thứ tự" VD: /1</b>
			</li>
			<li ng-repeat="post_template in post_templates" class="scroll-quickmsg dropdown-header">
			<a href="javascript:void(0)" ng-click="selectQuickMessage(post_template)" ng-bind-html="post_template.content"></a>
			</li>
		</ul>
	</div>

	<div class="discussion-note">
		<b>Shift + Enter</b> để xuống dòng
	</div>
</div>

<?php 
$user = $_SESSION['user'];
?>
<script>
selectedComment = null;
function handle_comment_reply(evt) {
	if(evt.keyCode === 13) {
		var content = evt.target.value;
		jQuery.ajax({
			url: FBSALE_API_URL + '/socialposts/postComment',
			type: 'post',
			data: {
				user_id: <?php echo $user['id']?>,
				facebook_id: '<?php echo $user['facebook_id']?>',
				id: selectedComment.id,
				facebook_post_id: selectedComment.facebook_post_id,
				facebook_page_id: selectedPost.page_id.page_id,
				facebook_page_token: selectedPost.page_id.page_token,
				content: content
			},
			success: function(resp) {
				console.log(resp);
			}
		});
	}
}

function clear_comment_reply(evt) {
	if(evt.keyCode === 13) {
		evt.target.value = '';
	}
}
</script>