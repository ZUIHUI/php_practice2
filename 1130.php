<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        請匯入欲上傳的圖檔(限jpg、gif、png) : 
        <input type="file" name="File" accept="image/jpg,image/jpeg,image/gif,image/png"><br />
        <input type="submit" value="送出查詢">
    </form>
    <?php
        if(isset($_FILES['File'])){
            if(is_uploaded_file($_FILES['File']['tmp_name'])){
                $fileInfo = $_FILES['File'];
                $tmp_name = $fileInfo['tmp_name'];
                $name =$fileInfo['name'];
                $error=$fileInfo["error"];
                $upload = "C:/xampp/htdocs/image/$name";
                $imagepath = "image/$name";

                if ($error== 0){
                    echo "檔案類型 : ".$fileInfo['type']."<br />";
                    move_uploaded_file($tmp_name,$upload);
                    $arr = getimagesize("$imagepath");
                    if($arr[0]>1000){
                        echo "<img src=".$imagepath." width='50%'>";
                    }
                    else{
                        echo "<img src=".$imagepath.">";
                    }
                }
                else{
                    echo $error;
                }
            }
        }
    ?>　
</body>
</html>