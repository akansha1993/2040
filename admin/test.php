<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                var x = $("form").serializeArray();
                $.each(x, function(i, field){
                    $("#results").append(field.name + ":" + field.value + " ");
                });
            });
        });
    </script>
</head>
<body>

<form action="">
    First name: <input type="text" name="FirstName" value="Mickey"><br>
    Last name: <input type="text" name="LastName" value="Mouse"><br>

    <input type="radio" name="gender" value="male">
    <label for="gender">Male</label>
    <input type="radio" name="gender" value="female">
    <label for="gender">Female</label><br>
    Date: <input type="date" name="date"/>
</form>

<button>Serialize form values</button>

<div id="results"></div>

</body>
</html>

