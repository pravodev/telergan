<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="Chat__container" id="app">
        <div class="Chat">
            <div class="Chat__pane Chat__pane--left">
                <div class="Menu__ellipsis">
                    <i class="fas fa-bars"></i>
                </div>
                <h1>Telergan</h1>
                <div class="Pane__item">
                    <div class="Item Item__content">
                        <ul>
                            <li>All Messages <span class="Item__count">21</span></li>
                            <li>Unread <span class="Item__count">89</span></li>
                            <li>Drafts <span class="Item__count">27</span></li>
                        </ul>
                    </div>
                    <div class="Item Item__content">
                        <ul>
                            <li>Media <span class="Item__count">121</span></li>
                        </ul>
                    </div>
                    <div class="Item Item__content">
                        <ul>
                            <li>Help</li>
                            <li>About</li>
                            <li>Settings</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="Chat__inbox">
                <div class="SearchBox">
                    <input type="text" placeholder="Search" class="SearchBox__input">
                </div>
                <div class="Chat__list">
                    <div class="Message">
                        <div class="Message__photos">
                            <img src="{{ asset('images/user.jpg') }}"/>
                        </div>
                        <div class="Message__body">
                            <div class="Body__name">Matt Thompson</div>
                            <div class="Body__text">Lorem ipsum dolor sit amet,  maiores dumer sit koret</div>
                        </div>
                    </div>
                    <div class="Message Message--active">
                        <div class="Message__photos">
                            <img src="{{ asset('images/user.jpg') }}"/>
                        </div>
                        <div class="Message__body">
                            <div class="Body__name">Matt Thompson</div>
                            <div class="Body__text">Lorem ipsum dolor sit amet,  maiores dumer sit koret</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Chat__box">
                <div class="Chat__box--header">

                </div>
                <div class="Chat__box--body" v-chat-scroll>
                    <textmessage
                        v-for="value,index in chat.message"
                        :key=value.index
                        :type=chat.type[index]
                        :user=chat.user[index]
                    >
                        @{{ value }}
                    </textmessage>
                    <span class="on-typing" v-if="typing !== ''">@{{ typing }}</span>
                </div>
                <div class="Chat__box--footer">
                    <div class="Message__input">
                        <input v-model="message" @keyup.enter='send' type="text" class="input-msg" placeholder="Type Your Message.." name="" id="">
                    </div>
                    <div class="Message__button">
                        <button class="button-msg"><i class="fas fa-comment"></i></button>
                    </div>
                </div>
            </div>
            <div class="Chat__pane Chat__pane--right">
                <div class="User__detail">

                </div>
                <div class="User__online">

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
