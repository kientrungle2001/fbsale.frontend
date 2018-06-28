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
	.box-content{overflow: hidden; height: 547px;}
	
     .activity-item {
	    cursor: pointer;
	    float: left;
	    width: 100%;
	    padding: 5px;
	}
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
    font-size: 13px;
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
			<div class="col-md-4 col-12 border-right p-0 mh589">
				<div class="border-bottom h45">
					
				</div>
			</div>
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
				  <div class="tab-pane active container" id="custommer">
				  	khách hàng
				  </div>
				  <div class="tab-pane container" id="order">
				  	đơn hàng
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>

