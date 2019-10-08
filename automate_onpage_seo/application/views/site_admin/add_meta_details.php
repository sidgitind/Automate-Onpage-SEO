<html>
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" /><!-- changed src path using online path, date : 15-3-2019 -->

</head>
<body>
<div class="wrapper">
		<div style="text-align: center; font-size: 25px;">
								<b>Add Certi Meta Details</b>
							</div>
						
			   <form role="form" id="meta_form" action="store_certi_slugs" method="POST">
			   <div  class="col-sm-offset-1 col-sm-10">
			   <label>Select Certificate</label>&nbsp;&nbsp;&nbsp;&nbsp;
                 <select class="form-control" name="certi_names" id="certi_names">
						   <option value="">Select Certificate</option>
                            <?php
                           // var_dump($null_meta_data);
                            foreach ($null_meta_data as $st) 
                            {
                            ?>
                            <option id="<?php echo $st->title; ?>"
										value="<?php echo $st->title; ?>"><?php echo $st->title; ?></option>
                            <?php
                            }
                            ?>
                   </select>   
                         <br> 
                    </div>
                 
                    <div class="col-sm-offset-5 col-sm-3">
						<input type="submit" class="btn btn-success" id="submit" name="submit" value="submit">
				    </div>
</div>
</body>
</html>
