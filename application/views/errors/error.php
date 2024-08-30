<!DOCTYPE html>
<html>
<head>
	<title>403 Forbidden</title>
</head>
<body>

<p>
	<h1 style='color:red;display: flex;justify-content: center;'>Error, Setting IP <?=$ip=$this->input->ip_address();?>Belum Sesuai</h1>
</p>
<script type="text/javascript">
	setTimeout(function(){
         window.location.href ="<?=base_url();?>";
      },5 * 1000);
</script>
</body>
</html>
