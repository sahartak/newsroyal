<?php 
 include "../locks.php"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>MooTools FileManger Testground</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" href="http://og5.net/christoph/favicon.png" />
  <style type="text/css">
  body {
    font-size: 11px;
    font-family: Tahoma, sans-serif;
  }
  
  h1 {
    margin: 0 0 10px 0;
    padding: 0;
    
    color: #666;
    font-weight: normal;
    font-size: 24px;
    letter-spacing: 1px;
    word-spacing: 2px;
    line-height: 22px;
    min-height: 25px;
  }

  h1 span {
    font-size: 11px;
    letter-spacing: 0;
    word-spacing: 0;
    text-shadow: none;
  }
  
  .blue { color: #1f52b0; }
  
  div.content {
    min-height: 200px;
    margin: 23px 34px;
    padding: 10px 17px;
    border: 1px solid #b2b2b2;
    background: #fff;
    box-shadow: rgba(0, 0, 0, 0.3) 0 0 10px;
  -moz-box-shadow: rgba(0, 0, 0, 0.3) 0 0 10px;
  -webkit-box-shadow: rgba(0, 0, 0, 0.3) 0 0 10px;
  }
  
  div.content div.example {
    float: left;
    clear: both;
    margin: 10px 0;
  }
  
  button {
    margin: 5px 0;
  }
  </style>
  
  <script type="text/javascript" src="mootools-core-1.3.1.js"></script>
  <script type="text/javascript" src="mootools-more-1.3.1.1.js"></script>
  <script type="text/javascript" src="../Source/FileManager.js"></script>
  <script type="text/javascript" src="../Source/Gallery.js"></script>
  <script type="text/javascript" src="../Source/Uploader/Fx.ProgressBar.js"></script>
  <script type="text/javascript" src="../Source/Uploader/Swiff.Uploader.js"></script>
  <script type="text/javascript" src="../Source/Uploader.js"></script>
  <script type="text/javascript" src="../Language/Language.en.js"></script>

  
  <script type="text/javascript">
    window.addEvent('domready', function() {
      
      /* Simple Example */
      var manager1 = new FileManager({
        url: 'manager.php',
        language: 'en',
        hideOnClick: true,
        assetBasePath: '../Assets',
        uploadAuthData: {session: 'MySessionId'},
        upload: true,
        download: true,
        destroy: true,
        rename: true,
        createFolders: true,
      });
      $('example1').addEvent('click', manager1.show.bind(manager1));

      /* Select a file */
      var el = $('example2');
      var div, manager2;
      var complete = function(path, file) {
        el.set('value', path);
        if(div) div.destroy();
        var icon = new Asset.image(this.assetBasePath+'Images/cancel.png', {'class': 'file-cancel', title: 'deselect'}).addEvent('click', function(e){
          e.stop();
          el.set('value', '');
          var self = this;
          div.fade(0).get('tween').chain(function(){
            div.destroy();
            manager2.tips.hide();
            manager2.tips.detach(self);
          });
        });
        manager2.tips.attach(icon);

        div = new Element('div', {'class': 'selected-file', text: 'Selected file: '}).adopt(
          new Asset.image(file.icon, {'class': 'mime-icon'}),
          new Element('span', {text: file.name}),
          icon
        ).inject(el, 'after');
      };
      
      manager2 = new FileManager({
        url: 'selectImage.php',
        language: 'en',
        filter: 'image',
        hideOnClick: true,
        assetBasePath: '../Assets',
        uploadAuthData: {session: 'MySessionId'},
        selectable: true,
        upload: true,
        destroy: true,
        rename: true,
        createFolders: true,
        onComplete: complete
      });
      
      el.setStyle('display', 'none');
      var val = el.get('value');
      if(val) complete.apply(manager2, [val, {
        name: val.split('/').getLast(),
        icon: '../Assets/Images/Icons/'+val.split('.').getLast()+'.png'
      }]);
      
      new Element('button', {'class': 'browser', text: 'Select an image'}).addEvent('click', manager2.show.bind(manager2)).inject(el, 'before');

      /* Localized Example */
      var manager3 = new FileManager({
        url: 'manager.php',
        language: 'de',
        hideOnClick: true,
        assetBasePath: '../Assets',
        uploadAuthData: {session: 'MySessionId'},
        upload: true,
        destroy: true,
        rename: true,
        createFolders: true
      });
      $('example3').addEvent('click', manager3.show.bind(manager3));


      /* Gallery Example */
      var global = this;
      var example4 = $('myGallery');
      var manager4 = new FileManager.Gallery({
        url: 'selectImage.php',
        assetBasePath: '../Assets',
        filter: 'image',
        hideOnClick: true,
        uploadAuthData: {session: 'MySessionId'},
        onShow: function(){
          var obj;
          Function.attempt(function(){ obj = JSON.decode(example4.get('value')); });
          this.populate(obj);
        },
        onComplete: function(serialized){
          example4.set('value', JSON.encode(serialized));
        }
      });
      $('example4').addEvent('click', manager4.show.bind(manager4));
    });
  </script>
</head>
<body>
<div id="content" class="content">
  <h1>FileManager Demo</h1>
  <div class="example">
    <button id="example1" class="BrowseExample">Open File-Manager</button>
  </div>
  <div class="example">
    <input name="BrowseExample2" type="text" id="example2" value="Smile.gif" />
  </div>
  <div class="example">
    <a href="#" id="example3" class="BrowseExample">Open File-Manager from a link (German)</a>
  </div>

  <div class="example">
    <button id="example4">Create a Gallery</button>
    <input name="BrowseExample4" type="text" id="myGallery" value="Gallery output will be stored in here" style="width: 250px;" />
  </div>
  <div style="clear: both;"></div>
</div>
</body>
</html>