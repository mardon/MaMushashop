<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Potvrzení objednávky</title>
</head>
<body>
<h1>Nová objednávka</h1>
<p>Dobrý den,<p></p>
<p>uživatel {{ $customer['firstname'] }} {{ $customer['lastname'] }} provedl v našem e-shopu objednávku.</p>
<p>Objednávka obsahuje</p>
@foreach($data as $row)
    {{ $row['product'] }} množství {{ $row['qty'] }} cena {{ $row['total'] }}. <br>
@endforeach
Děkujeme za objednávku
</body>
</html>