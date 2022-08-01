<?php
$userDatas = session()->get("parameters");
$idCompte = $userDatas->compte->account_number

?>

<div class="container-fluid py-3 row d-flex justify-content-between px-5 Rapports-view">

    <div class="container-fluid ">
     <h5 class="text-bold text-center ">Envoyer</h5>
         <div class="card ">
             <div class="container d-flex justify-content-center my-5">

                        <div class="form-group"> <h3 class="ext-bold text-center ">Envoyer des paiements</h3>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-search"></i></div>
                                    </div>
                                    <input class="form-control text-search" type="text" placeholder="Nom ou numéro de téléphone ou Mail" aria-label="Search">
                                </div>
                                    <div class="list-search border">
                                        <a class="dropdown-item mdb-dropdownLink-1" href="https://mdbootstrap.com/">MDB</a>
                                        <a class="dropdown-item mdb-dropdownLink-1" href="https://mdbootstrap.com/docs/react/">MDB react</a>
                                        <a class="dropdown-item mdb-dropdownLink-1" href="https://mdbootstrap.com/docs/angular/">MDB angular</a>
                                        <a class="dropdown-item mdb-dropdownLink-1" href="https://mdbootstrap.com/docs/vue/">MDB vue</a>
                                        <a class="dropdown-item mdb-dropdownLink-1" href="https://brandflow.net/">BrandFlow</a>
                                        <a class="dropdown-item mdb-dropdownLink-1" href="https://mdbootstrap.com/education/bootstrap/">MDB
                                            Rocks</a>
                                </div>

                            </div>

                        </div>


                    </div>

                     {!! Form::open(array( 'method'=>'post', "class"=>"transactionCc",)) !!}
                     @csrf
                     <div class="form-row d-flex justify-content-center first-content border">
                         <div class="container-fluid text-center justify-content-center">
                             <h1>Transfert compte à compte</h1>
                         </div>

                            <div class="col-sm-0">
                                <div class="input-group mb-2" hidden>
                                    <input type="hidden" name = "secret" value="{{env("App_FORM_SECRET")}}" />
                                <div class="input-group-prepend">
                                    <div class="input-group-text text-bold">N° de compte&nbsp;&nbsp; <i class="far fa-calendar-alt"></i></div>
                                </div>
                                <input type="text" name="account_number_sender" lang="fr" class="form-control" id="account_sender" value="{{$idCompte}}">
                                </div>
                           </div>
                           <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Type de transaction &nbsp;&nbsp;</label>
                                </div>
                                <select class="custom-select" name="transaction_type" id="inputGroupSelect01" required>
                                  <option selected></option>
                                  <option value="TRANSFERT_COMPTE_A_COMPTE">compte à compte</option>
                                </select>
                              </div>
                         </div>
                           <div class="col-sm-4">
                             <div class="input-group mb-2">
                               <div class="input-group-prepend">
                                 <div class="input-group-text text-bold">N° de compte du Recepteur &nbsp;&nbsp; <i class="far fa-user"></i></div>
                               </div>
                               <input type="text" name="account_number_receiver" lang="fr" class="form-control" id="account_recever" placeholder="1234...." required>
                             </div>
                           </div>
                           <div class="col-sm-2">
                             <div class="input-group mb-2">
                                 <input type="number" name="amount" min="1" class="form-control" id="amount" placeholder="Montant (200)" required>
                               <div class="input-group-prepend">
                                 <div class="input-group-text"><i class="fas fa-money-bill-alt"></i></div>
                               </div>
                             </div>
                           </div>

                            <div class="col-sm-1 justify-content-center">
                                <button class="btn btn-outline-primary " data-toggle="modal" >Envoyer</button>
                            </div>
                       </div>
                    {!! Form::close() !!}
             </div>
 <div class="container h2 text-center mt-4"> Etats des transactions</div>
             <table class="table table-sm table-result-state">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID Transaction</th>
                    <th scope="col">Type Transaction</th>
                    <th scope="col">N° compte Emetteur</th>
                    <th scope="col">N° compte Recepteur</th>
                    <th scope="col">Montant</th>
                    <th scope="col">Etat</th>

                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>

         </div>
     </div>

