<!DOCTYPE html>
<html lang="pl">

<head>
   <link rel="stylesheet" href="/css/gallery.style.css">
   <link rel="stylesheet" href="/css/gallery.menu.css">
   <link rel="stylesheet" href="/css/lightbox.css">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>{{ $user->name }} :: Photolio</title>
   <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
   <script src="/js/lightbox.js"></script>
</head>

<body>

   <div class="container">

      <header>
         <div class="social-icons-container">

            @if(!empty($user->facebook))
               <a href="{{ $user->facebook }}" target="_blank">
                  <img class="social-icon" src="/img/facebook.png" alt="facebook icon">
               </a>
            @endif

            @if(!empty($user->instagram))
               <a href="{{ $user->instagram }}" target="_blank">
                  <img class="social-icon" src="/img/instagram.png" alt="instagram icon">
               </a>
            @endif

         </div>
         <label class="navigation-toggle" id="toggle" for="input-toggle">
            <span></span>
            <span></span>
            <span></span>
         </label>
         <input type="checkbox" id="input-toggle">
         <nav id="nav">
            <ul>
               <li class="menu-item">
                  <a href="/{{ $user->username }}" id="aboutMeLink">Galeria</a>
               </li>
               <li class="menu-item">
                  <a href="/{{ $user->username }}/o-mnie" id="portfolioLink">O mnie</a>
               </li>
               <li class="menu-item">
                  <a href="/{{ $user->username }}/kontakt" id="contactLink">Kontakt</a>
               </li>
               @if(Auth::check() && Auth::user()->id === $user->id)
                  <li class="menu-item">
                     <a href="/panel" class="admin" id="contactLink">Panel</a>
                  </li>
                  <li class="menu-item">
                     <a href="/logout" class="admin" id="contactLink">Wyloguj</a>
                  </li>
               @endif
            </ul>
         </nav>

         <div class="my-title">
            <h1>{{ $user->name }}</h1>
         </div>
         <div class="my-description">
            <p>
               {!! nl2br(e($user->welcome_note)) !!}... <a href="/{{ $user->username }}/o-mnie">więcej</a>
            </p>
         </div>

         <div class="albums">
            @foreach($albums as $album)
               @php
                  $currAlbum = $currentAlbum->id ?? '';
               @endphp
               @if($album->id == $currAlbum)
                  <a class="on" href="/{{ $user->username }}/album-{{ $album->id }}">{{ $album->album_name }}</a>
               @else
                  <a href="/{{ $user->username }}/album-{{ $album->id }}">{{ $album->album_name }}</a>
               @endif
            @endforeach
         </div>

      </header>

      @yield('content')

   </div>

   <footer>Layout and design: Photolio.pl. All photos by: {{ $user->name }}. All rights reserved</footer>

   <script src="/js/menu.js"></script>
   <script src="/js/loading.js"></script>
   <script>
      lightbox.option({
         'albumLabel': ''
      });

   </script>
</body>

</html>
