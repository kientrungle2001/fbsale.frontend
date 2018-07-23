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
				  } else {
					  // nothing
				  }
			  }
		  });
	  } else {
		  // nothing
	  }
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
	  })
	  
	  
	  $scope.selectAddress = function(address) {
		  $scope.selectedAddress = address;
	  };
	  $scope.selectedAddress = {};
	  $scope.order = {};
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
		  }
	  };
	  $scope.saveCustomer = function() {
		  if($scope.customer.id) {
			  // update
			jQuery.ajax({
			  type: 'PATCH',
			  url: FBSALE_API_URL + '/ecommercecustommers/' + $scope.customer.id,
			  data: $scope.customer,
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
}]);
function nl2br(str, is_xhtml) {
	if (typeof str === 'undefined' || str === null) {
		return '';
	}
	var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
	return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}
fbSaleApp.filter('nl2br', function() {
	return function (str, is_xhtml) {
		if (typeof str === 'undefined' || str === null) {
			return '';
		}
		var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
		return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
	}
});

fbSaleApp.filter("trust", ['$sce', function($sce) {
  return function(htmlCode){
    return $sce.trustAsHtml(htmlCode);
  }
}]);