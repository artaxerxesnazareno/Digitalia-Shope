<!DOCTYPE html>
<?php
    include_once('app/gravar_verificacao.php');
    include_once('app/selectProdutos.php');
     include_once('app/carrinho.php');

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digitalia</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 <!--
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script> -->
   
  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class=" user"></i> My Account</a></li>
                            <li><a href="#"><i class=" heart"></i> Wishlist</a></li>
                            <li><a href="cart.php"><i class=" user"></i> My Cart</a></li>
                            <li><a href="checkout.php"><i class=" user"></i> Checkout</a></li>
                            <?php
                            if(!isset($_SESSION['UsuarioID'])){
                                echo "<li><a href='admin/login.php'><i class=' user'></i> Login</a></li>";
                            }else{
                                echo "<li><a href='app/sair.php'><i class=' user'></i> Logout</a></li>";
                            }
                            
                             if($_SESSION['UsuarioPermissao'] == "admin"){
                                echo "<li><a href='admin/index.php'><i class=' user'></i> DashBoard</a></li>";
                            }
                            ?>
                            
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                           

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key"><?php if(isset($_SESSION)){ echo"$Semail";} ?> </span></a>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.php">Digitalia</h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">Cart - <span class="cart-amunt"><?php 
                        foreach($_SESSION['carrinho'] as $id => $qtd){
                                    
                                    $resultado4=mysqli_query($cnx,"select *from produtos where id = $id") or die (mysqli_error());
                                    $data = mysqli_fetch_assoc($resultado4);
                                    $final += $data['precoUnitario']*$qtd;
                                    $conta=$conta + 1;
                                    }
                        echo number_format($final,2,',','.');  ?> kz</span> <i class=" shopping-cart"></i> <span class="product-count"><?php echo $conta ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li ><a href="shop.php">Loja</a></li>
                        <li><a href="shop_favoritos.php">Produtos Favoritos</a></li>
                        <li><a href="single-product.php">Produto unico</a></li>
                        <li><a href="cart.php">Carrinho</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
                        <li><a href="meus_pedidos.php">Meus Pedidos</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="slider-area">
        <div class="zigzag-bottom"></div>
        <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">
            
            <div class="slide-bulletz">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="carousel-indicators slide-indicators">
                                <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                <li data-target="#slide-list" data-slide-to="1"></li>
                                <li data-target="#slide-list" data-slide-to="2"></li>

                            </ol>                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="single-slide">
                        <div class="slide-bg slide-one"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-two"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-three"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-four"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>        
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class=" refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class=" truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class=" lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class=" gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Produtos Recentes</h2>
                        <div class="product-carousel">
                        <?php
                           if(mysqli_num_rows($resultado2)>0){
                           while($data2=mysqli_fetch_array($resultado2,MYSQLI_ASSOC)){ 
                            echo "
                            
                            <div class='single-product'>
                                <div class='product-f-image'>
                                    <img  src='upload_img/".$data2['imagem'].".jpg' alt=''>
                                    <img  src='upload_img/".$data2['imagem'].".png' alt=''>
                                    <div class='product-hover'>
                                        <a href='?acao=add&id=".$data2['idp']."' class='add-to-cart-link'><i class=' shopping-cart'></i> Add to cart</a>
                                        <br>
                                        
                                        <a href='single-product.php?id=".$data2['idp']."' class='view-details-link'><i class=' link'></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href='single-product.php?id=".$data2['idp']."'>".$data2['nome']."</a></h2>
                                
                                <div class='product-carousel-price'>
                                    <ins>kz".number_format($data2['precoUnitario'],2,',','.')."</ins> <del>kz ".number_format(00,2,',','.')."</del>
                                </div> 
                            </div>";
                            }
                           }
                         ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <h2 class="section-title">Marcas</h2>
                        <div class="brand-list">
                            <img src="img/services_logo__1.jpg" alt="">
                            <img src="img/services_logo__2.jpg" alt="">
                            <img src="img/services_logo__3.jpg" alt="">
                            <img src="img/services_logo__4.jpg" alt="">
                            <img src="img/services_logo__1.jpg" alt="">
                            <img src="img/services_logo__2.jpg" alt="">
                            <img src="img/services_logo__3.jpg" alt="">
                            <img src="img/services_logo__4.jpg" alt="">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
    
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>e<span>Electronics</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class=" facebook"></i></a>
                            <a href="#" target="_blank"><i class=" twitter"></i></a>
                            <a href="#" target="_blank"><i class=" youtube"></i></a>
                            <a href="#" target="_blank"><i class=" linkedin"></i></a>
                            <a href="#" target="_blank"><i class=" pinterest"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                    <h2 class="footer-wid-title">Navegação do usuário </h2>
                        <ul>
                            <li><a href="#">Minha conta</a></li>
                            <li><a href="#">Histórico de pedidos</a></li>
                            <li><a href="#">Lista de desejos</a></li>
                            <li><a href="#">Contato do fornecedor</a></li>
                            <li><a href="#">Página inicial</a></li>
                        </ul> 
                 
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                    <h2 class="footer-wid-title">Categorias</h2>
                        <ul>
                            <li><a href="#">Celular</a></li>
                            <li><a href="#">Acessórios domésticos</a></li>
                            <li><a href="#">TV LED</a></li>
                            <li><a href="#">Computador</a></li>
                            <li><a href="#">Gadetes</a></li>
                        </ul>                      
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Boletim informativo</h2>
                        <p>Assine nossa newsletter e receba ofertas exclusivas que você não encontrará em nenhum outro lugar diretamente na sua caixa de entrada!</p>                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Inscrever-se">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 eElectronics. All Rights Reserved. Coded with <i class=" heart"></i> by <a href="http://wpexpand.com" target="_blank">WP Expand</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class=" cc-discover"></i>
                        <i class=" cc-mastercard"></i>
                        <i class=" cc-paypal"></i>
                        <i class=" cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="js/jquery.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>
