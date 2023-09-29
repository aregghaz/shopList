@if(Auth::check())

    <!-- live-chat start here-->
    @if(Auth::User()->role == 'user' || Auth::User()->role == 'client')

    <div class="chat">
        <div class="row">
            <div class="col-sm-3 chat-col-wrap" id="app">
                <div class="panel-heading chatHead">@lang('home.youHaveQuestions')</div>
                <div class="panel panel-default chatApp">
                    <chat-messages :user="{{ Auth::user() }}"></chat-messages>
                    <div class="text-center">
                        <button class="btn">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>  <!-- end chat -->
    <!-- live-chat end here-->
    <script src="/js/app.js"></script>

        <style>
            .chatApp{
                margin-bottom: 0;
                padding: 15px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }

            .chatApp button{
                margin-top: 15px;
                padding: 10px;
                width: 200px;
                background: #2D8EEA;
                border-radius: 20px;
                color: #fff;
            }
            .contacts-list {
                display: none!important;
            }
            .text{
                padding: 10px;
                display: inline-block;
                border-radius: 15px;
            }
            .message {
                display: table;
                width: 100%;
                max-width: 80%;
                margin-top: 10px;
                margin-bottom: 10px;
                line-height: 1;
            }

            .received .text{
                background: #f8f8f8;
                border-top-left-radius: 0;
            }

            .sent{
                margin-right: 15px;
                float: right;
                text-align: right;
            }

            .sent .text{
                background: #2D8EEA;
                color: #fff;
                border-top-right-radius: 0;
            }

            /*.composser{
                margin-left: -15px;
                margin-right: -15px;
            }*/

            .composser textarea{
                width: 100%;
                height: 80px;
                overflow-y: auto;
                padding: 15px;
                margin-top: 15px;
                resize: none;
                border: 1px solid #E5E5E5;
                border-radius: 10px;
                outline: none;
            }
            .conversation .feed{
                overflow-y: auto;
                height: 220px;
            }
        </style>
        <script>
            $(document).ready(function () {
                setTimeout(function(){    $('#selectedDiv').trigger('click')
                    $('#selectedDiv').click();
                }, 5000);
            })
        </script>
    @endif
@endif