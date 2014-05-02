<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Sample PHP - Colors</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/vendor/jquery-2.1.0.js"></script>
    <script src="js/vendor/jquery-humanize-number.js"></script>
    <script src="js/vendor/underscore.js"></script>
    <script src="js/vendor/backbone.js"></script>
    <script src="js/app.js"></script>
    <script src="js/models/color.js"></script>
    <script src="js/models/vote.js"></script>
</head>
<body>
    <div class="panel">
        <h1>Colors</h1>

        <table class="table" id="color_table">
            <thead>
                <tr>
                    <td>Color</td>
                    <td>Votes</td>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <tr>
                    <td>TOTAL</td>
                    <td><span id="vote_total">1000</span></td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>