<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   </head>
   <body>
      <div class="hero_area">

         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->




      <!-- product section -->
      @include('home.product_view')
      <!-- end product section -->

      {{-- comment and replay starts --}}

        <div style="text-align: center; padding-bootom: 30px; ">
            <h1 style="font-size: 30px; text-align:center; padding-top: 20px; padding-bottom: 20px; ">Comments</h1>

            <form action="{{ url('add_comment') }}" method="POST">
                @csrf
                <textarea style="height: 150px; width: 600px;"  id=""  placeholder="comment something here" name="comment"></textarea>
                <br>

                <input type="submit" class="btn btn-dark" value="comment">
            </form>
        </div><br>

        <div style="padding-left: 20%;">
            <h1 style="font-size: 20px; padding-bottom: 20px; ">All Coments</h1>

            @foreach($comment as $comment)

                <div>
                    <p>{{ $comment->name }}</p>
                    <p>{{ $comment->comment }}</p>

                    <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Replay</a>

                    @foreach($reply as $rep)

                    @if($rep->comment_id==$comment->id)

                        <div style="padding-left: 3%; padding-bottom: 10px;">
                            <p>{{ $rep->name }}</p>
                            <p>{{ $rep->reply }}</p>
                            <a style="color: blue;" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Replay</a>
                        </div>
                    @else

                    @endif

                    @endforeach

                </div>

            @endforeach

            <div style="display: none;" class="replyDiv">
                <form action="{{ url('add_reply') }}" method="POST">
                    @csrf
                    <input type="text" id="commentId" name="commentId" hidden="">
                    <textarea style="height: 100px; width: 500px;" name="reply" placeholder="write something here" name="" id=""></textarea><br>

                    <button type="submit" style="background-color: black;" class="btn btn-dark">Reply</button>

                    <a href="javascript::void(0);" class="btn" onclick="reply_close(this)">Close</a>
                </form>
            </div>
        </div><br>



      {{-- end of comment and replay --}}


      <div class="cpy_">
         <p class="mx-auto">&copy; {{ date('Y') }} All Rights Reserved By <span style="color: red"> Andrei C.</span><br></p>
      </div>

      <script>


        function reply(caller)
        {
            document.getElementById('commentId').value=$(caller).attr('data-Commentid');

            $('.replyDiv').insertAfter($(caller));

            $('.replyDiv').show();
        }

        function reply_close(caller)
        {


            $('.replyDiv').hide();
        }

      </script>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

      <!-- jQery -->
      <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset('home/js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('home/js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script src="{{ asset('home/js/custom.js') }}"></script>
   </body>
</html>
