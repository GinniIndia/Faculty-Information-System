<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css1/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css1/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css1/style.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel='stylesheet' href="css1/sidebarcss.css" rel="stylesheet" type='text/css' >
    </head>

    <body>


        <div class='col-md-12 col-xs-12 col-sm-12' style='background:black;color:white'>

            <div class='col-md-4'> <a href="welcome.php" class="btn btn-link" style="text-decoration:none;color:white;"><i class="fa fa-arrow-left" aria-hidden="true" style='color:white;'></i>Profile</a></div>


            <div class='col-md-8'>
                <select name="year" class=" form-control" id="year" onchange="extract_paper()">
                    <option value="">Select Academic Year</option>
                    <option value="2015-2016">2015-16</option>
                    <option value="2016-2017">2016-17</option>
                    <option value="2017-2018">2017-18</option>
                    <option value="2018-2019">2018-19</option>
                    <option value="2019-2020">2019-20</option>

                </select>
            </div>
        </div>

        <div class='row' id='paper'>

        </div>
    </div>

    <script>
        function extract_paper() {
            var year = document.getElementById('year').value;
            year = year.split('-');
            $.post("view_papers_year.php",
                    {
                        year1: year[0],
                        year2: year[1]
                    },
            function (data, status) {
                $("#paper").load("view_papers.php");
            }
            );
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>
</html>