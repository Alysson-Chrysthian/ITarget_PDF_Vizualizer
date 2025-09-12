<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #333;
            line-height: 1.5;
            margin: 20px;
        }

        #document {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        #document > div {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0,0,0,25);
        }

        #document > div > div {
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1 1 45%;
        }

        #document > div:last-child > div {
            flex: 1 1 100%;
        }

        p strong {
            display: inline-block;
            width: 160px;
            color: #555;
        }

        p {
            margin: 2px 0;
        }

        h1 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
            color: #222;
        }
    </style>
</head>
<body>
    <h1>Detalhes do Documento</h1>
    <div id="document">
        <div>
            <div>
                <p><strong>Cod. do documento:</strong> {{ $document->document_id }}</p>
                <p><strong>Cod. do processo:</strong> {{ $document->process_id }}</p>
                <p><strong>Cod. do empenho:</strong> {{ $document->commit_id }}</p>
                <p><strong>Caixa do documento:</strong> {{ $document->document_box }}</p>
            </div>
            <div>
                <p><strong>Data do documento:</strong> {{ $document->document_date }}</p>
                <p><strong>Data da digitalização:</strong> {{ $document->digitalization_date }}</p>
                <p><strong>Data do pagamento:</strong> {{ $document->payment_date }}</p>
            </div>
        </div>
        <div>
            <div>
                <p><strong>Ano fiscal:</strong> {{ $document->financial_year }}</p>
                <p><strong>Mês de referência:</strong> {{ $document->reference_month }}</p>
                <p><strong>Valor do pagamento:</strong> {{ $document->payment_billing }}</p>
            </div>
            <div>
                <p><strong>Tipo de operação:</strong> {{ $document->operation_type_name }}</p>
                <p><strong>Orgão responsável:</strong> {{ $document->instituition->name }}</p>
                <p><strong>Credor responsável:</strong> {{ $document->creditor->name }}</p>
            </div>
        </div>
        <div>
            <div>
                <p><strong>Descrição:</strong> {{ $document->description }}</p>
            </div>
        </div>
        <div>
            <div>
                <p><strong>Criado em:</strong> {{ $document->created_at }}</p>
                <p><strong>Atualizado em:</strong> {{ $document->updated_at }}</p>
            </div>
        </div>
    </div>
</body>
</html>
