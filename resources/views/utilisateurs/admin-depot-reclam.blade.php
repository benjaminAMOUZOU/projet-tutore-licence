@extends("layouts.layout-admin")
@section('contenu-admin')
    <!-- Diapo resume -->
    @include('includes.layout-recap-reclam')

    <!-- Page de demande content -->
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-warning">Demandes de réclamation <i class="fas fa-exclamation-triangle"></i></h6>
        </div>
        <div class="card-body">
            <div class="row search-sort-box">
                <!-- Sort box -->
                <div class="col-lg-4">
                    <form class="form-inline">
                        <select class="custom-select my-1 mr-sm-2 action_admin_selection" id="inlineFormCustomSelectPref">
                            <option>Action unique</option>
                            <option>Action groupée</option>
                        </select>
                    </form>
                </div>
                <!--Action groupéé button-->
                <div class="col-lg-3">
                    <button type="button" class="btn btn-warning btn-md float-md-right text-white text-bold passer_etape_groupe_btn"
                    style="display:none">
                        Passer l'étape
                        <i class="fas fa-angle-double-right"></i>
                    </button>
                </div>
                <!-- Search-box -->
                <div class="col-lg-4 offset-lg-1">
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                          <input type="text" class="form-control bg-light border-0 small" placeholder="Faire une recherche..." aria-label="Search" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn btn-warning" type="button">
                              <i class="fas fa-search fa-sm"></i>
                            </button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-striped border-left-warning " id="tableDemandes" width="100%" cellspacing="0">
                    @if($nRec_depots > 0)
                        <!--titres du tableau -->
                        <thead class="thead-warning">
                            <tr>
                                <!--<th scope="col" style="width: 1em;">#</th>-->
                                <th scope="col">Carte</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Code Ue</th>
                                <th scope="col">Evaluation</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <!-- Contenu du tableau -->
                        <tbody>
                            @foreach($Rec_depots as $rec)
                            <tr id="{{$rec->id}}">
                                <td>{{$rec->numero_carte}}</td>
                                <td>{{$rec->name}}</td>
                                <td>{{$rec->first_name}}</td>
                                <td>
                                    <ul class="list-group" style="list-style-type:none;">
                                            <!--Une ligne d'Ue -->
                                            <li>
                                                <b>{{$rec->code}}</b>
                                            </li>
                                    </ul>
                                </td>
                                <td>{{$rec->type_note}}</td>
                                <td>
                                    <button class="btn btn-link btn-sm voirPlusMoins" id="maitre_{{$rec->id}}">Voir plus</botton>
                                </td>
                                <td>
                                    <button type="button" value="ue:{{$rec->id}}:{{$rec->etape_id}}:{{$rec->etudiant_id}}" class="btn btn-warning btn-sm float-md-right text-white text-bold passer_etape_unique_btn">
                                        Passer l'étape
                                        <i class="fas fa-angle-double-right"></i>
                                    </button>
                                </td>
                                <td>
                                    <input type="checkbox" value="ue:{{$rec->id}}:{{$rec->etape_id}}:{{$rec->etudiant_id}}" class="action_groupe_checkbox" style="display:none"/>
                                </td>
                            </tr>
                            <tr style="display:none; background-color:rgba(0, 0, 0, 0.05);" id="esclave_{{$rec->id}}">
                                <td colspan="8" >
                                    <div>
                                        <span>
                                            <div class="row">
                                                <b class="col-lg-6 text-right">Filière</b>: {{$rec->filiere}}<br/>
                                            </div>
                                            <div class="row">
                                                <b class="col-lg-6 text-right">Libelle matière</b>: {{$rec->matiere}}<br/>
                                            </div>
                                            <div class="row">
                                                <b class="col-lg-6 text-right">Note obtenue</b>: {{$rec->note_obtenue}}<br/>
                                            </div>
                                            <div class="row">
                                                <b class="col-lg-6 text-right">Intervalle de note réclamé</b>: {{$rec->note_reclame}}<br/>
                                            </div>
                                            <div class="row">
                                                <b class="col-lg-6 text-right">Date demande</b>: {{$rec->date_depot}}<br/>
                                            </div>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    @else
                        @include('includes.empty')
                    @endif
                </table>
            </div>
            <div class="row pagin-row float-right ">
                <div class="col-lg-12">
                    <nav aria-label="..." >
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" tabindex="-1">Précédent</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Suivant</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
