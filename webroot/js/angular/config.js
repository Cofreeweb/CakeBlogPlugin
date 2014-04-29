adminApp.config( ['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/posts/add', {
        template: '',
        controller: 'PostsAddCtrl'
      }).
      when('/posts/drafts', {
        templateUrl: '/angular/template?t=Blog.posts/admin_drafts',
        controller: 'PostsDraftsCtrl'
      }).
      when('/posts/edit/:id', {
        templateUrl: '/angular/template?t=Blog.posts/admin_edit',
        controller: 'PostsEditCtrl'
      })
  }
]);