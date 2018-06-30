<style>
	.menu-filter{
		width: 50px; left: 0px;top: 0px;
		background: #3b5998; min-height: 589px;
	}
	.mh589{min-height: 589px;}
	.content-post{width: 100%; left: 50px;}
	.filter{padding: 10px 0px; color: white; cursor: pointer;}
	.filter:hover{background: white; color: #3b5998;}
	.w100p{width: 100% !important;}
	.h45{height: 42px; line-height: 42px;}
	.box-content{overflow-y: scroll; height: 547px;}
	
     .activity-item {
	    cursor: pointer;
	    float: left;
	    width: 100%;
	    padding: 5px;
	}
	.activity-item:hover{background: white;}
	.activity-item .left-item{float: left;
    width: 70px;
    min-height: 60px;}
    .activity-item .left-item .img{
    display: inline-block;
    width: 60px;
    height: 60px;
    border-radius: 100%;
    overflow: hidden;
    }
    .activity-item .left-item .img img{
    	display: block;
    	width: 100%;
    }
    .activity-item .mid-item {
    float: left;
    width: calc(100% - 152px);
    padding: 4px 0;
    min-height: 60px;
}
.item-message {
    font-size: 14px;
}
.activity-item .right-item {
    float: left;
    width: 75px;
    padding: 4px 5px 4px 0;
    min-height: 60px;
    text-align: right;
}
.activity-item.unread .item-name, .activity-item.unread .item-icon {
    color: #ff8c00;
}
.activity-item .item-name {
    font-weight: bold;
}
.chat{
	height: 427px;
	overflow-y: scroll;
   
}
.top-chat .left{float: left;
    padding-left: 10px;
    max-width: calc(100% - 225px);}
.top-chat .right {
    float: right;
    max-width: 225px;
}
.top-chat .btn-action {
    float: left;
    padding: 0 11px;
    cursor: pointer;
    border-left: 1px solid #b7bdc8;
    color: #4267b2;
    display: inline-block;
}
.ellipsis{color: #365899; font-weight: bold;}
._msg {
    position: relative;
}
._msg-bd {
    margin-left: 36px;
}
._s-msg ._msg-t, ._s-msg ._msg-ac {
    text-align: right;
}
._msg-t {
    display: block;
    margin: 10px 12px;
    font-weight: 500;
    font-size: 14px;
}
._s-msg ._msg-tx {
    clear: right;
    float: right;
    background-color: #0084ff;
    color: #fff;
}
._msg-tx {
    padding: 6px 12px;
}
._msg-tx, ._msg-at {
    border-radius: 1.3em;
    max-width: 65%;
    box-sizing: content-box;
    margin: 1px 0;
    position: relative;
}
._s-msg ._msg-tx {
    clear: right;
    float: right;
    background-color: #0084ff;
    color: #fff;
}
._msg-avr {
    max-height: 30px;
    max-width: 30px;
    top: 32px;
    position: absolute;
    border-radius: 50%;
    align-items: center;
    display: flex;
    justify-content: center;
    overflow: hidden;
}
._o-msg ._msg-tx {
    clear: left;
    float: left;
    background-color: #f1f0f0;
    color: #000;
}
a {
    color: #365899;
}
._msg-tx::after, ._msg-at::after {
    content: attr(data-time);
    position: absolute;
    bottom: 1px;
    font-size: 12px;
    color: #888;
}
._o-msg ._msg-tx::after, ._o-msg ._msg-at::after {
    right: -30px;
}
._s-msg ._msg-tx::after, ._s-msg ._msg-at::after {
    left: -30px;
}
.realy .discussion-tags {
    min-height: 20px;
}
.discussion-tags[data-number="5"] .msg-tag {
    width: 20%;
}

.discussion-tags .msg-tag {
    display: inline-block;
    font-size: 12px;
    float: left;
    white-space: nowrap;
    height: 20px;
    line-height: 20px;
    padding: 0 3px;
    text-align: center;
    margin: 0;
    border-radius: 0;
    cursor: pointer;
}
.discussion-tags .msg-tag.unactive {
    background-color: #e3e4e6 !important;
    border-right: 1px solid #fff;
    color: #555 !important;
}
.discussion-input {
    height: 65px;
    display: block;
    width: 100%;
    border: none;
    background: transparent;
    padding: 8px;
    border-bottom: 1px solid #e3e4e6;
    resize: none;
}
textarea {
    vertical-align: top;
    overflow: auto;
}
.discussion-buttons {
    background-color: #f1f1f1;
}
.discussion-button {
    float: left;
    border-right: 1px solid #d6d6d6;
    height: 34px;
    line-height: 34px;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    padding: 0 10px;
}
.btn-group, .btn-group-vertical {
    position: relative;
    display: inline-block;
    vertical-align: middle;
}
.discussion-note {
    float: right;
    height: 34px;
    line-height: 34px;
    font-size: 13px;
    padding-right: 4px;
}
.caret {
    display: inline-block;
    width: 0;
    height: 0;
    margin-left: 2px;
    vertical-align: middle;
    border-top: 4px dashed;
    border-top: 4px solid\9;
    border-right: 4px solid transparent;
    border-left: 4px solid transparent;
}
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
					<div class="activity-item border-bottom">
						<div class="left-item">
							<span class="img">
								<img ng-src="https://graph.facebook.com/2086905601592230/picture?height=100&amp;width=100" src="https://graph.facebook.com/2086905601592230/picture?height=100&amp;width=100">
							</span>
						</div>
						<div class="mid-item">
							<div class="item-row item-name ellipsis ng-binding">
								Su Cong Cao
							</div>
							<div class="item-row item-message ellipsis ng-binding">
                            	ngoài tài liệu tôi cần thây cô dạy ..
                        	</div>
						</div>
						<div class="right-item">
							<div class="item-row item-time ng-binding">11:36</div>
							<div class="item-row item-icon">
                            	<span class="fa fa-envelope"></span>
                        	</div>
						</div>
					</div>

					<div class="activity-item border-bottom">
						<div class="left-item">
							<span class="img">
								<img ng-src="https://graph.facebook.com/2086905601592230/picture?height=100&amp;width=100" src="https://graph.facebook.com/2086905601592230/picture?height=100&amp;width=100">
							</span>
						</div>
						<div class="mid-item">
							<div class="item-row item-name ellipsis ng-binding">
								Su Cong Cao
							</div>
							<div class="item-row item-message ellipsis ng-binding">
                            	ngoài tài liệu tôi cần thây cô dạy ..
                        	</div>
						</div>
						<div class="right-item">
							<div class="item-row item-time ng-binding">11:36</div>
							<div class="item-row item-icon">
                            	<span class="fa fa-comment"></span>
                        	</div>
						</div>
					</div>
					
					<div class="activity-item unread border-bottom">
						<div class="left-item">
							<span class="img">
								<img ng-src="https://graph.facebook.com/2086905601592230/picture?height=100&amp;width=100" src="https://graph.facebook.com/2086905601592230/picture?height=100&amp;width=100">
							</span>
						</div>
						<div class="mid-item">
							<div class="item-row item-name ellipsis ng-binding">
								Su Cong Cao
							</div>
							<div class="item-row item-message ellipsis ng-binding">
                            	ngoài tài liệu tôi cần thây cô dạy ..
                        	</div>
						</div>
						<div class="right-item">
							<div class="item-row item-time ng-binding">11:36</div>
							<div class="item-row item-icon">
                            	<span class="fa fa-envelope"></span>
                        	</div>
						</div>
					</div>

					<div class="activity-item unread border-bottom">
						<div class="left-item">
							<span class="img">
								<img ng-src="https://graph.facebook.com/2086905601592230/picture?height=100&amp;width=100" src="https://graph.facebook.com/2086905601592230/picture?height=100&amp;width=100">
							</span>
						</div>
						<div class="mid-item">
							<div class="item-row item-name ellipsis ng-binding">
								Su Cong Cao
							</div>
							<div class="item-row item-message ellipsis ng-binding">
                            	ngoài tài liệu tôi cần thây cô dạy ..
                        	</div>
						</div>
						<div class="right-item">
							<div class="item-row item-time ng-binding">11:36</div>
							<div class="item-row item-icon">
								<span class="fa fa-phone"></span>
                            	<span class="fa fa-envelope"></span>
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
					<p class="text-center pt-3">
					Vui lòng chọn một hội thoại để thao tác.
					</p>

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

