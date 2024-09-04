
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{__('admin.login_page')}} </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <style type="text/css">
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

.forget {
    text-decoration: none;
    color: white;
    margin-left: 10px;
    font-size: 15px;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: url("https://i.postimg.cc/FR2vpqbG/black-aesthetic-mountains-4k-9k.jpg")
    no-repeat;
  background-size: cover;
  background-position: center;
}

.wrapper {
  width: 420px;
  background: transparent;
  border: 2px solid rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(6px);
  box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
  color: #fff;
  padding: 30px 40px;
}

.wrapper h1 {
  font-size: 36px;
  text-align: center;
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
  font-size: 16px;
  color: #fff;
  padding: 20px 40px 20px 20px;
  border: none;
  outline: none;
  border: 2px solid rgba(255, 255, 255, 0.2);
  border-radius: 40px;
}

.input-box input::placeholder {
  color: #fff;
}

.input-box i {
  position: absolute;
  right: 20px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 20px;
}

.wrapper .remember-forget {
  display: flex;
  justify-content: space-between;
  font-size: 14.5px;
  margin: 20px 0 15px;
}

.remember-forget label input {
  accent-color: #fff;
  margin-right: 10px;
}

.remember-forget a {
  color: #fff;
  text-decoration: none;
}

.remember-forget a:hover {
  text-decoration: underline;
}

.wrapper .btn {
  width: 100%;
  height: 45px;
  background: #fff;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  color: #333;
  font-weight: 600;
}

.wrapper .btn:hover {
  background: rgba(255, 255, 255, 0.2);
  color: #fff;
  border-color: #fff;
}

.wrapper .register-link {
  font-size: 14.5px;
  text-align: center;
  margin: 20px 0 15px;
}

.register-link p a {
  color: #fff;
  text-decoration: none;
  font-weight: 600;
}

.register-link p a:hover {
  text-decoration: underline;
}
.login {
    margin-top: 10px ;
}

    </style>

</head>
<body>
    
    <div class="wrapper">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <h1>Login</h1>

            <div class="input-box">
                <input type="text" class="@error('emai') is-invalid @enderror" placeholder="Email" type="email" name="email" :value="{{old('email')}}" placeholder="Email" required autofocus autocomplete="email">
                <i class='fas fa-envelope'></i>

                @error('email')
                   <small class="invalid-feedback"> {{$message}}</small>
                @enderror

            </div>


            <div class="input-box">
                <input class="@error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                <i class='bx bxs-lock-alt' ></i>

                @error('password')
                   <small class="invalid-feedback"> {{$message}}</small>
                @enderror
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>


            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>

            
             @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 forget" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif


            <button type="submit" class="btn login">{{__('admin.login')}}</button>

            <div class="register-link">
                <p>Don't have an account? <br>
                <a href="{{route('register')}}">Register</a></p>
            </div>

        </form>


    </div>

</body>
</html>

















