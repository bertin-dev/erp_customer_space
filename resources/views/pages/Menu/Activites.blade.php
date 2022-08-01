
@isset($loadJsFunction)
    <script>jQuery(function ($) {  getdatas();})</script>
@endisset
    <div class="container-fluid py-3 row d-flex justify-content-between px-5">
        <div class="col-10">
        {!! Form::open(array( 'method'=>'post')) !!}
        @csrf
        <div class="form-row d-flex justify-content-center first-content">
            <div class="col-sm-3">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text text-bold">Début&nbsp;&nbsp; <i class="far fa-calendar-alt"></i></div>
                  </div>
                  <input type="date" lang="fr" class="form-control" id="date_from" placeholder="Début">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text text-bold">Fin&nbsp;&nbsp; <i class="far fa-calendar-alt"></i></div>
                  </div>
                  <input type="date" lang="fr" class="form-control" id="date_to" placeholder="Fin">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group mb-2">

                  <input type="text" class="form-control" id="search" placeholder="Recherche">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-search"></i></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-1">
                 <div class="btn btn-outline-primary btn_filter ">Filtres</div>
              </div>
          </div>
            <!--<div class="form-row">
            {!! Form::label('name', 'Name:',['class'=>'control-label']) !!}
            {!! Form::text('name', '', array('id' => 'name','class'=>'form-control')) !!}
            </div>
            <button type="submit" class="btn btn-block btn-success">Save</button>-->
        {!! Form::close() !!}
     </div>
    <div class="col-1 ">
        <div class="btn btn-outline-primary filter-list"><i class="fas fa-th-list fa-2x "></i></div>
    </div>


        <div class="col-12 second-content">

            <div class="card w-80 my-3">
                <div class="card-body">
                  <h5 class=" card-title text-bold text-center text"><a href="" class="border-bottom border-2">Liste de vos activités</a> </h5>
                  <table id="Activites" param = "Activites" class="display DataTable " style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Id</th>
                            <th>Opération</th>
                            <th>Emétteur</th>
                            <th>Recepteur</th>
                            <th>Montant</th>
                            <th>Frais</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Id</th>
                            <th>Opération</th>
                            <th>Emétteur</th>
                            <th>Recepteur</th>
                            <th>Montant</th>
                            <th>Frais</th>
                            <th>Date</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
                <div class="container border-top">
                    <h4 class ="text-Capitalize text-bold text-center">
                        Aucune Transaction
                    </h4>

                </div>

            </div>

        </div>


        <div class="container content-filter" style="display: none;">
            <div class="card w-80 my-3">
                <div class="card-body">
                    <h5 class=" card-title text-bold text-left text"><a href="" class="border-bottom border-2 filter-back"><i class="fas fa-chevron-left "></i> Précédent</a> </h5>
                  <p class="card-text h4 ">Télécharger les relevés détaillés</p>
                  <div class="container">
                       <a href="/Rapports" class="isLink noMenu">
                            <div class="row d-flex justify-content-between btn btn-outline-primary border-right border-top border-bottom">
                                <div class="col-9 text-left">
                                    <p class="text-bold">Personalisé</p>
                                    <p>Obtenez les informations dont vous avez besoin. Choisissez le type de transaction, la période et plus encore.</p>

                                </div>
                                <div class="col-2 text-right mt-4"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </a>

                  </div>
                  <p class="text-center">Vous recherchez votre activité avec le solde dans votre relevé ? Choisissez l'option personnalisée.</p>
                </div>
            </div>
        </div>

    </div>

