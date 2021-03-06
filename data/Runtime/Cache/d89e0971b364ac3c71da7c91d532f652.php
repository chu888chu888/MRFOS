<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>FRD物资信息系统</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="GSOA系统,简单的一个CRM开源系统">
        <meta name="author" content="gemer zhang">
        <link href="__ROOT__/static/css/bootstrap.css" rel="stylesheet">
        <link href="__ROOT__/static/css/main.css" rel="stylesheet">
        <link href="__ROOT__/static/css/bootstrap-responsive.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="__ROOT__/static/js/html5shiv.js"></script>
        <![endif]--><!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="__ROOT__/static/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="__ROOT__/static/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="__ROOT__/static/ico/apple-touch-icon-72-precomposed.png">
        <link rel="shortcut icon" href="__ROOT__/static/ico/favicon.png">
        <script src="__ROOT__/static/js/jquery.js"></script>
        <script src="__ROOT__/static/js/bootstrap.js"></script>
		<script src="__ROOT__/static/js/bootstrap-AJAXselect.js"></script>
		<script src="__ROOT__/static/js/bootstrap-AJAXedit.js"></script>
        <script src="__ROOT__/static/js/admin/GSOA.js"></script>
		<script src="__ROOT__/static/js/bootstrap-validation.js"></script>
     <script>
        
            $(document).ready(function(){
				$(".nav li").click(function(){
					$(this).addClass('active').siblings().removeClass('active');
				
				});
				
            });
        </script>
    </head>
    <body>
    	<div class="loading modal hide">
    		<div class="modal-header">
					<H3 class="text-center">Loading...</H3>
				</div>
			<div class="progress progress-striped active">
  		<div class="bar" style="width: 100%;"></div>
			</div>
			
    	</div>
		
        <div class="container">
            <div class="masthead">
               <h1 class="muted"><a href="__APP__/">FRD物资信息系统</a></h1>
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="container">
                            <ul class="nav">
                            	 <?php if($auth["role_id"] > 1): ?><li>
                                       <a href="__APP__/goods">零件列表</a>
                                </li>
									        <li>
                                     <a href="#">仓库管理</a>
                                </li>
                                <li>
                                   <a href="#">管理人员</a>
                                </li>
                                <li>
                                    <a href="#">预留栏目</a>
                                </li>
                                <li>
                                    <a href="#">预留栏目</a>
                                </li>
                                <li>
                                    <a href="#">预留栏目</a>
                                </li>
									<?php else: ?>
								 <li class="dropdown">
                                    <a id="kq" class="dropdown-toggle" data-toggle="dropdown" href="__APP__/goods">库存管理 <b class="caret"></b></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="kq">
                                        <li role="presentation">
                                            <a href="__APP__/goods">零件列表</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="__APP__/goods_cate">零件分类</a>
                                        </li>
                                    </ul>
                                </li>
								        <li>
                                     <a href="__APP__/storage">仓库管理</a>
                                </li>
                                <li>
                                   <a href="__APP__/admin">管理人员</a>
                                </li>
                                <li>
                                    <a href="#">预留栏目</a>
                                </li>
                                <li>
                                    <a href="#">预留栏目</a>
                                </li>
                                <li>
                                    <a href="#">预留栏目</a>
                                </li><?php endif; ?>
                        
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.navbar -->
            </div>
			  <div class="main_head">
                <?php if(!empty($add_menu)): if($auth["role_id"] > 1): else: ?>
                     	 <a data-url="<?php echo ($add_menu["url"]); ?>" role="button" data-toggle="modal" class="<?php echo ($add_menu["id"]); ?> btn btn-info"><?php echo ($add_menu["title"]); ?></a><?php endif; ?>
                    <div class="modal hide fade" id="<?php echo ($add_menu["id"]); ?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h3><?php echo ($add_menu["title"]); ?></h3>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">
                                <?php echo L('close');?>
                            </button>
                            <button class="<?php echo ($add_menu["btn"]); ?> btn btn-primary"type="submit">
                                <?php echo L('save');?>
                            </button>
                        </div>
                    </div>
					      <div class="modal hide fade" id="editing">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h3> <?php echo L('edit');?></h3>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">
                                <?php echo L('close');?>
                            </button>
                            <button class="editingbtn btn btn-primary"type="submit">
                                <?php echo L('save');?>
                            </button>
                        </div>
                    </div><?php endif; ?>
            </div>
<script src="__ROOT__/static/js/highcharts.js"></script>
<script src="__ROOT__/static/js/exporting.js"></script>

   <script>
   	 $(document).ready(function(){
		$.getJSON('<?php echo U("index/get_storage");?>',function(data){
	 	var opts1={
			    chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'FRD仓库金额状况'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
			credits: {  
  				enabled: false  
			},
            series: [{
                type: 'pie',
                name: '金额比例',
                data: data['msg']
            }]
		};
		var opts2={
			    chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'FORD仓库金额状况'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
			credits: {  
  				enabled: false  
			},
            series: [{
                type: 'pie',
                name: '金额比例',
                data: data['data']
            }]
		};
			$('.st1').highcharts(opts1);
			$('.st2').highcharts(opts2);
			
		});
		
	 });
	
	
   </script>
      
     <hr>

<div class="mainbody">
	<div class="row">
		<div class="span5">
			<div class="st1">
			</div>
			
		</div>
		<div class="span5">
			
			<div class="st2">
			</div>
			
		</div>	
		
	</div>
	
      
      </div>

      <hr>
  
   <div class="footer">
        <p>&copy; GSOA 2013.Make By gemerz. &nbsp;&nbsp;|&nbsp;&nbsp;Hi,&nbsp;<?php echo ($auth["username"]); ?>&nbsp;<a class="login_out"><?php echo L("login_out");?></a></p>
      </div>

    </div> <!-- /container -->

 <script type="text/javascript">
 $(document).ready(function(){
 	$('.login_out').click(function(){
	$.get("<?php echo U('index/login_out');?>",function(data) {

	if(data['msg']=="OK"){
			window.location.href=data['data'];
		}

});

 	});


 });
 </script>

  </body>
</html>