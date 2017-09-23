<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>前后端对接文档</title>
	<style type="text/css">
	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }
	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}
	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}
	#body{
		margin: 0 15px 0 15px;
	}
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	a:hover{cursor: pointer;}
	</style>
</head>
<body>

<div id="container">
	<h1>前后端对接文档说明</h1>

	<div id="body">
		<p> ● 前端开发模拟接口返回数据</p>
		<p> ● 前端指定接口返回值</p>
		<code><a href="http://192.168.9.141:8003/index.php/home/handApi">编写文档注释</a></code>

		<p> ● 接口按照开发文档接收参数</p>
		<p> ● 接口按照开发文档返回数据</p>
		<code><a href="/doc">查看接口文档</a></code>

		<p>实现前后端分离开发，前端开发完毕后交付产品验收。前台效果通过后，后端按照接口文档实现真正的业务逻辑功能。</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>