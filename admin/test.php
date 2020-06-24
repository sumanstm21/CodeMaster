<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex, nofollow">
  <title>Classic editor replacing a textarea</title>
  <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
</head>

<body>
  <form action="https://d1.ckeditor.com/savetextarea/savetextarea.php" method="post" data-sample-short>&lt;p&gt;This is some &lt;strong&gt;sample text&lt;/strong&gt;. You are using &lt;a href=&quot;https://ckeditor.com/&quot;&gt;CKEditor&lt;/a&gt;.&lt;/p&gt;</form>
  <script>
    CKEDITOR.replace('editor1');
  </script>
</body>

</html>