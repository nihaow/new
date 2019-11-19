<?php
	$da=$_GET["da"];
	$conn=mysqli_connect("127.0.0.1","root","","h51906",3306);
	mysqli_query($conn,"SET NAMES UTF8");
	if($da==0){
		$sql="SELECT * FROM books";
		$rs=mysqli_query($conn,$sql);
		$arr=[];
		while($row=mysqli_fetch_row($rs)){
			array_push($arr,$row);
		}
		echo JSON_encode($arr);
	}else if($da==1){
		$name=$_GET["name"];
		$price=$_GET["price"];
		$author=$_GET["author"];
		$synopsis=$_GET["synopsis"];
		$sql="SELECT * FROM books";
		$rs=mysqli_query($conn,$sql);
		while(($row=mysqli_fetch_row($rs))!=null){
			$sql="INSERT INTO books VALUES(0,'$name','$price','$author','$synopsis')";
			$rs=mysqli_query($conn,$sql);
			echo "<script>location='success.html'</script>";
			
		}
	}else if($da==2){
		$id=$_GET["id"];
		$sql="DELETE FROM books WHERE id=$id";
		$rs=mysqli_query($conn,$sql);
	}else if($da==3){
		$id=$_GET["id"];
		$sql="SELECT * FROM books WHERE id=$id";
		$rs=mysqli_query($conn,$sql);
		$arr=mysqli_fetch_row($rs);
		echo JSON_encode($arr);
	}else if($da==4){
		$id=$_GET["id"];
		$name=$_GET["name"];
		$price=$_GET["price"];
		$author=$_GET["author"];
		$synopsis=$_GET["synopsis"];
			$sql="UPDATE books SET name='$name',price='$price',author='$author',synopsis='$synopsis' WHERE id='$id'";
			$rs=mysqli_query($conn,$sql);
			if($rs){
				echo "<script>location='success.html'</script>";
			}
		}
?>