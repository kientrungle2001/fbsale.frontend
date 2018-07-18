var fbSaleApp = angular.module('fbSaleApp',[]);

fbSaleApp.controller('PostController', ['$scope', function($scope) {
  $scope.title = 'Quản lý comment/inbox';
  
  setInterval(function() {
	  jQuery.ajax({
		  type: 'post',
		  url: FBSALE_API_URL + '/socialposts/getComments',
		  dataType: 'json',
		  data: {
			  page_ids: page_ids
		  },
		  success: function(resp) {
			  $scope.posts = resp;
			  $scope.$apply();
		  }
	  });
	}, 1000);
  $scope.post = {
	  facebook_user_name: 'Undefined'
  };
  setInterval(function() {
	  if(typeof $scope.post.id !== 'undefined') {
		  jQuery.ajax({
			  type: 'post',
			  url: FBSALE_API_URL + '/socialposts/getSubComments',
			  dataType: 'json',
			  data: {
				  comment_id: $scope.post.id
			  },
			  success: function(resp) {
				  $scope.conversations = resp;
				  $scope.$apply();
			  }
		  });
	  }
	}, 1000);
  $scope.selectPost = function(post) {
	  $scope.post = post;
  };
  $scope.post_conversations = [
  {
	  type: 'member',
	  avatar: 'https://graph.facebook.com/1608210225983055/picture?height=100&amp;width=100',
	  name: 'Như Mây Trần',
	  date: '28/06/2018',
	  time: '18:25',
	  messages: [
		{content: 'Bé năm nay lớp 4'},
		{content: 'Bé năm nay lớp 4'}
	  ]
  },
  {
	  type: 'page',
	  avatar: 'https://graph.facebook.com/1608210225983055/picture?height=100&amp;width=100',
	  name: 'Nguyễn Văn Hữu',
	  date: '28/06/2018',
	  time: '18:25',
	  messages: [
		{content: 'Chào chị'},
		{content: 'Dạ bạn lớp 4 là ôn được phần mềm này rồi chị nhé'}
	  ]
  },
  {
	  type: 'member',
	  avatar: 'https://graph.facebook.com/1608210225983055/picture?height=100&amp;width=100',
	  name: 'Như Mây Trần',
	  date: '28/06/2018',
	  time: '18:25',
	  messages: [
		{content: 'Bé năm nay lớp 4'},
		{content: 'Bé năm nay lớp 4'}
	  ]
  },
  {
	  type: 'page',
	  avatar: 'https://graph.facebook.com/1608210225983055/picture?height=100&amp;width=100',
	  name: 'Nguyễn Văn Hữu',
	  date: '28/06/2018',
	  time: '18:25',
	  messages: [
		{content: 'Chào chị'},
		{content: 'Dạ bạn lớp 4 là ôn được phần mềm này rồi chị nhé'}
	  ]
  }
  ];
}]);

function handle_comment_reply(evt) {
	if(evt.keyCode === 13) {
		var content = evt.target.value;
		evt.target.value = '';
		jQuery.ajax({
			url: FBSALE_API_URL + '/socialposts/postComment',
			data: {
				comment_id: '',
				content: content
			}
		});
	}
}