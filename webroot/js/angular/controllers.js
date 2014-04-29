
// BlocksAddCtrl
// Añade un block nuevo
adminApp.controller( 'PostsAddCtrl', function( $scope, $routeParams, $http) {
    
    $http.post( '/admin/blog/posts/add.json', {
      section_id: $REQUEST.section_id
    }).success(function( data){
      if( data.redirect) {
        window.location.href = data.redirect;
      }
    });
});

/**
* PostsDraftsCtrl
* 
* Da un listado de los posts que no han sido todavía publicados 
*/
adminApp.controller( 'PostsDraftsCtrl', function( $scope, $routeParams, $http) {
    
    $http.post( '/admin/blog/posts/drafts.json', {
        section_id: $REQUEST.section_id
    }).success(function( data){
        $scope.posts = data.posts;
    });
});


/**
* PostsEditCtrl
* 
* Edición de un post
*/
adminApp.controller( 'PostsEditCtrl', function( $scope, $routeParams, $http) {
    
    $scope.submit = function( action){
      $http.post( '/admin/blog/posts/edit/' + $routeParams.id + '.json', $scope.post).success( function( data){
        
      })
    }
});