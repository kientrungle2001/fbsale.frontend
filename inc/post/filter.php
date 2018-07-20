<div class="position-absolute menu-filter">
	<div class="text-center filter" data-toggle="tooltip" data-placement="right" title="Bỏ lọc">
		<span class="fa fa-undo"></span>
	</div>
	<div data-toggle="tooltip" data-placement="right" title="Tất cả hội thoại" class="text-center filter" ng-click="resetFilters()">
		<span class="fa fa-university"></span>
	</div>
	<div data-toggle="tooltip" data-placement="right" title="Bình luận" class="text-center filter" ng-class="{'active': filter.type=='comment'}" ng-click="filter.type='comment'">
		<span class="fa fa-comment-o"></span>
	</div>
	<div data-toggle="tooltip" data-placement="right" title="Tin nhắn" class="text-center filter" ng-class="{'active': filter.type=='inbox'}" ng-click="filter.type='inbox'">
		<span class="fa fa-envelope-o"></span>
	</div>
	<div data-toggle="tooltip" data-placement="right" title="Chưa đọc" class="text-center filter" ng-class="{'active': filter.unread}" ng-click="filter.unread = !filter.unread">
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