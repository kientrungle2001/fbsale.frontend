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
						<input name="name" class="form-control" type="search" placeholder="Tìm kiếm..." aria-label="Search" ng-model="filter.keyword">
						<div class="input-group-append"> 
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button> 
						</div> 
					</div> 
					</form>
				</div>
				<p class="text-center" ng-show="keyword">Từ khóa: {{filter.keyword}}</p>
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
								<a href="javascript:void(0)" ng-click="selectQuickMessage(post_template)" ng-bind-html="post_template.content"></a>
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
				  <div class="tab-pane active container p-2" id="custommer" style="overflow:scroll-y">
				  	<form id="customerForm" ng-show="customer">
						<input type="hidden" name="facebook_id" ng-model="customer.facebook_id" />
						<div class="form-group">
							<input type="text" name="name" class="form-control" ng-model="customer.name" placeholder="Họ và tên" />
						</div>
						<div class="form-group">
							<input type="text" name="email" class="form-control" ng-model="customer.email" placeholder="Email" />
						</div>
						<div class="form-group">
							<input type="text" name="phone" class="form-control" ng-model="customer.phone" placeholder="Số điện thoại" />
						</div>
						<div class="form-group">
							<label>Chọn địa chỉ</label>
							<select name="address" ng-change="selectAddress(address)" class="form-control" ng-model="customer.address_id"  ng-options="address.id as address.name for address in customer.ref_address" placeholder="Chọn địa chỉ">
							</select>
						</div>
						
						<div class="hide">
							<div class="form-group">
								<input type="text" name="address_type" class="form-control" ng-model="selectedAddress.type" placeholder="Loại địa chỉ" />
							</div>
							<div class="form-group">
								<input type="text" name="address_province_id" class="form-control" ng-model="selectedAddress.province_id" placeholder="Thành phố" />
							</div>
							<div class="form-group">
								<input type="text" name="address_district_id" class="form-control" ng-model="selectedAddress.district_id" placeholder="Quận, huyện" />
							</div>
							<div class="form-group">
								<input type="text" name="address_ward_id" class="form-control" ng-model="selectedAddress.ward_id" placeholder="Thôn, xã, đường" />
							</div>
							<div class="form-group">
								<input type="text" name="address_address" class="form-control" ng-model="selectedAddress.address" placeholder="Địa chỉ" />
							</div>
						</div>
						<div class="form-group">
							<select name="status" class="form-control" ng-model="customer.status">
								<option value="1" ng-selected="customer.status==1">Hoạt động</option>
								<option value="0" ng-selected="customer.status==0">Không hoạt động</option>
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-primary" ng-click="saveCustomer()">Lưu khách hàng</button>
						</div>
						<div class="alert alert-primary" ng-show="customer.id">
							Đã tạo
						</div>
						<div class="alert alert-success" ng-show="customer.isSaved">
							Đã lưu
						</div>
					</form>
				  </div>
				  <div class="tab-pane container p-2" id="order">
				  	
					<form>
						<div class="row" ng-repeat="order_item in order_items">
							<div class="col-md-4">
								<div class="form-group">
									<select class="form-control" ng-change="selectProduct(order_item, product)" ng-model="order_item.product_id" ng-options="product.id as product.name for product in products">
										<option value="">Chọn dịch vụ</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<select class="form-control"  ng-change="selectProductOption(order_item, product_option)" ng-model="order_item.product_option_id" ng-options="product_option.id as product_option.name for product_option in map_product_options[order_item.product_id]">
										<option value="">Chọn thuộc tính</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<button class="btn btn-danger" ng-click="removeOrderItem(order_item)">- Xóa</button>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Số tiền</label>
									<input class="form-control" name="price"  ng-model="order_item.price" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Số lượng</label>
									<input class="form-control" name="quantity" ng-model="order_item.quantity" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Thành tiền</label>
									<input class="form-control" name="total" ng-model="order_item.total = order_item.price * order_item.quantity" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<button class="btn btn-primary" ng-click="addNewOrderItem()">+ Thêm dịch vụ</button>
						</div>
					</form>
					
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