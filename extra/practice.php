<!DOCTYPE html>
<html lang="en">
    <head>
        <title>View_Papers</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type='text/css' rel='stylesheet' href='../css1/bootstrap.min.css'>
        <link type='text/css' rel='stylesheet' href='../css1/bootstrap.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </head>
    <body>



        <div class='col-md-12' style='background:black;'> 
            <a href="welcome.php" class="btn btn-link" ><i class="fa fa-arrow-left" aria-hidden="true"'></i>Profile</a>
            <select name="year" class="form-control" id="year" onchange="extract_paper()">
                <option value="">Select Academic Year</option>
                <option value="2015-2016">2015-16</option>
                <option value="2016-2017">2016-17</option>
                <option value="2017-2018">2017-18</option>
                <option value="2018-2019">2018-19</option>
                <option value="2019-2020">2019-20</option>
            </select>

        </div>

        <div class='row' id='paper'>

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
    </body>
</html>