<hr>
<?php
    $datas = Session::get('parameters');
    $countCards = count($datas->cards);
?>
@if (count($datas->particulier)!=0)
    <?php $profil = $datas->particulier[0] ?>
@else
    <?php $profil = $datas->entreprise[0] ?>
@endif

<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10">
              <h1>
                  <span class="text-uppercase">{{$profil->lastname}}</span>
                  <span class="text-capitalize"> {{$profil->firstname}}</span></h1></div>

    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->


      <div class="text-center">
        <i class="fa fa-address-card fa-6x" aria-hidden="true"></i>

        <!--<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" height="100px" width="100px" class="avatar img-circle img-responsive rounded-circle" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload">-->
      </div></hr><br>



          <ul class="list-group">
            <li class="list-group-item text-muted"><i class="fas fa-home"></i> Adress | <span>{{$datas->address}} </li>
            <li class="list-group-item text-left"><i class="fas fa-phone"></i>Phone | {{$datas->phone}}</li>
            <li class="list-group-item text-left">
                <i class="fa fa-address-card fa-1x" aria-hidden="true"></i>CNI | {{$profil->cni}}</li>
            <li class="list-group-item text-left"><i class="fas fa-envelope-open"></i> E-Mail | {{$profil->email}}</li>
            <li class="list-group-item text-left"><i class="fas fa-envelope-open"></i> Fonction | {{$profil->fonction}}</li>
            <li class="list-group-item text-left"><i class="fas fa-venus-mars"></i> sexe | {{$profil->gender}}</li>
          </ul>

          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
            	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>

        </div><!--/col-3-->
    	<div class="col-sm-9">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active show" id="nav-profile-tab" data-toggle="tab" href="#nav-compte" role="tab" aria-controls="nav-compte" aria-selected="true">Compte</a>
                    <a class="nav-item nav-link" id="nav-carte-tab" data-toggle="tab" href="#nav-carte" role="tab" aria-controls="nav-carte" aria-selected="false">carte</a>
                    <a class="nav-item nav-link" id="nav-securite-tab" data-toggle="tab" href="#nav-securite" role="tab" aria-controls="nav-securite" aria-selected="false">Sécurité</a>
                    <a class="nav-item nav-link" id="nav-notification-tab" data-toggle="tab" href="#nav-notification" role="tab" aria-controls="nav-notification" aria-selected="false">Notifications</a>

                    <a class="nav-item nav-link" id="nav-outils-tab" data-toggle="tab" href="#nav-outils" role="tab" aria-controls="nav-outils" aria-selected="false">Outils pour les vendeurs</a>
                </div>
             </nav>
        <div class="tab-content">
            <div class="tab-pane active" id="nav-compte">
                <div class="row">
                    <div class="col-sm-3 text-capitalize text-bold">
                        N° DU COMPTE:
                    </div>
                    <div class="col-sm-6 text-right text-bold">
                        {{$datas->compte->account_number}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3 text-capitalize text-bold">
                        N° du Compte parent:
                    </div>
                    <div class="col-sm-6 text-right text-bold">
                        {{$datas->compte->principal_account_id}}
                    </div>
                </div>
                <hr>

                <hr>
                <div class="row">
                    <div class="col-sm-3 text-capitalize text-bold">
                        Statut du compte:
                    </div>
                    <div class="col-sm-6 text-right text-bold">
                        {{$datas->compte->account_state}}
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                      <div class="card-body cleartfix">
                        <div class="media align-items-stretch">
                          <div class="align-self-center">
                            <i class="icon-speech warning font-large-2 mr-2"></i>
                          </div>
                          <div class="media-body">
                            <h4>Solde du compte</h4>
                          </div>
                          <div class="align-self-center">
                            <h1>{{$datas->compte->amount}}</h1>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

              <hr>

            </div><!--/tab-pane-->
             <div class="tab-pane" id="nav-carte">
                <div class=" container-fluid">
                    <section id="">
                      <div class="row">
                        <div class="col-12 mt-3 mb-1">
                          <h4 class="text-uppercase">Information sur les cartes</h4>
                          <div class="card">
                            <div class="card-content">
                              <div class="card-body">
                                <div class="media d-flex">
                                  <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                  </div>
                                  <div class="media-body text-right">
                                    <h4>{{$countCards}}</h4>
                                    <span>Total des cartes</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
  @foreach ($datas->cards as $key)
    <div class="border rounded">
        <div class="row ">
            <div class="col-sm-3 text-bold">N° de Code: </div>
            <div class="col-sm-7 text-bold text-right">{{$key->code_number}}</div>
        </div>
        <div class="row ">
            <div class="col-sm-3 text-bold">Numéro de série: </div>
            <div class="col-sm-7 text-bold text-right">{{$key->serial_number}}</div>
        </div>
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="align-self-center">
                            <i class="icon-pencil primary font-large-2 float-left"></i>
                          </div>
                          <div class="media-body text-left">
                            <h5>Companie </h5>
                            <span>{{$key->company}}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="align-self-center">
                            <i class="icon-pencil primary font-large-2 float-left"></i>
                          </div>
                          <div class="media-body text-left">
                            <h5>Type</h5>
                            <span>{{$key->type}}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="align-self-center">
                            <i class="icon-pencil primary font-large-2 float-left"></i>
                          </div>
                          <div class="media-body text-right">
                            <h5>Statut</h5>
                            <span>{{$key->card_state}}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 ">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="media d-flex">
                      <div class="align-self-center">
                        <i class="icon-pencil primary font-large-1 float-left"></i>
                      </div>
                      <div class="media-body text-left">
                        <h5>montant de Dépôt</h5>
                        <span>{{$key->deposit}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 ">
                <div class="card">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="align-self-center">
                          <i class="icon-pencil primary font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                          <h5>Unités</h5>
                          <span>{{$key->unity}}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                <p>Expire le </p>
            </div>
            <div class="col-sm-5 text-right">
                {{$key->end_date}}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <p>Date de la Derniere Transaction: </p>
            </div>
            <div class="col-sm-5 text-right">
                {{$key->updated_at}}
            </div>
        </div>


    </div>


    <section id="stats-subtitle">
    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <h4 class="text-uppercase">Etat Global </h4>
        <p>Statistics on minimal cards with Title &amp; Sub Title.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-6 col-md-12">
        <div class="card overflow-hidden">
          <div class="card-content">
            <div class="card-body cleartfix">
              <div class="media align-items-stretch">
                <div class="align-self-center">
                  <i class="icon-pencil primary font-large-2 mr-2"></i>
                </div>
                <div class="media-body">
                  <h4>Total Posts</h4>
                  <span>Monthly blog posts</span>
                </div>
                <div class="align-self-center">
                  <h1>18,000</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6 col-md-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body cleartfix">
              <div class="media align-items-stretch">
                <div class="align-self-center">
                  <i class="icon-speech warning font-large-2 mr-2"></i>
                </div>
                <div class="media-body">
                  <h4>Total Comments</h4>
                  <span>Monthly blog comments</span>
                </div>
                <div class="align-self-center">
                  <h1>84,695</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-6 col-md-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body cleartfix">
              <div class="media align-items-stretch">
                <div class="align-self-center">
                  <h1 class="mr-2">$76,456.00</h1>
                </div>
                <div class="media-body">
                  <h4>Total Sales</h4>
                  <span>Monthly Sales Amount</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-heart danger font-large-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6 col-md-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body cleartfix">
              <div class="media align-items-stretch">
                <div class="align-self-center">
                  <h1 class="mr-2">$36,000.00</h1>
                </div>
                <div class="media-body">
                  <h4>Total Cost</h4>
                  <span>Monthly Cost</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-wallet success font-large-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>


  @endforeach

                  <hr>
                  <form class="form" action="##" method="post" id="registrationForm">

              	  </form>
              </div>

            <div class="tab-pane" id="nav-securite">

                <h2></h2>

                <hr>
                   <form class="form" action="##" method="post" id="registrationForm">

                   </form>

              </div><!--/tab-pane-->
              <div class="tab-pane" id="nav-notification">
  notifications

                <hr>
                <form class="form" action="##" method="post" id="registrationForm">

                  </form>
            </div>
            <div class="tab-pane" id="nav-outils">
                Outils

                <hr>
                <form class="form" action="##" method="post" id="registrationForm">

                </form>
            </div>

              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div>
