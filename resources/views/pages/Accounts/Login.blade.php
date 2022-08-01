{{Session::forget('data')}}
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Bienvenue chez Smopaye</h3>
            <p>Le bonheur dans l'innovation</p>
            <input type="submit" name="" id = "btn-Register" link = "Register" value="Ouvrir un Compte"/><br/>
        </div>
        <div class="col-md-9 col-sm-11 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">login oublié</a>
                </li>
            </ul>
            <div class="tab-content " id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    {!! Form::open(array( 'method'=>'post', "class" =>"form_login","url" => route('Auth_routes'))) !!}
                        @csrf
                    <h3 class="register-heading">Connexion Au Compte</h3>
                    <div class="row register-form">

                        <div class="col-md-6">
                            <input type="hidden" name = "secret" value="{{env("App_FORM_SECRET")}}" />

                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" placeholder="Numéro de Téléphone *" value="" />
                                <label classs="forError" for="phone" ></label>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="mot de passe *" value="" />
                                <label classs="forError" for="password" ></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="submit" class="btnRegister"  value="connexion"/>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    {!! Form::open(array( 'method'=>'post')) !!}
                        @csrf
                    <h3  class="register-heading container pt-3">Mon de passe Oublié</h3>
                    <div class="row register-form">
                        <div class="col-md-6 mt-4">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="votre E-mail" value="" />

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="submit" class="btnRegister"  value="envoyer"/>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
