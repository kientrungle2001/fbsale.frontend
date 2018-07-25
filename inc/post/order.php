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
	<hr />
	<div class="form-group">
		<label>Có phải giao</label>
		<select class="form-control" ng-model="order.shippable" placeholder="Có thể giao">
			<option value="0">Không giao</option>
			<option value="1">Có giao</option>
		</select>
	</div>
	<div ng-show="order.shippable=='1'">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Địa chỉ thanh toán</label>
					<select class="form-control" ng-model="order.billing_address_id"  ng-options="address.id as address.address for address in customer.ref_addresses" placeholder="Chọn địa chi thanh toán">
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Địa chỉ giao nhận</label>
					<select class="form-control" ng-model="order.shipping_address_id"  ng-options="address.id as address.address for address in customer.ref_addresses" placeholder="Chọn địa chi thanh toán">
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label>Đơn vị giao</label>
			<select class="form-control" ng-model="order.shipper_id"  ng-options="shipper.id as shipper.name for shipper in shippers" placeholder="Chọn đơn vị giao">
			</select>
		</div>
	</div>
	<hr />
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Tổng trước giảm giá</label>
				<input class="form-control" ng-model="order.totalBeforeDiscount = calculateTotalBeforeDiscount()" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Giảm giá</label>
				<input class="form-control" ng-model="order.discount" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Tổng trước thuế</label>
				<input class="form-control" ng-model="order.totalBeforeTax = calculateTotalBeforeTax()" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Thuế</label>
				<input class="form-control" ng-model="order.tax" />
			</div>
		</div>
	</div>
	<div class="form-group">
		<label>Phí giao hàng</label>
		<input class="form-control" ng-model="order.shipping_fee" />
	</div>
	
	<div class="form-group">
		<label>Tổng tiền</label>
		<input class="form-control" ng-model="order.total = calculateTotal()" />
	</div>
	<div class="form-group">
		<button class="btn btn-primary" ng-click="createOrder()">Tạo đơn hàng</button>
	</div>
</form>