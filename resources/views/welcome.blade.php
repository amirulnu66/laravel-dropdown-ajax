<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
        </style>
    </head>
    <body>

            <div class="contianer">

                <div class="col-md-4 form-group">
                  <label for="sel1">Select Countru:</label>
                  <select class="form-control" name="country_name" id="counrty">
                    <option>Select one</option>
                    @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                    @endforeach

                  </select>
                </div>
                 <div class="col-md-4 form-group">
                  <label for="sel1">Select State:</label>
                  <select class="form-control" name="name" id="state">
                    <option value="">STATE</option>
                  </select>
                </div>
            </div>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>



        <script type="text/javascript">
            $(document).ready(function() {
                
                $('#counrty').on('change', function() {

                 var country_id = $(this).val();

                 if(country_id){
                    //ajex get request
                $.ajax({
                    url: '/getStates/'+country_id,
                    type: 'GET',
                    dataType: 'json',

                    success: function(data){
                        $('select[name="name"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="name"]').append('<option value="'+key+'">'+value+'<option>')
                        });
                    }

                   });
                 }else{

                     $('select[name="name"]').empty();
                 }

                });


            });
        </script>

    </body>
</html>
