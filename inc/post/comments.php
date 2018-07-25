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
				<p ng-bind-html="comment.content"></p>
				<span class="btn btn-xs" ng-repeat="label in comment.ref_post_labels" style="background: #{{label.color}}; color: white; margin-right: 5px; display: inline-block; padding:3px; font-size: 10px;">{{label.name}}</span>
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