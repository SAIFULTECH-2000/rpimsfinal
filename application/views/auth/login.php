
<!DOCTYPE html>

<html>
    <head>
        <title>Uitm | RPIMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/stylelogin.css"> </link>
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/applogin.css"></link>
        
    </head>
    <style type="text/css">
    	body {
		  	background-color: white;
		}
    </style>

    <body>
        <div class="container-fluid">
        <div class="row" style="margin-top: 50px; margin-bottom: 50px;">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">

                <div>
                    <form action="<?=base_url('auth')?>" method="POST">
                        <div class="form-group">
                            <img
                                class="w-100 h-100"
                                src="<?=base_url('assets/')?>img/download.jpg"
                                alt="FSKM UiTM"
                              />
                              <center>RESOURCE PERSON INFORMATION <br>MANAGEMENT SYSTEM</center>
                        </div>
                        <hr/>
                        <marquee width="100%" direction="left" height="30px">
                            if forget password please use login with gmail
                        </marquee>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Staff ID" value="<?=set_value('username')?>">

                             <?= form_error('username',' <div id="error_msg" style="color:red">','</div>');?>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kata Laluan</label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                         
                             <?= form_error('password',' <div id="error_msg" style="color:red">','</div>');?>
                        </div>
                        <div class="form-group">
                               <?=$gmail?>
                        </div>
                    

                        <div style="text-align: center; padding-top: 20px;">
                            <button type="submit" class="btn btn-dark btn-lg btn-block">Login</button>
                        </div>

                    </form>
                </div>
                
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
        

    </body>
</html>