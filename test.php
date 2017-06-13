<html>  
<body>  
<form action="test1.php" onsubmit="return sumbit_sure()">  
点击我提交<br>  
<input type="text" name="text" value="text"><br>  
<input type="email">
<input type="submit">  
</form>  
</body>  
</html>  


<script language="javascript">  
function sumbit_sure(){  
var gnl=confirm("确定要提交?");  
if (gnl==true){  
return true;  
}else{  
return false;  
}  
}  


</script>


<?php
$arr = array("one", "two", "three");


foreach ($arr as $key ) {
    echo "Key:".$key.";<br>";
}
?>

