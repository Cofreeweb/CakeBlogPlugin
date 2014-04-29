  <h3 ng-bind="post.Post.title"><?= $post ['Post']['title'] ?></h3>
  <div ng-bind-html="post.Post.body">
    <?= $post ['Post']['body'] ?>
  </div>
  
  <div style="width: 300px">
    <? if( $this->Inline->isModeEditor()): ?>
      <div id="flexslider" class="flexslider">
        <ul class="slides">
          <li ng-repeat="asset in post.Post.photos">
            <img src="{{asset.paths.big}}"  />
          </li>
        </ul>
      </div>
    <? else: ?>
        <div id="flexslider" class="flexslider">
          <ul class="slides">
          <? foreach( $post ['Post']['photos'] as $photo): ?>  
              <li><?= $this->Asset->image( $photo, array(
                  'size' => 'big'
              )) ?></li>
          <? endforeach ?>
          </ul>
        </div>
    <? endif ?>
  </div>
  
<? $this->append( 'scriptBottom') ?>
  <script type="text/javascript">
    $(function(){
      $('#flexslider').flexslider({
        animation: "slide"
      });
    })
  </script>
<? $this->end() ?>