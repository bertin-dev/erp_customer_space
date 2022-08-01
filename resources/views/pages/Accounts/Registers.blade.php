
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Bienvenue chez Smopaye</h3>
            <p>Le bonheur dans l'innovation</p>
            <input type="submit" name="" id = "btn-login" link = "Login" value="se connecter"/><br/>
        </div>
        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Particulier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Entreprise</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    {!! Form::open(array( 'method'=>'post', "class"=>"formRegisterParticulier", 'acction' =>$linkRegiter)) !!}
                    @csrf
                    <h3 class="register-heading">Compte Particulier</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <input type="hidden" name = "secret" value="{{env("App_FORM_SECRET")}}" />
                            <input type="hidden" class="form-control" name ="compte" placeholder="Type de compte" value="particulier" required />
                            <div class="form-group">
                                <input type="text" name ="firstname" class="form-control" placeholder="Prenom *" value="" required />
                            </div>
                            <div class="form-group">
                                <input type="text" name ="lastname" class="form-control" placeholder="Nom *" value="" required />
                            </div>
                            <div class="form-group">
                                <input type="text" name ="fonction" class="form-control" placeholder="Fonction *" value="" />
                            </div>
                            <div class="form-group">
                                <div class="maxl">
                                    <select class="form-control" name="gender">
                                        <option class=""  selected disabled>Sexe</option>
                                        <option class=""  value="MASCULIN">Masculin</option>
                                        <option value="FEMININ">Féminin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="text-bold">Date de Naissance</p>
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                  </div>
                                  <input type="date" name="date" class="form-control" id="inlineFormInputGroup" placeholder="Début">
                                </div>
                              </div>
                            <div class="form-group">
                                <input type="phone" name ="phone" class="form-control" placeholder="Tel *" value="" />
                            </div>


                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <input type="text" name ="address" class="form-control" placeholder="Adresse " value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" name ="cni" class="form-control" placeholder="CNI " value="" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="E-mail *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="hidden" value="4" name="role_id" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" value="33" type="hidden" name="category_id" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom_img_verso" value ="test.jpeg" hidden>
                            </div>
                           <div class="form-group">
                                <input type="file" name="piece_verso" >
                            </div>
                            <div class="form-group">
                                <input type="file" name="piece_recto"  >
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom_img_recto" value ="test.jpeg" hidden>
                            </div>

                            <input type="submit" class="btnRegister"  value="soumettre"/>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    {!! Form::open(array( 'method'=>'post')) !!}
                    @csrf
                    <h3  class="register-heading">Compte Entreprise</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Raison Socila *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Status " value="" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Rccm" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Phone *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Siège Social" value="" />
                            </div>
                            <div class="form-group row justify-content-center">

                                <div class="col-sm-5 form-group">
                                  <input type="text" class="form-control" placeholder="Latitude" value="">
                                </div>
                                <div class="col-sm-5 form-group">
                                    <input type="text"  class="form-control"  placeholder="Longitude" value="">
                                  </div>
                              </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email *" value="" />
                            </div>
                            <div class="form-group">
                                <select class="form-control">
                                    <option class=""  selected disabled>votre Role</option>
                                    <option>What is your Birthdate?</option>
                                    <option>What is Your old Phone Number</option>
                                    <option>What is your Pet Name?</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control">
                                    <option class=""  selected disabled>votre catégories</option>
                                    <option>What is your Birthdate?</option>
                                    <option>What is Your old Phone Number</option>
                                    <option>What is your Pet Name?</option>
                                </select>
                            </div>
                            <input type="submit" class="btnRegister"  value="Register"/>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</div>
