<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Controle de Consumo de Energia Elétrica</title>

        <!-- Favicon -->
        <link href="{{URL::asset('img/favicon.ico')}}" rel="shortcut icon">

        <!-- Fonts -->        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />       

        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{URL::asset('js/ajax.js')}}"></script>        
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">       
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right" id="link-white">
                    <li class="dropdown">
                        <a href="#" style="text-decoration: none">
                            <img src="{{URL::asset('img/samuell.jpg')}}" 
                                 class="img-circle" width="26" height="26" 
                                 style="margin-top: -3px"> 
                            <span id="underline">Samuell Magalhães</span> 
                        </a>                      
                    </li>
                    <li><a href="#" 
                           style="text-decoration: none">
                            <span class="glyphicon glyphicon-log-in"></span> 
                            <span id="underline">Sair</span></a></li>  
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                </ul>
            </div>       
        </nav>       
        <div id="line-one">
            <div class="container">
                <div class="row">  
                    <br>
                    <h4 id="center"><b>CADASTRO DE EQUIPAMENTO ELETROELETRÔNICO</b></h4>
                    <br> 
                    <form method="post" 
                          action="{{route('equipamento.store')}}" 
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-6">              
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" 
                                       class="form-control" 
                                       required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="potencia"> Potência </label>
                                <input type="text" name="potencia"                               
                                       class="form-control">
                            </div>
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantidade">Quantidade</label>
                                <input type="number" name="quantidade" 
                                       class="form-control" 
                                       required>
                            </div>    
                        </div>                 
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempo"> Tempo </label>
                                <input type="text" name="tempo"                               
                                       class="form-control">
                            </div>
                        </div> 

                        <div class="col-md-12">                   
                            <button type="reset" class="btn btn-default">
                                Limpar
                            </button>
                            <button type="submit" 
                                    class="btn btn-warning" id="black">
                                Cadastrar
                            </button>
                        </div>
                    </form>             
                </div>
            </div>
        </div>
    </body>
</html>