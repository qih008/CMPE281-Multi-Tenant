<?php
$file = $_FILES['file'];//得到传输的数据
//得到文件名称
$name = $file['name'];
$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
$length = strlen($name);
$path_name = strtolower(substr($name,0,$length-4));
echo $path_name;

$allow_type = array('jpg','jpeg','gif','png','zip'); //定义允许上传的类型
//判断文件类型是否被允许上传
if(!in_array($type, $allow_type)){
  //如果不被允许，则直接停止程序运行
  return ;
}
//判断是否是通过HTTP POST上传的
if(!is_uploaded_file($file['tmp_name'])){
  //如果不是通过HTTP POST上传的
  return ;
}
$upload_path = "/var/www/html/uploads/"; //上传文件的存放路径
//开始移动文件到相应的文件夹
if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
  echo "Successfully!";
}else{
  echo "Failed!";
}

// auto unzip file after upload
$zip = new ZipArchive;
//$res = $zip->open('./uploads/cmpe202_upload.zip');
$res = $zip->open('./uploads/'.$name.'');
if ($res === TRUE) {
  $zip->extractTo('./uploads/');
  $zip->close();
  echo 'woot!';
} else {
  echo 'doh!';
}

shell_exec('mv /var/www/html/uploads/'.$path_name.' /var/www/html/uploads/input');
//echo "<pre>shell_exec('ls -lart') </pre>"
//shell_exec('cp /var/www/html/uploads/cmpe202_upload/java/* /var/www/html');
shell_exec('/var/www/html/umlparser /var/www/html/uploads/input output.png');
//shell_exec('java -cp .:/var/www/html umlparser /var/www/html/uploads/input output.png');
//shell_exec('java -cp .:/var/www/html umlparser /var/www/html/uploads/input output.png');

header('Location: http://loadtest-627992424.us-west-2.elb.amazonaws.com/Jiarui_Hu/html/upload.html')
?>

<img src="./output.png">