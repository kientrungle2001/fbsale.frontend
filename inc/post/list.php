<style>

</style>
<div class="position-relative">
	<?php require 'filter.php'; ?>
	<div class="position-absolute content-post">
		<div class="row m-0"> 
			<div class="col-md-4 col-12 border-right mh589 p-0">
				<?php require 'search.php'; ?>
				<?php require 'comments.php'; ?>
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
	                    <span class="btn-action dropdown">
	                        <i class="fa fa-tag dropdown-toggle" data-toggle="dropdown"></i>
							<div class="dropdown-menu" style="width: 200px; padding: 10px;">
								<div ng-repeat="label in post_labels" style="padding: 5px;margin-top:5px; margin-bottom:5px;" class="filter-dropdown-item" ng-class="{'active': checkCommentHasLabel(label)}">
									<p style="background: #{{label.color}}; color: #fff; padding: 5px; margin: 0;">{{label.name|limitTo:100}}</p>
								</div>
							</div>
	                    </span>
	                </div>	

				</div>
				<?php require 'replies.php';?>
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
					
					<?php require 'reply.php'; ?>

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
				  <div class="tab-pane active container p-2" id="custommer" style="overflow:scroll-y">
					<?php require 'customer.php';?>
				  </div>
				  <div class="tab-pane container p-2" id="order">
				  	<?php require 'order.php';?>
				  </div>
				</div>
			</div>
			<!-- end cot 3-->
		</div>
	</div>
</div>