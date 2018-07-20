var fbSaleApp = angular.module('fbSaleApp', []);

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