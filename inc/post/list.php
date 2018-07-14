<style>

</style>
<div class="position-relative">
	<div class="position-absolute menu-filter">
		<div class="text-center filter" data-toggle="tooltip" data-placement="right" title="Bỏ lọc">
			<span class="fa fa-undo"></span>
		</div>
		<div data-toggle="tooltip" data-placement="right" title="Tất cả hội thoại" class="text-center filter">
			<span class="fa fa-university"></span>
		</div>
		<div data-toggle="tooltip" data-placement="right" title="Bình luận" class="text-center filter">
			<span class="fa fa-comment-o"></span>
		</div>
		<div data-toggle="tooltip" data-placement="right" title="Tin nhắn" class="text-center filter">
			<span class="fa fa-envelope-o"></span>
		</div>
		<div data-toggle="tooltip" data-placement="right" title="Chưa đọc" class="text-center filter">
			<i class="fa fa-eye-slash"></i>
		</div>
		<div data-toggle="tooltip" data-placement="right" title="Có số điện thoại" class="text-center filter">
			<i class="fa fa-phone"></i>
		</div>
		<div data-toggle="tooltip" data-placement="right" title="Không có số điện thoại" class="text-center filter">
			<span class="fa fa-tty"></span>
		</div>
		<div data-toggle="tooltip" data-placement="right" title="Chưa trả lời" class="text-center filter">
			<span class="fa fa-share"></span>
		</div>
		<div data-toggle="tooltip" data-placement="right" title="Tìm theo thời gian" class="text-center filter">
			<span class="fa fa-clock-o"></span>
		</div>
		<div data-toggle="tooltip" data-placement="right" title="Tìm theo nhãn" class="filter text-center">
			<span class="fa fa-tags"></span>
		</div>
		<div data-toggle="tooltip" data-placement="right" title="Tìm theo bài viết" class="filter text-center">
			<span class="fa fa-envelope-o"></span>
		</div>	
		
	</div>
	<!--end menu filter-->
	<div class="position-absolute content-post">
		<div class="row m-0"> 
			<div class="col-md-4 col-12 border-right mh589 p-0">
				<div class="border-bottom h45">
					<form class="form-inline w100p"> 
					<div style="margin-top: 1px;" class="input-group w100p"> 
						<input name="name" class="form-control" type="search" placeholder="Tìm kiếm..." aria-label="Search"> 
						<div class="input-group-append"> 
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button> 
						</div> 
					</div> 
					</form>
				</div>
				<div class="box-content">
					<div ng-repeat="post in posts" class="activity-item border-bottom" ng-class="{'unread' : post.read == false}">
						<div class="left-item">
							<span class="img">
								<img ng-src="{{post.avatar}}">
							</span>
						</div>
						<div class="mid-item">
							<div class="item-row item-name ellipsis ng-binding">
							{{post.name}}
							</div>
							<div class="item-row item-message ellipsis ng-binding">
                            	{{post.content}}
                        	</div>
						</div>
						<div class="right-item">
							<div class="item-row item-time ng-binding">{{post.time}}</div>
							<div class="item-row item-icon">
                            	<span class="fa fa-phone" ng-show="post.hasPhone"></span>
								<span class="fa fa-envelope" ng-show="post.type == 'inbox'"></span>
								<span class="fa fa-comment" ng-show="post.type == 'comment'"></span>
                        	</div>
						</div>
					</div>

				</div>
			</div>
			<!--end cot 1-->
			<div class="col-md-4 col-12 border-right p-0 bg-white border-bottom mh589">
				<div class="border-bottom top-chat h45">
					<div class="left" >
                    	<a href="javascript:" class="ellipsis">Như Mây Trần</a>
               		</div>

               		<div class="right">
	                    <span data-toggle="tooltip" data-placement="bottom" title="Lọc theo người này" class="btn-action">
	                        (1) hội thoại
	                    </span>
	                    <span data-toggle="tooltip" data-placement="bottom" title="Đánh dấu chưa đọc" class="btn-action">
	                        <i class="fa fa-thumb-tack"></i>
	                    </span>
	                    <span data-toggle="tooltip" data-placement="bottom" title="Thêm nhãn mới" class="btn-action">
	                        <i class="fa fa-tag"></i>
	                    </span>
	                </div>	

				</div>

				<div class="chat border-bottom p-2">
					<p class="text-center pt-3" ng-hide="post">
					Vui lòng chọn một hội thoại để thao tác.
					</p>

					
					<div ng-class="{'_msg _o-msg': conversation.type=='member', '_msg _s-msg': conversation.type=='page'}" ng-repeat="conversation in post_conversations">

			            <div  class="_msg-avr">
			                <img ng-src="https://graph.facebook.com/1608210225983055/picture?height=100&amp;width=100" src="https://graph.facebook.com/1608210225983055/picture?height=100&amp;width=100">
			            </div>

			            <div class="_msg-bd clearfix">
			                <h4 class="_msg-t">
			                    <b class="ng-scope">
			                        <a href="javascript:" class="ng-binding">{{conversation.name}}</a> - </b>
										{{conversation.date}}
			                </h4>

			                <div ng-repeat="message in conversation.messages" data-time="{{conversation.time}}" class="_msg-tx" >
			                    <div class="_msg-ptx ng-binding">{{message.content}}</div>
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
	                <textarea class="discussion-input ng-pristine ng-valid ng-isolate-scope ng-empty ng-touched" placeholder="Viết trả lời...  [Nhấn Enter để gửi]" aria-invalid="false" style=""></textarea>
	                <!--end textarea-->

	                <div class="discussion-buttons clearfix">
	                    <div class="discussion-button">
	                        <span class="fa fa-file-image-o"></span> Gửi ảnh
	                    </div>
	                    <div class="btn-group dropup btn-quick-reply dropdown" >
	                        <div class="discussion-button dropdown-toggle">
	                            <span class="fa fa-commenting-o"></span> Trả lời nhanh
	                        </div>
	                        <ul class="dropdown-menu">
	                            <li class="dropdown-header clearfix">
	                                <a style="padding:0 5px;font-weight:500;" class="pull-right" ng-href="#!/sys/setting" href="#!/sys/setting"><i class="fa fa-cog"></i> Cài đặt</a>
	                                <b class="pull-left">Gõ tắt = "/Số thứ tự" VD: /1</b>
	                            </li>
	                            <li class="scroll-quickmsg">
	                                
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

