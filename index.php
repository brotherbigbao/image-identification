<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //print_r($_SERVER);
        //print_r($_FILES);
        if (isset($_FILES['searchImage']) && $_FILES['error'] == 0) {
            move_uploaded_file($_FILES['searchImage']['tmp_name'], __DIR__ . '/search/search.jpg');
            exec('cd ' . __DIR__ .' && /usr/local/bin/python3 search.py');
        }
    }
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>相似颜色图像检索</title>
    <link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    .image-row { margin-top: 10px; }
    .search-result-container { border: 1px #aaa solid; padding: 8px; }
    </style>
  </head>
  <body>
    <div style="margin: 20px 20px;">
        <div class="row">
            <div class="col-md-12">
                <h1>相似颜色图像检索</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="searchImage">请上传要检索的图片</label>
                    <input name="searchImage" type="file" id="searchImage">
                  </div>
                  <button type="submit" class="btn btn-default">检索</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>上次检索图片</h2>
                <img src="search/search.jpg" />
                <h2>上次检索结果</h2>
            </div>
        </div>
        <div class="row search-result-container">
            <div class="row image-row">
                <div class="col-md-4">
                    <img src="result/0.jpg" />
                </div>
                <div class="col-md-4">
                    <img src="result/1.jpg" />
                </div>
                <div class="col-md-4">
                    <img src="result/2.jpg" />
                </div>
            </div>
            <div class="row image-row">
                <div class="col-md-4">
                    <img src="result/3.jpg" />
                </div>
                <div class="col-md-4">
                    <img src="result/4.jpg" />
                </div>
                <div class="col-md-4">
                    <img src="result/5.jpg" />
                </div>
            </div>
            <div class="row image-row">
                <div class="col-md-4">
                    <img src="result/6.jpg" />
                </div>
                <div class="col-md-4">
                    <img src="result/7.jpg" />
                </div>
                <div class="col-md-4">
                    <img src="result/8.jpg" />
                </div>
            </div>
            <div class="row image-row">
                <div class="col-md-4">
                    <img src="result/9.jpg" />
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap-3.3.7/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>