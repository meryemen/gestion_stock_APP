<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Login page</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  </head>
<body>

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-50">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 mx-auto">
              <div class="card bg-white text-black shadow-lg " style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-5 mt-md-4 pb-5">
                    <img src="logo.jpg" alt="">

                    <form action="{{ route('login-user') }}" method="post">
                      @if (Session::has('success'))
                      <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        
                        @if (Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                       @endif

                       
                      @csrf
                    <p class="text-black-50 mb-5"></p>
                    <div class="form-outline form-black mb-4">
                        <label class="form-label" for="typeEmailX" style="float: left;" for="username" >Pseudo :</label>
                      <input type="text" id="username" name="username" class="form-control border-0 border-bottom" value="{{ old('username') }}" placeholder="Votre pseudo"  />
                      <span class="text-danger"  style="float: left;" >@error('username') {{ $message }} @enderror</span>
                    </div>
      
                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="typePasswordX" style="float: left;" for="password">Mot de passe :</label>
                      <input type="password" id="typePasswordX" placeholder="Saisissez votre mot de passe"  value="{{ old('password') }}" name="password" id="password" class="form-control border-0 border-bottom"  />
                      <span class="text-danger"  style="float: left;">@error('password') {{ $message }} @enderror</span>
                    </div>
      
                    <p class="small mb-5 pb-lg-8"><a class="text-black-50" href="#!" >Mot de passe oublié?</a></p>      
                    <button class="btn btn-outline-primary btn-xs px-3" id="submit" type="submit">Se connecter</button>
                  </form>

                    <img src="unnamed.png" id="open"alt="">
                  </div>
      
                  
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>