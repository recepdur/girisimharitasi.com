<!DOCTYPE html>
<html lang="en">
<head>        
    <title>Girişim Haritası</title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    
    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />        
    
    <script type='text/javascript' src='js/plugins/jquery/jquery.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui.min.js'></script>   
    <script type='text/javascript' src='js/plugins/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/globalize.js'></script>    
    <script type='text/javascript' src='js/plugins/bootstrap/bootstrap.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
    <script type='text/javascript' src='js/plugins/uniform/jquery.uniform.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/knob/jquery.knob.js'></script>
    <script type='text/javascript' src='js/plugins/sparkline/jquery.sparkline.min.js'></script>
    <script type='text/javascript' src='js/plugins/flot/jquery.flot.js'></script>     
    <script type='text/javascript' src='js/plugins/flot/jquery.flot.resize.js'></script>
       		
	 <script type='text/javascript' src='js/plugins.js'></script>    
    <script type='text/javascript' src='js/actions.js'></script>
    <script type='text/javascript' src='js/charts.js'></script>

	    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>      
    <script type='text/javascript' src='js/maps.js'></script>
    <script type='text/javascript' src='js/settings.js'></script>
	
		<script type='text/javascript' src='js/plugins/uniform/jquery.uniform.min.js'></script>
    <script type='text/javascript' src='js/plugins/select2/select2.min.js'></script>
    <script type='text/javascript' src='js/plugins/tagsinput/jquery.tagsinput.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui-timepicker-addon.js'></script>
    <script type='text/javascript' src='js/plugins/ibutton/jquery.ibutton.js'></script>
    
    <script type='text/javascript' src='js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
    <script type='text/javascript' src='js/plugins/validationengine/jquery.validationEngine.js'></script>
    
    <script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput.min.js'></script>    
    <script type='text/javascript' src='js/plugins/stepy/jquery.stepy.min.js'></script>    
   
	<link rel="stylesheet" href="css/font-awesome.min.css">
<style type="text/css">
.contextmenu {
  font-size: 1.1em;
  position: absolute;
  width: 150px;
  height: auto;
  padding: 5px 0px;
  border-radius: 5px;
  top: 10;
  left: 10;
  background-color: #27ae60;
  box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24);
  color: #fff;
}

.contextmenu .context_item {
  height: 32px;
  line-height: 32px;
  cursor: pointer;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
}

.contextmenu .context_item:hover { background-color: #2ecc71; }

.contextmenu .context_item .inner_item { margin: 0px 10px; }

.contextmenu .context_item .inner_item i {
  margin: 0 5px 0 0;
  font-weight: bold;
}

.contextmenu .context_hr {
  height: 1px;
  border-top: 1px solid #eee;
  margin: 3px 10px;
}
</style>
<link href="css/jquerysctipttop.css" rel="stylesheet" type="text/css">

</head>
<body class="bg-img-num1"> 
    
    <div class="page-container">
        
		<div class="page-sidebar">
            <a href="index2.php"><div class="page-navigation-panel logo"></div></a>
            <div class="page-navigation-panel">
                <div class="name">Girişim Haritası</div>
                <div class="control"><a href="#" class="psn-control"><span class="icon-reorder"></span></a></div>
            </div>            
            <ul class="page-navigation">
                <li>
                    </br>
                </li>                                                        
            </ul>
            
        </div>
       
	    <div class="page-content">		
			<div class="container">   				  									
				<div class="row">
					<div class="col-md-12">
						<div class="block block-drop-shadow">
							<div class="header">
								<h2>Turkey</h2>
							</div>
							<div class="content np">
								<div id="google_ptm_map" style="width: 100%; height:600px;"></div>
							</div>
						</div>
					</div>
				</div>       								
			</div>			
        </div>
			
		<div class="modal" id="modal_default_2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Firma Bilgileri</h4>
					</div>
					<div class="modal-body clearfix">				
						<form id="validate" method="POST">							
							<div class="content controls">    
								<div class="form-row">
									<div class="col-md-12">
										<input type="text" id="kurulus_date" class="mask_date" placeholder="Kuruluş Tarihi"/>
									</div>
								</div>	
								<div class="form-row">											
									<div class="col-md-12">
										<input type="text" id="adi" placeholder="Adı"/>
									</div>
								</div> 
								<div class="form-row">
									<div class="col-md-12">
										<select class="form-control" id="kategori">   
											<option value="" disabled selected>Kategori</option>									
											<option>Bilişim</option>										
											<option>Biolojik</option>
											<option>Tarım</option>
										</select>
									</div>
								</div>    	
								<div class="form-row">											
									<div class="col-md-12">
										<input type="text" id="il" placeholder="il" readonly="readonly" />
									</div>
								</div> 
								<div class="form-row">											
									<div class="col-md-12">
										<input type="text" id="ilce" placeholder="ilçe" readonly="readonly" />
									</div>
								</div> 
								<div class="form-row">											
									<div class="col-md-12">
										<input type="text" id="mahalle" placeholder="mahalle" />
									</div>
								</div> 
								<div class="form-row">											
									<div class="col-md-12">
										<input type="text" id="sokak" placeholder="sokak" />
									</div>
								</div> 
								<div class="form-row">
									<div class="col-md-12">
										<div class="input-group file">                                    
											<input type="text" id="logo" class="form-control" placeholder="Firma Logosu"/>
											<input type="file" name="file"/>
											<span class="input-group-btn">
												<button class="btn btn-primary" type="button">Yükle</button>
											</span>
										</div>                                
									</div>
								</div> 		
								<div class="form-row">											
									<div class="col-md-12">
										<input type="hidden" id="latitude" value="">
										<input type="hidden" id="longitude" value="">
									</div>
								</div> 								
								<div class="modal-footer">                
									<button type="button" class="btn btn-default btn-clean" data-dismiss="modal">Kapat</button>
									<button type="button" class="btn btn-success btn-clean" onclick="newRecord();">Kaydet</button>
								</div>					
							</div> 
						</form>							
					</div>					
				</div>
			</div>
		</div>    
		
	</div>     
	

<script type="text/javascript">

function newRecord(){

	var latitude = document.getElementById('latitude').value;
	var longitude = document.getElementById('longitude').value;
	var kurulus_date = document.getElementById('kurulus_date').value;
	var adi = document.getElementById('adi').value;
	var kategori = document.getElementById('kategori').value;
	var il = document.getElementById('il').value;
	var ilce = document.getElementById('ilce').value;
	var mahalle = document.getElementById('mahalle').value;
	var sokak = document.getElementById('sokak').value;
	var logo = document.getElementById('logo').value;	
	
	$.ajax({
		type: "POST",
		url: "setting.php",
		data : {"transaction":"insert", "latitude":latitude,"longitude":longitude,"begining":kurulus_date,"name":adi,"category":kategori,"logo":logo,"il":il,"ilce":ilce,"mahalle":mahalle,"sokak":sokak},		
		cache: false,
		success: function(result){ 
			location.reload();
			//map.setCenter(results[0].geometry.location);
		}
	});	
}

</script>
    
</body>
</html>