
<!DOCTYPE html>

<html>
    <head>
        <title>Daftar Masuk</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/stylesheet.css"> </link>
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/font-awesome.min.css"></link>
    </head>


    <body>
        <div class="container">

            <img src="<?=base_url('assets/')?>img/fskmlogo.png"><br>


            <center>RESOURCE PERSON INFORMATION <br>MANAGEMENT SYSTEM</center><br><br>
           
            <?= form_error('username',' <div id="error_msg" style="color:red">','</div>');?>
              <?= form_error('password',' <div id="error_msg" style="color:red">','</div>');?>
            <form action="<?=base_url('auth')?>" method="POST">
                
                <div class="form-input">
                    
                    <input type="text" name="username" placeholder="Username" value="<?=set_value('username')?>">
                    <input type="password" name="password" placeholder="Password">
                    <br>
                    <?=$gmail?>
                    <button class="button button4" type="submit" name="login_btn">LOGIN</button>


                </div>
            </form>
        </div> 
        

    </body>
</html>