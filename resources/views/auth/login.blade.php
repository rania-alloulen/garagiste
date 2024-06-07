<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@lang('GARAGISTE')</title>
  @vite(['resources/js/app.js','resources/css/app.css'])
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color:#83B4FF; /* Couleur de fond gris clair */
      color: white; /* Couleur de texte blanche par défaut */
    }
    .container {
      display: flex;
      background-color: #5C2FC2; /* Couleur de fond bleu marine clair pour le cadre */
      border: 2px solid rgba(255, 255, 255, 0.5);
      backdrop-filter: blur(9px);
      border-radius: 12px;
      padding: 30px;
      box-shadow: #6473d6;
      max-width: 900px;
      color: white; /* Couleur de texte blanche pour le conteneur */
    }
    .wrapper {
      width: 50%;
      padding: 30px;
    }
    .wrapper h1 {
      font-size: 36px;
      text-align: center;
      color: white; /* Couleur de texte blanche pour le titre */
    }
    .wrapper .input-box {
      position: relative;
      width: 100%;
      height: 50px;
      margin: 30px 0;
    }
    .input-box input {
      width: 100%;
      height: 100%;
      background: transparent;
      border: none;
      outline: none;
      border: 2px solid rgba(255, 255, 255, .2);
      border-radius: 40px;
      font-size: 16px;
      color: white; /* Couleur de texte blanche pour les entrées */
      padding: 20px 45px 20px 20px;
    }
    .input-box input::placeholder {
      color: #fff;
    }
    .input-box i {
      position: absolute;
      right: 20px;
      top: 30%;
      transform: translate(-50%);
      font-size: 20px;
      color: white; /* Couleur de texte blanche pour les icônes */
    }
    .wrapper .remember-forgot {
      display: flex;
      justify-content: space-between;
      font-size: 14.5px;
      margin: -15px 0 15px;
      color: white; /* Couleur de texte blanche pour les liens */
    }
    .remember-forgot label input {
      accent-color: #fff;
      margin-right: 3px;
    }
    .remember-forgot a {
      color: white; /* Couleur de texte blanche pour les liens */
      text-decoration: none;
    }
    .remember-forgot a:hover {
      text-decoration: underline;
    }
    .wrapper .btn {
      width: 100%;
      height: 45px;
      background: #fff;
      border: none;
      outline: none;
      border-radius: 40px;
      box-shadow: 0 0 10px rgba(0, 0, 0, .1);
      cursor: pointer;
      font-size: 16px;
      color: #333;
      font-weight: 600;
    }
    .wrapper .register-link {
      font-size: 14.5px;
      text-align: center;
      margin: 20px 0 15px;
      color: white; /* Couleur de texte blanche pour les liens */
    }
    .register-link p a {
      color: white; /* Couleur de texte blanche pour les liens */
      text-decoration: none;
      font-weight: 600;
    }
    .register-link p a:hover {
      text-decoration: underline;
    }
    .image-container {
      width: 50%;
      background: url("{{ asset('dist/img/gara1.png') }}") no-repeat right center;
      background-size: cover;
      border-radius: 12px;
    }
    .wrapper1 {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 110vh;
      background: rgba(39, 39, 39, 0.4);
    }
    .nav {
      position: fixed;
      top: 0;
      display: flex;
      justify-content: space-around;
      width: 100%;
      height: 100px;
      line-height: 100px;
      background: transparent;
      z-index: 100;
    }
    .nav-logo p {
      color: white;
      font-size: 25px;
      font-weight: 600;
    }
    .nav-menu ul {
      display: flex;
    }
    .nav-menu ul li {
      list-style-type: none;
    }
    .nav-menu ul li .link {
      text-decoration: none;
      font-weight: 500;
      color: #fff;
      padding-bottom: 15px;
      margin: 0 25px;
    }
    .link:hover, .active {
      border-bottom: 2px solid #fff;
    }
  </style>
</head>
<body>
<div class="wrapper1">
  <nav class="nav">
    <div class="nav-menu" id="navMenu">
      <ul>
        <li><a href="#" class="link active"></a></li>
        <li><a href="#" class="link"></a></li>
        <li><a href="#" class="link"></a></li>
      </ul>
    </div>
  </nav>
</div>
<div class="container">
  <div class="wrapper">
    <form method="POST" action="{{ route('login.post') }}">
      @csrf
      <h1>Se connecter</h1>
      <div class="input-box">
        <input type="email" placeholder="Email" id="email" name="email" required autofocus>
        <i class='bx bxs-envelope'></i>
        <div style="color:red">
          @error('email')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Mot de passe" name="password" id="password" required>
        <i class='bx bxs-lock-alt'></i>
        <div></div>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="{{ route('forget.password.get') }}">Mot de passe oublié</a>
      </div>
      <button type="submit" class="btn">Se connecter</button>
      <div class="register-link">
        <p>Vous n'avez pas un compte ? <a href="{{ 'registration' }}">S'inscrire</a></p>
      </div>
    </form>
  </div>
  <div class="image-container"></div>
</div>
</body>
</html>
