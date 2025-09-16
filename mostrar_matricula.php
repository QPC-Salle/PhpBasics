<?php
session_start();
if (!isset($_SESSION['form_data'])) {
    echo "<p>No hi ha dades de matrícula disponibles. Si us plau, ompliu el formulari de matrícula primer.</p>";
    exit();
}
$form_data = $_SESSION['form_data'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Matricula</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Dades de la Matrícula</h1>
    <table>
        <tr>
            <th colspan="2">Dades Alumne</th>
        </tr>
        <tr>
            <td>Nom</td>
            <td><?php echo htmlspecialchars($form_data['nom']); ?></td>
        </tr>
        <tr>
            <td>Cognoms</td>
            <td><?php echo htmlspecialchars($form_data['cognoms']); ?></td>
        </tr>
        <tr>
            <td>Edat</td>
            <td><?php echo htmlspecialchars($form_data['edat']); ?></td>
        </tr>
        <tr>
            <td>Sexe</td>
            <td><?php echo htmlspecialchars($form_data['sexe']); ?></td>
        </tr>
        <tr>
            <td>Telefon</td>
            <td><?php echo htmlspecialchars($form_data['telefon']); ?></td>
        </tr>
        <tr>
            <td>DNI</td>
            <td><?php echo htmlspecialchars($form_data['dni']); ?></td>
        </tr>
        <?php if ($form_data['edat'] < 18): ?>
            <tr>
                <th colspan="2">Dades Tutor Legal</th>
            </tr>
            <tr>
                <td>Nom Tutor</td>
                <td><?php echo htmlspecialchars($form_data['nomtutor']); ?></td>
            </tr>
            <tr>
                <td>Cognoms Tutor</td>
                <td><?php echo htmlspecialchars($form_data['cognomstutor']); ?></td>
            </tr>
            <tr>
                <td>Telefon Tutor</td>
                <td><?php echo htmlspecialchars($form_data['telefontutor']); ?></td>
            </tr>
            <tr>
                <td>DNI Tutor</td>
                <td><?php echo htmlspecialchars($form_data['dnitutor']); ?></td>
            </tr>
        <?php endif; ?>
        <tr>
            <th colspan="3">Dades Curs</th>
        </tr>
        <tr>
            <td>Curs</td>
            <td><?php
            $grau = $form_data['grau'] == 'FPGM' ? 'Grau Mitjà' : 'Grau Superior';
            echo htmlspecialchars($grau . ' - ' . $form_data['curs']);
            ?></td>
        </tr>
        <TR>
            <td colspan="3"><a href="matricula.php">Tornar al formulari de matrícula</a></td>
        </TR>
    </table>

</html>