var fbSaleApp = angular.module('fbSaleApp',[]);

fbSaleApp.controller('PostController', ['$scope', function($scope) {
  $scope.title = 'Quản lý comment/inbox';
  $scope.posts = [
  {
	  name: 'Su Cong Cao',
	  content: 'Ngoài tài liệu tôi cần thầy cô dạy...',
	  type:	'comment',
	  avatar: 'https://graph.facebook.com/2086905601592230/picture?height=100&width=100',
	  time: '11:36',
	  read: false,
	  hasPhone: false
  },
  {
	  name: 'Su Cong Cao',
	  content: 'Ngoài tài liệu tôi cần thầy cô dạy...',
	  type:	'inbox',
	  avatar: 'https://graph.facebook.com/2086905601592230/picture?height=100&width=100',
	  time: '11:36',
	  read: true,
	  hasPhone: false
  },
  {
	  name: 'Su Cong Cao',
	  content: 'Ngoài tài liệu tôi cần thầy cô dạy...',
	  type:	'comment',
	  avatar: 'https://graph.facebook.com/2086905601592230/picture?height=100&width=100',
	  time: '11:36',
	  read: false,
	  hasPhone: true
  },
  {
	  name: 'Su Cong Cao',
	  content: 'Ngoài tài liệu tôi cần thầy cô dạy...',
	  type:	'inbox',
	  avatar: 'https://graph.facebook.com/2086905601592230/picture?height=100&width=100',
	  time: '11:36',
	  read: true,
	  hasPhone: true
  }
  ];
  $scope.post = {
	  name: 'Như Mây Trần'
  },
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