@extends('layouts.app')

@section('title', 'Contrato de locação')

@section('content')
    <div class="container">
        <div class="page-header">
            <h2>Contrato de locação</h2>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="well">
                <h3 class="text-center"><b>CONTRATO DE LOCAÇÃO DE AUTOMÓVEL DE PRAZO DETERMINADO</b></h3>

                <span>
                <p>
                    LOCADORA: (Nome da Locadora), com sede em (xxx), na Rua (xxx), no (xxx), bairro (xxx), Cep (xxx), no Estado (xxx), inscrita no C.N.P.J. sob o no
                    (xxx), e no Cadastro Estadual sob o no (xxx), neste ato representada pelo seu diretor (xxx), (Nacionalidade), (Estado Civil), (Profissão), Carteira de
                    Identidade no (xxx), C.P.F. no (xxx), residente e domiciliado na Rua (xxx), no (xxx), bairro (xxx), Cep (xxx), Cidade (xxx), no Estado (xxx);
                </p>
                    <p>
                        LOCATÁRIO: <b> {{ $solicitacao->cliente->nome }}</b>, Carteira de Identidade n° <b>{{ $solicitacao->cliente->rg }}</b>, C.P.F. n° <b>{{ $solicitacao->cliente->cpf }}</b>, portado da CNH de n° <b> {{ $solicitacao->cliente->cnh }} </b>,  residente e
                        domiciliado no endereço <b> {{ $solicitacao->cliente->endereco }} </b>, Cep <b>{{ $solicitacao->cliente->cep }}</b>, Cidade <b>{{ $solicitacao->cliente->cidade->nome }}</b>, no Estado <b>{{ $solicitacao->cliente->estado->nome }}</b>.
                    </p>

                    <br/>

                    <p>
                        <h4 class="text-center"><b>DO OBJETO DO CONTRATO</b></h4>

                        Cláusula 1a. O presente contrato tem como OBJETO a locação de 1  do automóvel modelo <b> {{ $solicitacao->veiculo->modelo }} </b>, ano <b> {{ $solicitacao->veiculo->ano }}</b>, cor <b> {{ $solicitacao->veiculo->cor }} </b>, placa <b> {{ $solicitacao->veiculo->placa }} </b>
                        (Descrever detalhadamente o veículo de que está tratando o contrato), de propriedade da LOCADORA.
                    </p>

                    <br/>

                    <p>
                        <h4 class="text-center"><b>DO USO</b></h4>

                        Cláusula 2a. O automóvel, objeto deste contrato, será utilizado exclusivamente pelo LOCATÁRIO, não sendo permitido o seu uso por terceiros sob
                        pena de rescisão contratual e o pagamento da multa prevista na Cláusula 7a.
                    </p>

                    <br/>

                    <p>
                        <h4 class="text-center"><b>DA DEVOLUÇÃO</b></h4>

                         Cláusula 3a. O LOCATÁRIO deverá devolver o automóvel à LOCADORA nas mesmas condições em que estava quando o recebeu, ou seja, em
                         perfeitas condições de uso, respondendo pelos danos ou prejuízos causados 2 .
                    </p>

                    <br/>

                    <p>
                        <h4 class="text-center"><b>DO PRAZO</b></h4>

                        Cláusula 4a. A presente locação terá o lapso temporal de validade de (xxx) dias, iniciando no dia <b>{{ date('d/m/Y', strtotime($solicitacao->data_locacao)) }}</b> e terminando no dia <b>{{ date('d/m/Y', strtotime($solicitacao->data_devolucao)) }}</b>, data na qual o
                        automóvel deverá ser devolvido.

                        Cláusula 5a. Se o LOCATÁRIO não restituir o automóvel na data estipulada, deverá pagar, enquanto detiver em seu poder, o aluguel que a
                        LOCADORA arbitrar, e responderá pelo dano, que o automóvel venha a sofrer mesmo se proveniente de caso fortuito 3 .
                    </p>

                    <br/>

                    <p>
                        <h4 class="text-center"><b>DA RESCISÃO</b></h4>

                        Cláusula 6a. É assegurado às partes a rescisão do presente contrato a qualquer momento, desde que haja comunicação à outra parte com
                        antecedência mínima de (xxx) dias.

                        Cláusula 7a. O descumprimento de qualquer das cláusulas por parte dos contratantes ensejará a rescisão deste instrumento e o devido pagamento
                        de multa, pela parte inadimplente no valor de R$ (xxx) (Valor expresso).
                    </p>

                    <br/>

                    <p>
                        <h4 class="text-center"><b>DO FORO</b></h4>

                        Cláusula 8a. Para dirimir quaisquer controvérsias oriundas do CONTRATO, as partes elegem o foro da comarca de (xxx);


                        Por estarem assim justos e contratados, firmam o presente instrumento, em duas vias de igual teor, juntamente com 2 (duas) testemunhas.


                        <p>(Local, data e ano).</p>


                        <p>(Nome e assinatura do Representante legal da Locadora)</p>

                        <p>(Nome e assinatura do Locatário)</p>

                        <p>(Nome, RG e assinatura da Testemunha 1)</p>

                        <p>(Nome, RG e assinatura da Testemunha 2)</p>

                        <p>________</p>
                        <p>Nota:</p>

                        <p>1. A Locação de Coisas rege­se pelo previsto nos Arts. 1188 a 1215, do Código Civil.</p>

                        <p>2. Art. 1192 do Código Civil.</p>

                        <p>3. Art. 1196 do Código Civil.</p>
                    </p>
                </span>
            </div>
        </div>
    </div>
@endsection