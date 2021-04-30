<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CSI Chatbot</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--Get your own code at fontawesome.com-->
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <!-- Custom CSS -->
        <link href="chatbotStyle.css" rel="stylesheet">
    </head>
    <body style="background-color: skyblue">
        <!-- <button class="btn far fa-comments b1 " 
        onclick="document.getElementById('chat').style.display='block'">
        </button> -->
        <div class="popup" id="chat">
            <!-- <button class="btn b2 " onclick="document.getElementById('chat').style.display='none'">Close</button> -->
            <div class="title">
                <h3>Connect with your Mentor</h3>
            </div>
            <div class="form">
                <div class="bot-inbox">
                    <div class="bot-pic">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="msg">
                        <p>Hello there, how can I help you?</p>
                    </div>
                </div>
            </div>
            <div class="text-area">
                <div class="input-data">
                    <form>
                    <input id="data" type="text" name="txt" placeholder="Type something here..." required>
                    <button id="btn" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    
    <script>
        document.addEventListener('invalid', (function () {
            return function (e) {
                e.preventDefault();
                document.getElementById("txt").focus();
            };
        })(), true);

        $(document).ready(function(){
            $("#btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox"><div class="msg"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                $.ajax({
                    url: 'chatbotmsg.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $reply = '<div class="bot-inbox"><div class="bot-pic"><i class="fas fa-user"></i></div><div class="msg"><p>'+ result +'</p></div></div>';
                        $(".form").append($reply);
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>

    </body>
</html>
