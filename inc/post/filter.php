<div class="position-absolute menu-filter">
	<div class="text-center filter" data-toggle="tooltip" data-placement="right" title="Bỏ lọc" ng-click="resetFilters()">
		<span class="fa fa-undo"></span>
	</div>
	<div data-toggle="tooltip" data-placement="right" title="Tất cả hội thoại" class="text-center filter" ng-class="{'active': !filter.type}" ng-click="filter.type=false">
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
	<div data-toggle="tooltip" data-placement="right" title="Có số điện thoại" class="text-center filter" ng-class="{'active': filter.hasPhone}" ng-click="filter.hasPhone = !filter.hasPhone">
		<i class="fa fa-phone"></i>
	</div>
	<div data-toggle="tooltip" data-placement="right" title="Không có số điện thoại" class="text-center filter" ng-class="{'active': filter.noPhone}" ng-click="filter.noPhone = !filter.noPhone">
		<span class="fa fa-tty"></span>
	</div>
	<div data-toggle="tooltip" data-placement="right" title="Chưa trả lời" class="text-center filter"  ng-class="{'active': filter.unreplied}" ng-click="filter.unreplied = !filter.unreplied">
		<span class="fa fa-share"></span>
	</div>
	<div data-toggle="tooltip" data-placement="right" title="Tìm theo thời gian" class="text-center filter">
		<span class="fa fa-clock-o"></span>
	</div>
	<div data-toggle="tooltip" data-placement="right" title="Tìm theo nhãn" class="filter text-center dropdown">
		<span class="fa fa-tags dropdown-toggle" data-toggle="dropdown"></span>
		<div class="dropdown-menu" style="width: 200px; padding: 10px;">
			<div ng-repeat="label in post_labels" style="padding: 5px;margin-top:5px; margin-bottom:5px;" class="filter-dropdown-item" ng-class="{'active': filter.post_label_ids[label.id]}" ng-click="filter.post_label_ids[label.id]=!filter.post_label_ids[label.id]">
				<p style="background: #{{label.color}}; color: #fff; padding: 5px; margin: 0;">{{label.name|limitTo:100}}</p>
			</div>
		</div>
	</div>
	<div data-toggle="tooltip" data-placement="right" title="Tìm theo bài viết" class="filter text-center dropdown">
		<span class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"></span>
		<div class="dropdown-menu" style="width: 400px; padding: 10px;">
			<div ng-repeat="pagePost in posts" style="padding: 15px;margin-top:5px; margin-bottom:5px;" class="media filter-dropdown-item" ng-class="{'active': filter.post_ids[pagePost.id]}" ng-click="filter.post_ids[pagePost.id]=!filter.post_ids[pagePost.id]">
				<img src="{{pagePost.image}}" ng-src="{{pagePost.image}}" ng-show="pagePost.image" style="width:64px" class="align-self-start mr-3"/>
				<div class="media-body">
					<pre>{{pagePost.content|limitTo:100}}</pre>
				</div>
			</div>
		</div>
	</div>
	
</div>
<!--end menu filter-->