
<div class="chat border-bottom p-2">
	<p class="text-center pt-3" ng-hide="selectedComment.id">
	Vui lòng chọn một hội thoại để thao tác.
	</p>
	
	<p class="pt-3">
	<p ng-bind-html="post.content"></p>
	<img src="{{post.image}}" ng-src="{{post.image}}" ng-show="post.image" style="width:100%"/>
	<hr />
	<img src="{{selectedComment.image}}" ng-src="{{selectedComment.image}}" ng-show="selectedComment.image" style="width:100%"/>
	<p ng-bind-html="selectedComment.content"></p>
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
				<p ng-bind-html="conversation.content"></p>
				
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
