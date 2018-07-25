var fbSaleApp = angular.module('fbSaleApp', ['ngSanitize']);

fbSaleApp.controller('PostController', ['$scope', '$sce', function($scope, $sce) {
  $scope.title = 'Quản lý comment/inbox';
  jQuery.ajax({
	  type: 'get',
	  url: FBSALE_API_URL + '/socialposttemplates',
	  dataType: 'json',
	  success: function(resp) {
		  $scope.post_templates = resp;
		  $scope.$apply();
	  }
  });
  $scope.renderHtml = function(html_code)
	{
		return $sce.trustAsHtml(html_code);
	};
  jQuery.ajax({
	  type: 'get',
	  url: FBSALE_API_URL + '/corelabels',
	  dataType: 'json',
	  success: function(resp) {
		  $scope.post_labels = resp;
		  $scope.$apply();
	  }
  });
  setInterval(function() {
	  jQuery.ajax({
		  type: 'post',
		  url: FBSALE_API_URL + '/socialposts/getComments',
		  dataType: 'json',
		  data: {
			  page_ids: page_ids,
			  filter: $scope.filter
		  },
		  success: function(resp) {
			  $scope.comments = resp;
			  $scope.$apply();
		  }
	  });
	}, 1000);
	
	var postsCond = {
		type: 'post',
		page_id: {'in': page_ids}
	};
	  jQuery.ajax({
		  type: 'get',
		  url: FBSALE_API_URL + '/socialposts/find',
		  dataType: 'json',
		  data: {
			  where: JSON.stringify(postsCond)
		  },
		  success: function(resp) {
			  $scope.posts = resp;
		  }
	  });
	
  $scope.selectedComment = {
	  facebook_user_name: 'Undefined'
  };
  setInterval(function() {
	  if(typeof $scope.selectedComment !== 'undefined' && typeof $scope.selectedComment.id !== 'undefined') {
		  jQuery.ajax({
			  type: 'post',
			  url: FBSALE_API_URL + '/socialposts/getSubComments',
			  dataType: 'json',
			  data: {
				  comment_id: $scope.selectedComment.id
			  },
			  success: function(resp) {
				  $scope.conversations = resp;
				  $scope.$apply();
			  }
		  });
	  }
	}, 1000);
  $scope.filter = {
	  post_ids: {}
  };
  $scope.resetFilters = function() {
	  $scope.filter = {
		  post_ids: {}
	  };
  };
  $scope.selectComment = function(comment) {
	  selectedComment = $scope.selectedComment = comment;
	  
	  selectedComment.read = 1;
	  jQuery.ajax({
		  type: 'PATCH',
		  url: FBSALE_API_URL + '/socialposts/' + selectedComment.id,
		  dataType: 'json',
		  data: {read: 1},
		  async: false,
		  success: function(resp) {
			  
		  }
	  });
	  jQuery.ajax({
		  type: 'get',
		  url: FBSALE_API_URL + '/socialposts/' + comment.parent_id,
		  dataType: 'json',
		  success: function(resp) {
			  selectedPost = $scope.post = resp;
			  $scope.$apply();
		  }
	  });
	  $scope.customer = {
		  facebook_id: 	comment.facebook_user_id,
		  name:			comment.facebook_user_name
	  };
	  if(comment.facebook_user_id !== '') {
		  jQuery.ajax({
			  type: 'get',
			  url: FBSALE_API_URL + '/ecommercecustommers/find',
			  data: {where: {
				  facebook_id: comment.facebook_user_id
			  }},
			  dataType: 'json',
			  success: function(resp) {
				  if(resp.length) {
					  $scope.customer = resp[0];
					  $scope.selectAddress();
				  } else {
					  // nothing
				  }
			  }
		  });
	  } else {
		  // nothing
	  }
  };
  $scope.reloadComment = function() {
	  if(typeof $scope.selectedComment !== 'undefined' && typeof $scope.selectedComment.id !== 'undefined') {
		  $scope.selectComment($scope.selectedComment);
	  }
  };
  $scope.checkCommentHasLabel = function(label) {
	  
	  if(typeof $scope.selectedComment !== 'undefined' && typeof $scope.selectedComment.id !== 'undefined') {
		  for(var i = 0; i < $scope.selectedComment.ref_post_labels.length; i++) {
			  if($scope.selectedComment.ref_post_labels[i].id == label.id) {
				  return true;
			  }
		  }
	  }
	  return false;
  };
  $scope.loadCustomer = function(id) {
	  jQuery.ajax({
		  type: 'get',
		  url: FBSALE_API_URL + '/ecommercecustommers/find',
		  data: {where: {
			  id: id
		  }},
		  dataType: 'json',
		  success: function(resp) {
			  if(resp.length) {
				  $scope.customer = resp[0];
				  $scope.selectAddress();
			  } else {
				  // nothing
			  }
		  }
	  });
  };
  $scope.reloadCustomer = function() {
	  $scope.loadCustomer($scope.customer.id);
  };
  $scope.products = [];
  $scope.map_product = {};
  $scope.map_product_option = {};
  $scope.map_product_options = {};
  jQuery.ajax({
	  type: 'get',
	  url: FBSALE_API_URL + '/ecommerceproducts/find',
	  dataType: 'json',
	  success: function(resp) {
			$scope.products = resp;
			$scope.products.forEach(function(product,index) {
				$scope.map_product[product.id] = product;
				$scope.map_product_options[product.id] = product.ref_product_options;
				product.ref_product_options.forEach(function(product_option) {
					$scope.map_product_option[product_option.id] = product_option;
				});
			});
	  }
  });
  $scope.product_options = [];
  jQuery.ajax({
	  type: 'get',
	  url: FBSALE_API_URL + '/ecommerceproductoptions/find',
	  dataType: 'json',
	  success: function(resp) {
			$scope.product_options = resp;
	  }
  });
  
  $scope.product_options = [];
  jQuery.ajax({
	  type: 'get',
	  url: FBSALE_API_URL + '/ecommerceshippers/find',
	  dataType: 'json',
	  success: function(resp) {
			$scope.shippers = resp;
	  }
  });
  
  $scope.selectedAddress = {
	  type: 'billing'
  };
  $scope.selectAddress = function() {
	  var address_id = $scope.customer.address_id;
	  for(var i = 0; i < $scope.customer.ref_addresses.length; i++) {
		  var address = $scope.customer.ref_addresses[i];
		  if(address.id == address_id) {
			  selectedAddress = $scope.selectedAddress = address;
			  break;
		  }
	  }
	  
  };
  $scope.deleteAddress = function() {
	  if($scope.customer.id) {
		  if($scope.selectedAddress.id) {
			  if(confirm('Bạn có muốn xóa?')) {
				  jQuery.ajax({
					  url: FBSALE_API_URL + '/ecommerceaddress/' + $scope.selectedAddress.id,
					  type: 'delete',
					  dataType: 'json',
					  success: function(resp) {
						  $scope.reloadCustomer();
					  }
				  });
			  }
		  }
	  }
  };
  
  $scope.order = {
	  discount: 0,
	  tax: 0,
	  shipping_fee: 0,
	  shippable: '0'
  };
  $scope.order_items = [{quantity: 1}];
  $scope.addNewOrderItem = function() {
	  $scope.order_items.push({quantity: 1});
  };
  $scope.removeOrderItem = function(item) {
	  if($scope.order_items.length > 1) {
		  for(var i = 0; i < $scope.order_items.length; i++) {
			  if(item === $scope.order_items[i]) {
				  $scope.order_items.splice(i, 1);
			  }
		  }
	  }
  };
  $scope.selectProduct = function(order_item) {
	  if(order_item.product_id) {
		var product = $scope.map_product[order_item.product_id];
		order_item.price = product.price;
	  }
  };
  $scope.selectProductOption = function(order_item) {
	  if(order_item.product_option_id) {
		var product_option = $scope.map_product_option[order_item.product_option_id];
		order_item.price = product_option.price;
	  } else {
		  if(order_item.product_id) {
			var product = $scope.map_product[order_item.product_id];
			order_item.price = product.price;
		  }
	  }
  };
  $scope.saveCustomer = function() {
	  if($scope.customer.id) {
		  // update
		jQuery.ajax({
		  type: 'PATCH',
		  url: FBSALE_API_URL + '/ecommercecustommers/' + $scope.customer.id,
		  data: object_filter_omit_by_fields($scope.customer, ['ref_order', 'ref_addresses']),
		  dataType: 'json',
		  success: function(resp) {
			  $scope.customer.isSaved = true;
			  setTimeout(function() {
				  $scope.customer.isSaved = false;
			  }, 2000);
		  }
		});  
	  } else {
		  // insert
		  jQuery.ajax({
		  type: 'POST',
		  url: FBSALE_API_URL + '/ecommercecustommers',
		  data: $scope.customer,
		  dataType: 'json',
		  success: function(resp) {
			  $scope.customer.isSaved = true;
			  $scope.customer.id = resp.id;
			  setTimeout(function() {
				  $scope.customer.isSaved = false;
			  }, 2000);
		  }
		});
	  }
  };
  
  $scope.saveAddress = function() {
	  if($scope.customer.id) {
		  if($scope.selectedAddress.id) {
			  jQuery.ajax({
				  type: 'PATCH',
				  url: FBSALE_API_URL + '/ecommerceaddress/' + $scope.selectedAddress.id,
				  data: $scope.selectedAddress,
				  dataType: 'json',
				  success: function(resp) {
					  $scope.loadCustomer();
					  jQuery('#createAddressModal').modal('hide');
				  }
			  });
		  } else {
			  $scope.selectedAddress.custommer_id = $scope.customer.id;
			  
			  jQuery.ajax({
				  type: 'POST',
				  url: FBSALE_API_URL + '/ecommerceaddress',
				  data: $scope.selectedAddress,
				  dataType: 'json',
				  success: function(resp) {
					  $scope.loadCustomer();
					  jQuery('#createAddressModal').modal('hide');
				  }
			  });
		  }
	  } else {
		  alert('Bạn phải lưu khách hàng trước');
	  }
  };
  
  $scope.createOrder = function() {
	  jQuery.ajax({
		  url: FBSALE_API_URL + '/ecommerceorders/customerCreateOrder',
		  type: 'post',
		  dataType: 'json',
		  data: {
			  customer: object_filter_omit_by_fields($scope.customer, ['ref_addresses', 'ref_order']),
			  order_items: $scope.order_items,
			  order: $scope.order
		  },
		  success: function(resp) {
			  
		  }
	  });
  };
  
  
  $scope.provinces = [];
  jQuery.ajax({
	  type: 'get',
	  url: FBSALE_API_URL + '/locationprovinces/find',
	  dataType: 'json',
	  success: function(resp) {
			$scope.provinces = resp;
	  }
  });
  
  $scope.selectProvince = function() {
	if(typeof $scope.selectedAddress.province_id !== 'undefined') {
	  jQuery.ajax({
		  type: 'get',
		  url: FBSALE_API_URL + '/locationdistricts/find',
		  dataType: 'json',
		  data: {
			  where: {
				  province_id: $scope.selectedAddress.province_id
			  }
		  },
		  success: function(resp) {
				$scope.districts = resp;
		  }
	  });  
	}
  };
  
  $scope.selectDistrict = function() {
	if(typeof $scope.selectedAddress.district_id !== 'undefined') {
	  jQuery.ajax({
		  type: 'get',
		  url: FBSALE_API_URL + '/locationwards/find',
		  dataType: 'json',
		  data: {
			  where: {
				  district_id: $scope.selectedAddress.district_id
			  }
		  },
		  success: function(resp) {
				$scope.wards = resp;
		  }
	  });  
	}
  };
  
  $scope.selectQuickMessage = function(post_template) {
	  jQuery('#commentInput').val(post_template.content);
	  jQuery('#commentInput').focus();
  };
  $scope.setUnread = function() {
	  if(typeof selectedComment !== 'undefined') {
		  jQuery.ajax({
			  type: 'PATCH',
			  url: FBSALE_API_URL + '/socialposts/' + selectedComment.id,
			  dataType: 'json',
			  data: {read: 0},
			  async: false,
			  success: function(resp) {
				  
			  }
		  });
	  }
  };
  $scope.post_conversations = [];
  $scope.calculateTotalBeforeDiscount = function() {
	  var total = 0;
	  $scope.order_items.forEach(function(order_item) {
		  total += order_item.total;
	  });
	  return total;
  };
  $scope.calculateTotalBeforeTax = function() {
	  return $scope.order.totalBeforeDiscount - $scope.order.discount;
  };
  $scope.calculateTotal = function() {
	  return $scope.order.totalBeforeTax * (1 + $scope.order.tax / 100) + parseFloat($scope.order.shipping_fee);
  };
}]);
function nl2br(str, is_xhtml) {
	if (typeof str === 'undefined' || str === null) {
		return '';
	}
	var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
	return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}

function object_filter(obj, filterFunc) {
	var result = {};
	for(var key in obj) {
		if(filterFunc(key, obj[key])) {
			result[key] = JSON.parse(JSON.stringify(obj[key]));
		}
	}
	return result;
}

function object_filter_by_fields(obj, fields) {
	var filterFunc = function(key, value) {
		if(fields.indexOf(key) !== -1) {
			return true;
		}
		return false;
	};
	return object_filter(obj, filterFunc);
}

function object_filter_omit_by_fields(obj, fields) {
	var filterFunc = function(key, value) {
		if(fields.indexOf(key) === -1) {
			return true;
		}
		return false;
	};
	return object_filter(obj, filterFunc);
}