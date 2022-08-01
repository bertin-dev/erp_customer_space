<?php
    //INTENSATION DES PARAMETRES D'ENTREPRISE
    //enterprises = enterprise();
   //$enterprise = $enterprises[0];
    $userDatas = session()->get("parameters");
?>

        <div class="row py-2 d-flex justify-content-around">
        <div class="col-sm-12">
            <h4 class ="text-Capitalize text-bold text-center ">
                Bonjour
                 <i>

                @if (count($userDatas->particulier) != 0)
                    {{$userDatas->particulier[0]->firstname. " " . $userDatas->particulier[0]->lastname}}
                @elseif(count($userDatas->entreprise) != 0)
                {{$userDatas->entreprise[0]->name}}
                @endif
            </i>
            </h4>

        </div>
        <div class="col-sm-auto col-md-7 my-5">
            <a href="" class="text-dark btn btn-outline-primary border-3 p-0">
              <div class="card w-80 ">
                <div class="card-body row d-flex justify-content-between">
                  <div class="col-sm-1"> <i class="far fa-credit-card fa-2x "></i></div>
                  <div class="col-sm-auto text-center text-bold">credit-debit-cards
                    Envoyez des paiements en quelques minutes.</i></div>
                  <div class="col-sm-1 text-primary"> <i class="fas fa-chevron-right fa-2x"></i></i></div>
                </div>
              </div>
            </a>
          </div>

        <div class="col-md-5">

              <div class="card w-80 my-3">
                <div class="card-body">
                  <h5 class=" card-title text-bold "><a href="/Activites" class="border-bottom border-2 isLink">Activité récente</a> </h5>
                  <p class="card-text">Voir à quel moment les paiements seront émis. Cliquez ici pour consulter votre activité PayPal récente.</p>

                </div>
              </div>

              <div class="card w-80 my-3">
                <div class="card-body">
                  <h5 class="card-title text-bold "><a href="/PorteFeuille" class="border-bottom border-2 isLink">Cartes</a> </h5>
                  <p class="card-text">Faites vos achats et envoyez des paiements de manière plus sécurisée. Liez votre carte bancaire</p>
                  <button type="button" class="btn btn-outline-primary border-3" >Enregistrer une carte</button>
                </div>
              </div>

        </div>

    </main>

