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
                  <select class="form-control countryName" name="country_name" id="counrty">
                    <option>Select one</option>
                    @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                    @endforeach

                  </select>
                </div>
                 <div class="col-md-4 form-group">
                  <label for="sel1">Select State:</label>
                  <select class="form-control name" name="name" id="state">
                     <option value="" disabled selected>Choose an option</option>
                  </select>
                </div>

                <div class="col-md-4 form-group">
                  <label for="sel1">Village </label>
                  <select class="form-control"  name="name" id="state">
                    <option value="">STATE</option>
                  </select>
                </div>
            </div>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>



        <script type="text/javascript">
            $(document).ready(function() {
                $(document).on('change', '.countryName', function(){

                  var cat_id = $(this).val();

                  var div = $(this).parent();
                  var op="";

                  $.ajax({
                    type:'get',
                    url: "{{URL::to('/findStateName')}}",
                    data: {'id': cat_id},
                    datatype: 'json',

                    success:function(data) {
                      // console.log('success');
                      if(data){
                      // console.log(data);
                      // console.log(data.length);

                     op+='<option value="0" selected>--- Select Level ---</option>';

                       for(var i=0;i<data.length;i++){
                        // console.log(data[i].name);
                        op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                      }

                      // set value to the state name
                     $('.name').html("");
                     $('.name').append(op);
                      }else{
                        alert(data);
                      }


                    },

                    error:function(){

                    }

                  });
                });
               
            });
        </script>

    </body>
</html>
