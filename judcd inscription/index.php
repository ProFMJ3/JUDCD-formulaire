<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JUDCD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <style>
        .content {
            align-items: center;
            background-color: #4cae4c;
            border-radius: 15px;
            padding: 20px;
            gap: 10px;
            
        }



        .image-content{
            background-color: red;
            width: 60% ;
            height: 108vh;
            align-content: center;
            justify-content: center;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .image-content img {

            border-radius: 15px;


        }

        .form-content {
            display:flex;
            justify-content: center;
            width: 70%;
            height: 80vh;
            flex-direction: column;
            background-color: blue;
            border-radius: 10px;
            align-content: center;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);



        }


        .form-content input{
            border-radius: 10px;
            margin-bottom: 20px;
            width: 100%;
            height: 20%;


        }

        .form-content input::placeholder{
            font-family: "Arial Black";
        }
        .form-content button{
            color: green;
        }

        @media (max-width: 768px) {
            .image-content, .form-content {
                width: 100%;
            }
        }

        h2{
            color: white;
        }
    </style>
</head>
<body>
    <div class="d-flex content ">
        <div class="image-content">
            <img class="w-100 h-75" src="judcd.jpg" alt="icon">
        </div>

        <div class="form-content">
            <h2 class="fw-bold mb-5 ">Inscription</h2>
            <form id="uploadForm"  action="" method="POST" enctype="multipart/form-data">

                    <div><input class="form-control" type="text" id="nom" name="nom" placeholder="First Name"></div>
                    <div><input class="form-control" type="text" id="prenom" name="prenom" placeholder="Last Name"></div>
                    <div><input class="form-control" type="email" id="email" name="email" placeholder="Email"></div>
                    <div class="d-flex" >
                        <input  type="radio" id="sexeM" name="sexe" value="M"> Masculin
                        <input  type="radio" id="sexeF" name="sexe" value="F"> Féminin
                    </div>
                    <div><input class="form-control"  type="date" id="naissance" name="naissance" placeholder="Date Naissance"></div>
                    <div><input class="form-control" type="tel" id="telephone" name="telephone" placeholder="Telephone"></div>
                    <div><input class="form-control" type="text" id="profession" name="profession" placeholder="Profession"></div>
                    <div>
                        <input class="form-control" type="file" id="photo" name="photo" placeholder="Photo d'identité" accept="image/*" required>
                    </div>
                    <div><input class="form-control btn btn-success" type="submit" value="Soumettre"></div>

            </form>
        </div>
    </div>
    <script>
        document.getElementById('photo').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const img = new Image();
                img.src = URL.createObjectURL(file);
                img.onload = function() {
                    const width = img.naturalWidth;
                    const height = img.naturalHeight;
                    URL.revokeObjectURL(img.src);

                    if (width !== 600 || height !== 600) {
                        alert('Veuillez télécharger une image au format de passeport (600x600 pixels).');
                        document.getElementById('photo').value = ''; // Reset the file input
                    }
                };
            }
        });
    </script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
