<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <input type="button" value="press here" onclick="pack()"/>
  
  <script type="text/javascript" src="./js/jquery.js"></script>
  <script type="text/javascript" src="./js/jszip-utils.js"></script>
  <script type="text/javascript" src="./jszip/dist/jszip.min.js"></script>
  <script type="text/javascript" src="./jszip/vendor/FileSaver.js"></script>
  <script>
    function pack() {
      var zip = new JSZip();
      var count = 0;
      var nombre = "example.zip";
      var urls = [
        './img/images.jpg',
        './img/images_2.jpg'
      ];

      urls.forEach(function(url) {
        JSZipUtils.getBinaryContent(url, function(err, data) {
          if(err) {
            throw err; 
          }
          zip.file(count+".jpg", data, {base64: true});
          ++count;

          if (count == urls.length) {
            zip.generateAsync({type:'blob'}).then(function(content) {
              saveAs(content, nombre);
            });
          }
        });
      });
    }
  </script>
</body>

</html>
