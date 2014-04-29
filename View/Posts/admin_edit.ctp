<form ng-submit="submit()">
  <?= $this->Form->input( 'Post.title', array(
      'ng-model' => 'post.Post.title',
      'label' => 'Título',
  )) ?>
  
  <?= $this->Form->input( 'Post.body', array(
      'type' => 'textarea',
      'ckeditor' => '',
      'ng-model' => 'post.Post.body',
      'label' => 'Cuerpo de texto',
  )) ?>
  
  <input type="submit" id="submit" value="Submit" />
</form>

<div upload-gallery uploaded-files-model="modelName" flexslider="#flexslider" scope-var="post.Post.photos" upload-destination="/blog/posts/upload.json?model=Post&content_id={{post.Post.id}}&key=block&alias=Photo" upload-extensions="jpg,gif,png"></div>


<ul>
  <li id="upload_{{asset.id}}" ng-repeat="asset in post.Post.photos">
    <img src="{{asset.paths.thm}}" />
    <a url="/blog/posts/delete_upload.json" el="#upload_{{asset.id}}" flexslider="#flexslider" scope-var="post.Post.photos" alert="<?= __d( "admin", "¿Estás seguro?") ?>" class="upload-delete" delete-upload><?= __d( 'admin', 'Borrar') ?></a>
  </li>
</ul>