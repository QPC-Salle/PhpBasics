<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Formulari Matricula</h1>
    <form action="matricula.php" method="post">
        <div>
            <h2>Entra Dades Alumne</h2> <!--Entra dades alumne-->
            <label for="">Nom</label>
            <input type="text" name="nom" placeholder="Nom" required>
            <br>
            <label for="">Cognoms</label>
            <input type="text" name="cognoms" placeholder="Cognoms" required>
            <br>
            <label for="">Edat</label>
            <input type="number" name="edat" placeholder="Edat" required>
            <br>
            <label for="">Sexe</label>
            <input type="radio" name="sexe" value="Home" required>Home
            <input type="radio" name="sexe" value="Dona" required>Dona
            <input type="radio" name="sexe" value="Altres" required>Altres
            <br>
            <label for="">Telefon</label>
            <input type="tel" name="telefon" placeholder="Telefon" required>
            <br>
            <label for="">DNI</label>
            <input type="text" name="dni" placeholder="DNI" pattern="[0-9]{8}[A-Za-z]{1}"
                title="El DNI ha de tenir 8 números seguits d'una lletra" required>

        </div>
        <div>
            <h2>Entra Dades Tutor Legal</h2>
            <!-- Entra dades Tutor legal-->
            <label for="">Nom Tutor</label>
            <input type="text" name="nomtutor" placeholder="Nom Tutor" required <?php if (isset($_POST['edat']) && $_POST['edat'] >= 18)
                echo "disabled"; ?>>
            <br>
            <label for="">Cognoms Tutor</label>
            <input type="text" name="cognomstutor" placeholder="Cognoms Tutor" required <?php if (isset($_POST['edat']) && $_POST['edat'] >= 18)
                echo "disabled"; ?>>
            <br>
            <label for="">Telefon Tutor</label>
            <input type="tel" name="telefontutor" placeholder="Telefon Tutor" required <?php if (isset($_POST['edat']) && $_POST['edat'] >= 18)
                echo "disabled"; ?>>
            <br>
            <label for="">DNI</label>
            <input type="text" name="dnitutor" placeholder="DNI Tutor" pattern="[0-9]{8}[A-Za-z]{1}"
                title="El DNI ha de tenir 8 números seguits d'una lletra" required <?php if (isset($_POST['edat']) && $_POST['edat'] >= 18)
                    echo "disabled"; ?>>
            <br>
        </div>
        <div>
            <h2>Entra Dades Curs</h2>
            <!--Emtra dades Curs-->
            <label for="">Curs</label>
            <select name="grau" required>
                <option value="FPGM">Grau Mitja</option>
                <option value="FPGS">Grau Superior</option>
            </select>
            <select name="curs" required>
                <option value="1r">1r</option>
                <option value="2n">2n</option>
            </select>
            <input type="submit" value="Matricular">
        </div>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Store all form data in session and redirect to another page
        session_start();
        $_SESSION['form_data'] = $_POST;
        header("Location: mostrar_matricula.php");
        exit();
    }
    ?>








</body>

</html>