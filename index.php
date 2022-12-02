<?php


$pwlength = $_GET['pw_length'] ?? '';
$charrepeat = $_GET['same_chars'] ?? '';
$charincludes = $_GET['characters'] ?? '';

var_dump($pwlength);
var_dump($charrepeat);
var_dump($charincludes);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous' />

    <link rel="stylesheet" href="style.css">
    <title>PW Generator</title>
</head>

<body>
    <h1 class="py-5">STRONG PASSWORD GENERATOR</h1>
    <div class="container cp-container">
        <div class="row d-flex flex-column justify-content-center">
            <form action="./index.php" method="GET">

                <div class="col">

                    <label for="basic-url" class="form-label">Inserisci lunghezza caratteri della password generata.</label>
                    <div class="input-group mb-3 w-50 m-auto">
                        <input type="number" class="form-control text-center" id="basic-url" aria-describedby="basic-addon3" name="pw_length">
                    </div>
                </div>

                <div class="col d-flex justify-content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="same_chars" id="flexRadioDefault1" value="0" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Caratteri uguali ammessi
                        </label>
                    </div>
                    <div class="form-check mx-4">
                        <input class="form-check-input" type="radio" name="same_chars" id="flexRadioDefault2" value="1">
                        <label class="form-check-label" for="flexRadioDefault2">
                            NO caratteri uguali
                        </label>
                    </div>
                </div>

                <div class="col d-flex my-3 flex-column">
                    <p>Includi:</p>
                    <div class="checkbox-form d-flex">
                        <input type="checkbox" id="numbers" value="numbers" name="characters[]" checked>
                        <label for="numbers" class="mx-3">Numeri</label>
                    </div>

                    <div class="checkbox-form d-flex">
                        <input type="checkbox" id="letters" value="letters" name="characters[]" checked>
                        <label for="numbers" class="mx-3">Lettere</label>
                    </div>

                    <div class="checkbox-form d-flex">
                        <input type="checkbox" id="specialchars" value="specialchars" name="characters[]" checked>
                        <label for="numbers" class="mx-3">Caratteri speciali</label>
                    </div>

                </div>

                <div class="col d-flex justify-content-center py-3">
                    <button class="btn btn-info" type="submit">GENERA</button>
                </div>

            </form>
        </div>
    </div>
    </div>
</body>

</html>