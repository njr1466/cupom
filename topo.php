<?php
if (isset($_SESSION['logado'])) {
    ?>

   <div class="collapse navbar-collapse hidden-sm hidden-xs" id="dropdown-thumbnail-preview" style="background-image: url(imagem/cabecalhopequeno.png); height: 35px; ">
        <ul class="nav navbar-nav navbar-right ">
            <li class="dropdown thumb-dropdown">
                  <a href="teste.php" class="dropdown-toggle"  style="color: #ffffff"><strong>Home</strong></a>
               
            </li> 
            
            <li class="dropdown thumb-dropdown">
                  <a href="#" class="dropdown-toggle"  style="color: #ffffff"><strong>Anuncie</strong></span></a>
               
            </li>
            <li class="dropdown thumb-dropdown">
                  <a href="login.php" class="dropdown-toggle" data-toggle="dropdown" style="color: #ffffff"><strong>Meus Cupons</strong> <span class="caret"></span></a>
                
            </li>
            <li class="dropdown thumb-dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #ffffff"><strong><?php echo $_SESSION['NAME']; ?></strong> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">

                    <li><a href="login.php">  Meus Cupons </a></li>       
                    <li>  Editar Dados </li>    
                    <li>  Logout </li> 

                </ul>
            </li>
              <li ><img style="width: 40px;height: 40px;padding-top: 10px;padding-right: 10px;" src="https://graph.facebook.com/<?php echo $_SESSION['UID']; ?>/picture"></li>
        </ul>
        
    </div>

    

    <?php
} else {
    ?>
    <div style="background-image: url(imagem/cabecalhopequeno.png); height: 40px; width: 100%">
         <div class="container">
            <div class="row">
                <ul class="nav navbar-nav navbar-right">
                    <li style="width: 100px"><a href="teste.php" style="color: #ffffff"><strong>Home</strong></a></li>
                    <li style="width: 100px"><a href="#" style="color: #ffffff"><strong>Anuncie</strong></a></li>                                  
                    <li style="width: 120px"><a href="#" style="color: #ffffff"><strong>Cadastre-se</strong></a></li>
                    <li style="width: 100px"><a href="login.php" style="color: #ffffff"><strong>Login</strong></a></li>
                    <li style="width: 100px"><a href="<?php echo $login_url; ?>"><i id="social" class="fa fa-facebook-square fa-3x social-fb"></i></a></li>

                </ul>
                <div class="col-xs-2"></div>
                <div class="col-xs-2" style="color: #ffffff" style="color: #ffffff; font-family: arial"></div>
                <div class="col-xs-2 hidden-sm hidden-xs" style="color: #ffffff; color: #ffffff; font-family: arial"></div>
            </div>
        </div>       
    </div>




    <?php
};
?>