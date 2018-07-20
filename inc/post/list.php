<style>

</style>
<div class="position-relative">
	<?php require 'filter.php'; ?>
	<div class="position-absolute content-post">
		<div class="row m-0"> 
			<div class="col-md-4 col-12 border-right mh589 p-0">
				<div class="border-bottom h45">
					<form class="form-inline w100p"> 
					<div style="margin-top: 1px;" class="input-group w100p"> 
						<input name="name" class="form-control" type="search" placeholder="Tìm kiếm..." aria-label="Search" ng-model="keyword">
						<div class="input-group-append"> 
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button> 
						</div> 
					</div> 
					</form>
				</div>
				<p class="text-center" ng-show="keyword">Từ khóa: {{keyword}}</p>
				<div class="box-content">
					<div ng-repeat="comment in comments" class="activity-item border-bottom" ng-class="{'unread' : comment.read == false,'active': selectedComment.id == comment.id}" ng-click="selectComment(comment)">
						<div class="left-item">
							<span class="img">
								<img ng-src="{{comment.facebook_user_avatar}}">
							</span>
						</div>
						<div class="mid-item">
							<div class="item-row item-name ellipsis ng-binding">
							{{comment.facebook_user_name}}
							</div>
							<div class="item-row item-message ellipsis ng-binding">
								<img src="{{comment.image}}" ng-src="{{comment.image}}" ng-show="comment.image" style="width:100%" />
                            	<pre>{{comment.content}}</pre>
                        	</div>
						</div>
						<div class="right-item">
							<div class="item-row item-time ng-binding">{{comment.time}}</div>
							<div class="item-row item-icon">
                            	<span class="fa fa-phone" ng-show="comment.hasPhone"></span>
								<span class="fa fa-envelope" ng-show="comment.type == 'inbox'"></span>
								<span class="fa fa-comment" ng-show="comment.type == 'comment'"></span>
                        	</div>
						</div>
					</div>

				</div>
			</div>
			<!--end cot 1-->
			<div class="col-md-4 col-12 border-right p-0 bg-white border-bottom mh589">
				<div class="border-bottom top-chat h45">
					<div class="left" >
                    	<a href="javascript:" class="ellipsis">{{post.facebook_user_name}}</a>
               		</div>

               		<div class="right">
	                    <span data-toggle="tooltip" data-placement="bottom" title="Lọc theo người này" class="btn-action">
	                        (1) hội thoại
	                    </span>
	                    <span data-toggle="tooltip" data-placement="bottom" title="Đánh dấu chưa đọc" class="btn-action" ng-click="setUnread()">
	                        <i class="fa fa-thumb-tack"></i>
	                    </span>
	                    <span data-toggle="tooltip" data-placement="bottom" title="Thêm nhãn mới" class="btn-action">
	                        <i class="fa fa-tag"></i>
	                    </span>
	                </div>	

				</div>

				<div class="chat border-bottom p-2">
					<p class="text-center pt-3" ng-hide="selectedComment.id">
					Vui lòng chọn một hội thoại để thao tác.
					</p>
					
					<p class="pt-3">
					<pre>{{post.content}}</pre>
					<img src="{{post.image}}" ng-src="{{post.image}}" ng-show="post.image" style="width:100%"/>
					<hr />
					<img src="{{selectedComment.image}}" ng-src="{{selectedComment.image}}" ng-show="selectedComment.image" style="width:100%"/>
					<pre>{{selectedComment.content}}</pre>
					</p>
					
					<div ng-class="{'_msg _o-msg': conversation.type=='member', '_msg _s-msg': conversation.type!='member'}" ng-repeat="conversation in conversations">

			            <div  class="_msg-avr">
			                <img ng-src="{{conversation.facebook_user_avatar}}" src="{{conversation.facebook_user_avatar}}">
			            </div>

			            <div class="_msg-bd clearfix">
			                <h4 class="_msg-t">
			                    <b class="ng-scope">
			                        <a href="javascript:" class="ng-binding">{{conversation.facebook_user_name}}</a> - </b>
										{{conversation.createdAt|date:'dd/MM/yyyy'}}
			                </h4>

			                <div data-time="{{conversation.createdAt|date:'h:m'}}" class="_msg-tx" >
			                    <div class="_msg-ptx ng-binding">
								<img src="{{conversation.image}}" ng-src="{{conversation.image}}" ng-show="conversation.image" style="width:100%"/>
								<pre>{{conversation.content}}</pre>
								
								</div>
			                </div>
			                
			            </div>
			        </div>
			        <!--end chat-->
					
					<?php if(0):?>
			        <div class="_msg _s-msg">
			            <div class="_msg-bd clearfix">
			               <h4  class="_msg-t ">
			                    28/06/2018
			                </h4>
			               <div data-time="08:55" class="_msg-tx ng-scope">
			                    <div class="_msg-ptx ng-binding" >Chào chị</div>
			                </div>
			            </div>
			        </div>
			        <!--end realy-->

			        <div class="_msg _s-msg">
			            <div class="_msg-bd clearfix">
			                <div  data-time="08:56" class="_msg-tx ng-scope">
			                    <div class="_msg-ptx ng-binding">
			                    Dạ bạn lớp 4 là ôn được phần mềm này rồi chị nhé</div>
			                </div>
			            </div>
			        </div>
			        <!--end realy-->

			        <div class="_msg _o-msg">

			            <div  class="_msg-avr">
			                <img ng-src="https://graph.facebook.com/1608210225983055/picture?height=100&amp;width=100" src="https://graph.facebook.com/1608210225983055/picture?height=100&amp;width=100">
			            </div>

			            <div class="_msg-bd clearfix">
			                <h4 class="_msg-t">
			                    <b class="ng-scope">
			                        <a href="javascript:" class="ng-binding">Như Mây Trần</a> - </b>
			                    28/06/2018
			                </h4>

			                <div data-time="18:25" class="_msg-tx ng-scope">
			                    <div class="_msg-ptx ng-binding">Bé nam nay lớp 4</div>
			                </div>
			                
			            </div>
			        </div>
			        <!--end chat-->
			        <div class="_msg _s-msg">
			            <div class="_msg-bd clearfix">
			               <h4  class="_msg-t ">
			                    28/06/2018
			                </h4>
			               <div data-time="08:55" class="_msg-tx ng-scope">
			                    <div class="_msg-ptx ng-binding" >Chào chị</div>
			                </div>
			            </div>
			        </div>
			        <!--end realy-->

			        <div class="_msg _s-msg">
			            <div class="_msg-bd clearfix">
			                <div  data-time="08:56" class="_msg-tx ng-scope">
			                    <div class="_msg-ptx ng-binding">
			                    Dạ bạn lớp 4 là ôn được phần mềm này rồi chị nhé</div>
			                </div>
			            </div>
			        </div>
			        <!--end realy-->

			        <div class="_msg _o-msg">

			            <div  class="_msg-avr">
			                <img ng-src="https://graph.facebook.com/1608210225983055/picture?height=100&amp;width=100" src="https://graph.facebook.com/1608210225983055/picture?height=100&amp;width=100">
			            </div>

			            <div class="_msg-bd clearfix">
			                <h4 class="_msg-t">
			                    <b class="ng-scope">
			                        <a href="javascript:" class="ng-binding">Như Mây Trần</a> - </b>
			                    28/06/2018
			                </h4>

			                <div data-time="18:25" class="_msg-tx ng-scope">
			                    <div class="_msg-ptx ng-binding">Bé nam nay lớp 4</div>
			                </div>
			                
			            </div>
			        </div>
			        <!--end chat-->
			        <div class="_msg _s-msg">
			            <div class="_msg-bd clearfix">
			               <h4  class="_msg-t ">
			                    28/06/2018
			                </h4>
			               <div data-time="08:55" class="_msg-tx ng-scope">
			                    <div class="_msg-ptx ng-binding" >Chào chị</div>
			                </div>
			            </div>
			        </div>
			        <!--end realy-->

			        <div class="_msg _s-msg">
			            <div class="_msg-bd clearfix">
			                <div  data-time="08:56" class="_msg-tx ng-scope">
			                    <div class="_msg-ptx ng-binding">
			                    Dạ bạn lớp 4 là ôn được phần mềm này rồi chị nhé</div>
			                </div>
			            </div>
			        </div>
			        <!--end realy-->	
					
					<?php endif; ?>

				</div>

				<div class="realy">
					<div data-number="5" class="discussion-tags clearfix">
	                    <span class="msg-tag ng-binding ng-scope unactive">
	                        Đang hỏi
	                    </span>
	                    <span class="msg-tag ng-binding ng-scope unactive">
	                        Đã chốt đơn
	                    </span>
	                    <span class="msg-tag ng-binding ng-scope unactive">
	                        Đã tạo đơn
	                    </span>
	                    <span class="msg-tag ng-binding ng-scope unactive">
	                        Hết hàng
	                    </span>
	                    <span class="msg-tag ng-binding ng-scope unactive">
	                        Đã hủy
	                    </span>
	                </div>
	                <!--end lable-->
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
								<a href="javascript:void(0)" ng-click="selectQuickMessage(post_template)">{{post_template.content}}</a>
	                            </li>
	                        </ul>
	                    </div>

	                    <div class="discussion-note">
	                    	<b>Shift + Enter</b> để xuống dòng
	                    </div>
	                </div>

				</div>
			</div>
			<!--end cot 2-->
			<div class="col-md-4 col-12 border-right p-0 mh589">
				<ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="tab" href="#custommer">Khách hàng</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#order">Đơn hàng</a>
				  </li>
				  
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane active container p-2" id="custommer">
				  	khách hàng
				  </div>
				  <div class="tab-pane container p-2" id="order">
				  	đơn hàng
				  </div>
				</div>
			</div>
			<!-- end cot 3-->
		</div>
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