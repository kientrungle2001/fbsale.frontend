var fbSaleApp = angular.module('fbSaleApp',[]);

fbSaleApp.controller('PostController', ['$scope', function($scope) {
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
  setInterval(function() {
	  jQuery.ajax({
		  type: 'post',
		  url: FBSALE_API_URL + '/socialposts/getComments',
		  dataType: 'json',
		  data: {
			  page_ids: page_ids
		  },
		  success: function(resp) {
			  $scope.comments = resp;
			  $scope.$apply();
		  }
	  });
	}, 1000);
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
  $scope.filter = {};
  $scope.resetFilters = function() {
	  $scope.filter = {};
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
  };
  $scope.selectQuickMessage = function(post_template) {
	  jQuery('#commentInput').val(post_template.content);
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