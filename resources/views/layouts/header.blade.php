

<nav class="navbar navbar-expand-custom navbar-mainbg">
    <a class="navbar-brand navbar-logo" href="#"><img src="{{asset('/img/logo.png')}}" alt="smopaye" class="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars text-white"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto headerNavBar ">
            <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
            <li class="nav-item active">
                <a class="nav-link Recapitulatifs" href="/Recapitulatifs"><i class="fas fa-tachometer-alt"></i>Récapitulatif</a>
            </li>
            <li class="nav-item">
                <a class="nav-link Activites" href="/Activites"><i class="far fa-address-book"></i>Activité</a>
            </li>
            <li class="nav-item">
                <a class="nav-link Payements" href="/Payements"><i class="far fa-clone"></i>Envoyer des paiements</a>
            </li>
            <li class="nav-item">
                <a class="nav-link PorteFeuille" href="/PorteFeuille"><i class="far fa-calendar-alt"></i>Portefeuille</a>
            </li>
            <li class="nav-item">
                <a class="nav-link Offres" href="/Offres"><i class="far fa-chart-bar"></i>Offres</a>
            </li>

            <li class="nav-item">
                <a class="nav-link Parametre" href="/Parametre"><i class="fas fa-users-cog"></i> Parametres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link Deconnexion" href="/Deconnexion"><i class="fas fa-sign-out-alt"></i> Deconnexion</a>
            </li>
        </ul>
    </div>
</nav>

<div class="all-modal">

    <!-- Modal -->
    <div class="modal modal-bg" id="modalConfirm" style="display: none">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header persanal-bg text-white">
            <h5 class="modal-title ml-2" id="modalConfirmLabel">Confirmation</h5>
            <button type="button" class="close text-white" >
              <span >&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Attention, voulez-vous faire un dépôt de <i class="amoutTransact">0</i> fcfa sur le compte <i class="nocompte">0</i> ?               </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-cancel" >annuler</button>
            <button type="button" class="btn btn-primary btn-confirm">Corfirmer</button>
          </div>
        </div>
      </div>
    </div>

    <!------------------->

    <!-- Modal -->
    <div class="modal modal-bg" id="confirmation" style="display: none"   >
      <div class="modal-dialog modal-dialog-centered" >
        <div class="modal-content">
          <div class="modal-header persanal-bg text-white">
            <h5 class="modal-title ml-2" id="exampleModalCenterTitle">Message</h5>
            <button type="button" class="close text-white" >
              <span >&times;</span>
            </button>
          </div>
          <div class="modal-body">

          </div>
        </div>
      </div>
    </div>
</div>


