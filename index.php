<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <title>BTW Berekenen.</title>
    <meta name="author" content="MJoy">
    <meta name="description" content="Bereken eenvoudig en snel de BTW over een bedrag.">
    <meta name="robots" content="NOODP">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="http://www.mvesign.com/content/images/favicon.ico" type="image/x-icon">
    <link rel="canonical" href="http://btw.mvesign.com">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="view.min.css">
</head>
<body>
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <table class="calculate table">
                <tr>
                    <td class="col-3 form-group">
                        <label for="calculate-exclusive">Excl. BTW</label>
                        <div class="form-control readonly" id="calculate-exclusive" placeholder="Excl. BTW"></div>
                    </td>
                    <td class="col-3 form-group" colspan="2">
                        <label for="calculate-exclusive">Bedrag</label>
                        <input class="form-control" id="calculate-value" name="calculate-value" step="0.01" type="number" autofocus>
                    </td>
                    <td class="col-3 form-group">
                        <label for="calculate-inclusive">Incl. BTW</label>
                        <div class="form-control readonly" id="calculate-inclusive" placeholder="Incl. BTW"></div>
                    </td>
                </tr>
            </table>
            <table class="calculate table">
                <tr>
                    <td id="calculate-percentage-6" class="calculate-percentage">
                        <input class="calculate-percentage-6 hidden" name="calculate-percentage" type="radio" value="6"> 6%
                    </td>
                    <td id="calculate-percentage-21" class="calculate-percentage selected">
                        <input class="calculate-percentage-21 hidden" name="calculate-percentage" type="radio" value="21" checked> 21%
                    </td>
                </tr>
                <tr>
                    <td class="calculate-percentage-description" colspan="2">
                        <span class="calculate-percentage-6 hidden">
                            Het verlaagde tarief is 6 procent. Deze geldt voor de volgende goederen: voedingsmiddelen, water, agrarische goederen, geneesmiddelen, hulpmiddelen, kunst, verzamelvoorwerpen, antiek, boeken, gas en minerale olie voor de tuinbouw. Dit tarief geldt ook voor de volgende diensten: fietsen repareren, schoeisel repareren, lederwaren repareren, kleding repareren, huishoudlinnen repareren, diensten van kappers, werkzaamheden aan woningen, cultuur, cultuur, recreatie, personenvervoer, sport, diensten aan agrariërs.
                        </span>
                        <span class="calculate-percentage-21">
                            Het algemene tarief is 21 procent. Deze is op de meeste goederen en diensten van toepassing. Als producten hier niet onder vallen, horen ze bij de 6% of het nultarief.
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#calculate-value').keyup(function() {
                calculatePrice();
            });

            $('#calculate-percentage-6').click(function (){
                if (!$(this).hasClass('selected')) {
                    switchPercentage('calculate-percentage-21', 'calculate-percentage-6');
                }
            });

            $('#calculate-percentage-21').click(function (){
                if (!$(this).hasClass('selected')) {
                    switchPercentage('calculate-percentage-6', 'calculate-percentage-21');
                }
            });

            function calculatePrice() {
                var value = $.trim($('#calculate-value').val());
                if (value) {
                    var percentage = parseInt($('input[name=calculate-percentage]:checked').val());
                    
                    $("#calculate-exclusive").html('&euro; ' + ((value / (100 + percentage)) * 100).toFixed(2));
                    $("#calculate-inclusive").html('&euro; ' + (value * (1 + (percentage / 100))).toFixed(2));
                }
                else {
                    $("#calculate-exclusive").html('');
                    $("#calculate-inclusive").html('');
                }
            }

            function switchPercentage(selected, previous) {
                $('#' + selected).removeClass('selected');
                $('#' + previous).addClass('selected');

                $('span.' + selected).addClass('hidden');
                $('span.' + previous).removeClass('hidden');
                
                $('input.' + selected).prop('checked', false);
                $('input.' + previous).prop('checked', true);

                calculatePrice();
            }
        });
    </script>
</body>
</html>