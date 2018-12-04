<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema CCEE</title>

    <!-- Favicon -->
    <link href="{{URL::asset('img/favicon.ico')}}" rel="shortcut icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" /> 
    <link href="{{URL::asset('css/lightbox.css')}}" rel="stylesheet" type="text/css" /> 

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{URL::asset('js/ajax.js')}}"></script>
    <script src="{{URL::asset('js/lightbox.js')}}"></script>
    <script src="{{URL::asset('js/calculo.js')}}"></script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">       
        <div class="navbar-header">
            <a class="navbar-brand" href="{{url('/')}}" 
            title="Página Inicial" style="margin-top: -3px">
            <img src="{{URL::asset('img/logo.png')}}"></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>               
        </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right" id="link-white">
            <li class="dropdown">
                <a href="#" style="text-decoration: none">
                    <img src="{{URL::asset('img/samuell.jpg')}}" 
                    class="img-circle" width="26" height="26" 
                    style="margin-top: -3px"> 
                    <span id="underline">Samuell Henrique Magalhães</span> 
                </a>                      
            </li>
            <li><a href="/" 
             style="text-decoration: none">
             <span class="glyphicon glyphicon-log-in"></span> 
             <span id="underline">Sair</span></a></li>  
             <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
        </ul>
    </div>       
 </nav> 
 
 <div class="row">
                    <div class="col-md-12" id="center"> 
                        <h1><b>Produtos</b></h1>
                        <br>
                    </div>
                </div>

<div class="container">
    <div class="row">

        <div class="col-md-12" id="center"> 
            <h1><b>Sistema de Controle de Consumo de Energia Elétrica</b></h1>
            <br>
        </div>

        <a href="{{route('equipamento.create')}}" class="btn btn-default btn-sm pull-right">
            <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
            
    </div>           

    <div class="col-md-12">   
            <br />
            <h4 id="center"><b>EQUIPAMENTOS ELETRO-ELETRÔNICOS ({{$total}})</b></h4>
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th id="center">ID</th>
                            <th id="center">Nome</th>
                            <th id="center">Potência (W)</th>
                            <th id="center">Quantidade</th>
                            <th id="center">Tempo de uso (horas/dia)</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($equipamentos as $equipamento)
                        <tr>
                            <td title="ID" id="center">{{$equipamento->id}}</td>
                            <td title="Nome" id="center">{{$equipamento->nome}}</td>
                            <td title="Potência (W)" id="center">{{number_format($equipamento->potencia, 2,',','.')}}</td>
                            <td title="Quantidade" id="center">{{$equipamento->quantidade}}</td>
                            <td title="Tempo de uso (horas/dia)" id="center">{{number_format($equipamento->tempo, 2,',','.')}}</td> 
                            <td id="center">
                                <a href="{{route('equipamento.edit', $equipamento->id)}}" data-toggle="tooltip" data-placement="top" title="Alterar"><i class="fa fa-pencil"></i></a>
                                &nbsp;<form style="display: inline-block;" method="POST" action="{{route('equipamento.destroy', $equipamento->id)}}" data-toggle="tooltip" data-placement="top" title="Excluir" onsubmit="return confirm('Confirma exclusão?')">
                                    {{method_field('DELETE')}}{{ csrf_field() }}                                                
                                    <button type="submit" style="background-color: #fff">
                                        <a><i class="fa fa-trash-o"></i></a>
                                    </button></form>
                            </td>               
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th id="center">Consumo diário (kWh)</th>
                    <th id="center">Consumo mensal (kWh)</th>
                    <th id="center">Consumo anual (kWh)</th>                                        
                </tr>
            </thead>
            <tbody>
                <tr>
                <td title="Consumo diário (kWh)" id="center">{{$cDia}}</td>
                <td title="Consumo mensal (kWh)" id="center">{{$cMes}}</td>
                <td title="Consumo anual (kWh)" id="center">{{$cAno}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th id="center">Gasto diário</th>
                    <th id="center">Gasto mensal</th>
                    <th id="center">Gasto anual</th>                                        
                </tr>
            </thead>
            <tbody>
                <tr>
                <td title="Gasto diário" id="center">R$ {{number_format($gDia, 2,',','.')}}</td>
                <td title="Gasto mensal" id="center">R$ {{number_format($gMes, 2,',','.')}}</td>
                <td title="Gasto anual" id="center">R$ {{number_format($gAno, 2,',','.')}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <img src="{{URL::asset('img/subir.png')}}" id="up" style="display: none;" alt="Ícone Subir ao Topo" title="Subir ao topo?">
</body>
</html>