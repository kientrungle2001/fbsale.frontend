<form id="customerForm" ng-show="customer">
	<input type="hidden" name="facebook_id" ng-model="customer.facebook_id" />
	<div class="form-group">
		<input type="text" name="name" class="form-control form-control-sm" ng-model="customer.name" placeholder="Họ và tên" />
	</div>
	<div class="form-group">
		<input type="text" name="email" class="form-control form-control-sm" ng-model="customer.email" placeholder="Email" />
	</div>
	<div class="form-group">
		<input type="text" name="phone" class="form-control form-control-sm" ng-model="customer.phone" placeholder="Số điện thoại" />
	</div>
	<div class="form-group">
		<label>Chọn địa chỉ</label>
		<select name="address" ng-change="selectAddress(address)" class="form-control form-control-sm" ng-model="customer.address_id"  ng-options="address.id as address.address for address in customer.ref_addresses" placeholder="Chọn địa chỉ">
		</select>
	</div>
	<div class="form-group">
		<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createAddressModal" ng-click="selectedAddress={type:'billing', name: customer.name, email: customer.email, phone: customer.phone}">Tạo Địa Chỉ</button>
		
		<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createAddressModal">Sửa Địa Chỉ</button>
		
		<button class="btn btn-danger btn-sm" ng-click="deleteAddress()">Xóa Địa Chỉ</button>
	</div>
	
	<div class="form-group">
		<select name="status" class="form-control form-control-sm" ng-model="customer.status">
			<option value="1" ng-selected="customer.status==1">Hoạt động</option>
			<option value="0" ng-selected="customer.status==0">Không hoạt động</option>
		</select>
	</div>
	<div class="form-group">
		<button class="btn btn-primary btn-sm" ng-click="saveCustomer()">Lưu khách hàng</button>
	</div>
	<div class="alert alert-primary" ng-show="customer.id">
		Đã tạo
	</div>
	<div class="alert alert-success" ng-show="customer.isSaved">
		Đã lưu
	</div>
</form>

<!-- Create Address Modal -->
<div class="modal fade" id="createAddressModal" tabindex="-1" role="dialog" aria-labelledby="createAddressModal">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h4 class="modal-title" id="myModalLabel">Tạo địa chỉ</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		
	  </div>
	  <div class="modal-body">
		<form class="form">
			<input type="hidden" name="id" ng-model="selectedAddress.id" />
			<div class="form-group">
				<input type="text" name="address_name" class="form-control form-control-sm" ng-model="selectedAddress.name" placeholder="Họ và tên" />
			</div>
			<div class="form-group">
				<input type="text" name="address_phone" class="form-control form-control-sm" ng-model="selectedAddress.phone" placeholder="Số điện thoại" />
			</div>
			<div class="form-group">
				<input type="text" name="address_email" class="form-control form-control-sm" ng-model="selectedAddress.email" placeholder="Email" />
			</div>
			<div class="form-group">
				<select name="address_type" class="form-control form-control-sm" ng-model="selectedAddress.type" placeholder="Loại địa chỉ">
				<option value="billing" ng-selected="selectedAddress.type=='billing'">Địa chỉ thanh toán</option>
				<option value="shipping" ng-selected="selectedAddress.type=='shipping'">Địa chỉ nhận</option>
				</select>
			</div>
			<div class="form-group">
				<select type="text" ng-change="selectProvince()" name="address_province_id" class="form-control form-control-sm" ng-model="selectedAddress.province_id" placeholder="Thành phố"
				ng-options="province.id as province.name for province in provinces"
				>
					<option value="">Chọn thành phố</option>
				</select>
			</div>
			<div class="form-group">
				<select type="text" ng-change="selectDistrict()" name="address_district_id" class="form-control form-control-sm" ng-model="selectedAddress.district_id" placeholder="Quận huyện"
				ng-options="district.id as district.name for district in districts"
				>
					<option value="">Chọn quận huyện</option>
				</select>
			</div>
			<div class="form-group">
				<select type="text" name="address_ward_id" class="form-control form-control-sm" ng-model="selectedAddress.ward_id" placeholder="Phường Xã"
				ng-options="ward.id as ward.name for ward in wards"
				>
					<option value="">Chọn phường xã</option>
				</select>
			</div>
			<div class="form-group">
				<input type="text" name="address_address" class="form-control form-control-sm" ng-model="selectedAddress.address" placeholder="Địa chỉ" />
			</div>
		</form>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
		<button type="button" class="btn btn-primary btn-sm" ng-click="saveAddress()">Lưu</button>
	  </div>
	</div>
  </div>
</div>