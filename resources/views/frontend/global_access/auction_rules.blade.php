@extends('frontend.layouts.master')

@section('content')
    <div class="p-b-100  p-t-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.includes.breadcrumb')
                </div>
                <!-- Start: Highest Bidder Auction-->
                <div class="col-12">
                    <div class="m-y-50 position-relative">
                        <div class="fz-26 font-weight-bold color-999 global-custom-header"> <span class="text-warning">Meilleures offres </span>Enchères</div>
                        <div class="d-block">
                            <div class="fz-16 text-right position-relative">
                                <span class="link-border"></span>
                                <div class="link-area">
                                    <span class="color-666">{{__('Règles')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rules-area">
                        <p class="color-666">
                            {{__('L\'enchère du meilleur enchérisseur sera créée par le vendeur, donc le reste des enchères. Le montant minimum de l\'enchère sera donné par le créateur de l\'enchère. Après avoir créé l\'enchère, tout utilisateur peut ')}} <span class="color-default font-weight-bold">{{__('devenir vendeur')}}</span> 
							{{__('pourra participer à cette enchère avant la fin du temps imparti. La liste d\'enchères sera affichée dans l\'historique des enchères. Chaque fois que l\'acheteur publie une offre, aucun acheteur ne sera autorisé à publier un montant inférieur. Fin de l\'enchère le plus offrant')}} 
							<span class="color-default font-weight-bold"> {{__('sera choisi comme gagnant')}}</span>.
                        </p>
                        <div class="winner mt-3">
                            <ul>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">Le plus offrant remportera l'enchère.</span>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">Le vendeur décidera du montant de l'enchère de départ / du montant de l'enchère minimum.</span>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">Personne ne pourra enchérir d'un montant inférieur au montant d'enchère le plus élevé existant.</span>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">Le créateur d'enchères décidera combien de fois un acheteur pourra enchérir</span>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">Seuls <span class="color-default font-weight-bold">“Montant de l'enchérisseur le plus élevé”</span> et <span class="color-default font-weight-bold">“Nombre de soumissionnaire”</span> sera affiché dans l'historique des enchères.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Start: Highest Bidder Auction-->

                <!-- Start: Blind Bidder Auction-->
                <div class="col-12">
                    <div class="m-y-50 position-relative">
                        <div class="fz-26 font-weight-bold color-999 global-custom-header"> <span class="text-primary">Enchères à  </span>l'aveugle</div>
                        <div class="d-block">
                            <div class="fz-16 text-right position-relative">
                                <span class="link-border"></span>
                                <div class="link-area">
                                    <span class="color-666">{{__('Règles')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rules-area">
                        <p class="color-666">
                            L'enchérisseur aveugle est similaire au meilleur enchérisseur, mais la <span class="color-default font-weight-bold"> seule différence </span> est que le montant de l'enchère ne sera pas affiché dans l'historique des enchères de l'enchère. <span class="color-default font-weight-bold"> Le plus offrant </span> remportera également l'enchère ici.
                        </p>
                        <div class="winner mt-3">
                            <ul>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">Le plus offrant remportera l'enchère.</span>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">Le vendeur décidera du montant de l'enchère de départ / du montant de l'enchère minimum.</span>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">Le créateur d'enchères décidera combien de fois un acheteur pourra enchérir</span>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">L'historique des enchères restera masqué.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Start: Blind Bidder Auction-->

                <!-- Start: Unique Bidder Auction-->
                <div class="col-12">
                    <div class="m-y-50 position-relative">
                        <div class="fz-26 font-weight-bold color-999 global-custom-header"> <span class="text-info">Enchère d'enchérisseur  </span>unique</div>
                        <div class="d-block">
                            <div class="fz-16 text-right position-relative">
                                <span class="link-border"></span>
                                <div class="link-area">
                                    <span class="color-666">{{__('Règles')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rules-area">
                        <p class="color-666">
                            Les enchères uniques n'afficheront pas non plus l'historique des enchères. Le gagnant sera sélectionné selon les règles spécifiques de celui-ci. <span class="color-default font-weight-bold">L'enchérisseur unique le plus bas</span> remportera l'enchère.
                        </p>
                        <div class="winner mt-3">
                            <ul>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">Le vendeur annoncera le montant minimum de l'enchère. Personne ne pourra enchérir moins.</span>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">L'historique des enchères restera masqué.</span>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">L'enchérisseur unique le plus bas remportera l'enchère.</span>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">Pour la deuxième enchère, le montant sera ajusté avec les dernières enchères.</span>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">Si l'enchère est un ensemble ou un multiple, le gagnant sera choisi parmi le plus bas enchérisseur multiple, celui qui enchérit en premier.</span>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">Il n'y aura pas de différence d'incrément d'enchère</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Start: Unique Bidder Auction-->

                <!-- Start: Vickrey Bidder Auction-->
                <div class="col-12">
                    <div class="m-y-50 position-relative">
                        <div class="fz-26 font-weight-bold color-999 global-custom-header"> <span class="text-success">Vickrey </span>Auction</div>
                        <div class="d-block">
                            <div class="fz-16 text-right position-relative">
                                <span class="link-border"></span>
                                <div class="link-area">
                                    <span class="color-666">{{__('Règles')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rules-area">
                        <p class="color-666">
                           Une enchère Vickrey est un type d'<span class="color-default font-weight-bold">enchère scellée </span>. Les enchérisseurs soumettent des offres écrites sans connaître l'offre des autres personnes participant à l'enchère. Le meilleur enchérisseur gagne mais <span class="color-default font-weight-bold">le prix payé est la deuxième enchère la plus élevée</span>.
                        </p>
                        <div class="winner mt-3">
                            <ul>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">Le plus offrant remportera l'enchère.</span>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">Le gagnant paiera le montant égal du deuxième enchérisseur le plus élevé.</span>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-circle-right mr-3 color-default"></i>
                                    <span class="bg-rules">L'historique des enchères restera masqué.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Start: Vickrey Bidder Auction-->
            </div>
        </div>
    </div>
@endsection

@section('style-top')
    <style>
        .bg-rules {
            background-color: #e8e8e8 !important;
        }
    </style>
@endsection
