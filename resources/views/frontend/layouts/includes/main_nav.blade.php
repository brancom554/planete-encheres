<!-- =========== Start: header =========== -->
<div class="main-sidenav">
    <div class="position-relative">
        <div class="main-logo m-4 d-flex">
            <a class="" href="{{route('home')}}">
                <img class="img-fuild" src="{{company_logo()}}" alt="">
            </a>
        </div>
        <span class="close-button position-absolute button">
            <img class="img-fluid" src="{{asset('images/close.png')}}" alt="Close">
        </span>
    </div>
    @auth
        <div class="nav-card">
            <div class="card m-4">
                <div class="card-body">
                    <p class="color-666 mb-2 fz-20 font-weight-bold text-center">{{__('Balance')}}</p>
                    <div class="text-center">
                        @php($wallet = auth()->user()->wallets[0])
                        <div class="d-flex justify-content-between my-1">
                            <p class="color-999 fz-14 d-inline">{{!is_null($wallet) ? $wallet->currency->symbol : '' }}</p>
                            <h6 class="font-weight-bold d-inline color-default">{{!is_null($wallet) ? $wallet->balance : '' }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    <div class="mCustomScrollbar sidenav">
        <ul class="sidebar-menu">

            @if(auth()->user())
                <li class="header">{{__('MAIN NAVIGATION')}}</li>
                <li class="treeview {{is_current_route(['user-profile.index', 'seller-profile.index', 'seller-profile.create']) ? 'active' : ''}}">
                    <a href="javascript:;">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{is_current_route('user-profile.index') ? 'active' : ''}}"><a href="{{route('user-profile.index')}}"><i class="fa fa-dot-circle-o"></i> Mon profil</a></li>
                        @if(!is_null(auth()->user()->seller))
                            <li class="{{is_current_route('seller-profile.index') ? 'active' : ''}}"><a href="{{route('seller-profile.index')}}"><i class="fa fa-dot-circle-o"></i> Boutique</a></li>
                        @else
                            <li class="{{is_current_route('seller-profile.create') ? 'active' : ''}}"><a href="{{route('seller-profile.create')}}"><i class="fa fa-dot-circle-o"></i> Devenir vendeur</a></li>

                        @endif
                    </ul>
                </li>
                <li class="treeview {{is_current_route(['user-currency.index','deposit.index','withdrawal.index','transaction-history']) ? 'active' : ''}}">
                    <a href="javascript:;">
                        <i class="fa fa-money"></i>
                        <span>{{__('Mes finances')}}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{is_current_route('user-currency.index') ? 'active' : ''}}"><a href="{{route('user-currency.index')}}"><i class="fa fa-dot-circle-o"></i>{{__('Mon portefeuille')}}</a>
                        </li>
                        <li class="{{is_current_route('deposit.index') ? 'active' : ''}}"><a href="{{route('deposit.index')}}"><i class="fa fa-dot-circle-o"></i>{{__('Mes dépôts')}}</a>
                        </li>
                        <li class="{{is_current_route('withdrawal.index') ? 'active' : ''}}"><a href="{{route('withdrawal.index')}}"><i class="fa fa-dot-circle-o"></i>{{__('Mes retraits')}}
                            </a></li>
                        <li class="{{is_current_route('transaction-history') ? 'active' : ''}}"><a href="{{route('transaction-history')}}"><i class="fa fa-dot-circle-o"></i>{{__('Mes transactions')}}</a></li>
                    </ul>
                </li>
                <li class="treeview {{is_current_route(['auction.create','seller-profile.index','user-profile.index','seller-profile.create']) ? 'active' : ''}}">
                    <a href="javascript:;">
                        <i class="fa fa-list-ul"></i>
                        <span>{{__('Gérer les enchères')}}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        @if(!is_null(auth()->user()->seller))
                            <li class="{{is_current_route('auction.create') ? 'active' : ''}}">
                                <a href="{{route('auction.create')}}"><i class="fa fa-dot-circle-o"></i>{{__('Créer une enchère')}}</a>
                            </li>
                            <li class="{{is_current_route('seller-profile.index') ? 'active' : ''}}">
                                <a href="{{route('seller-profile.index')}}"><i class="fa fa-dot-circle-o"></i>{{__('Mes enchères')}}</a>
                            </li>
                        @endif
                        <li class="{{is_current_route('user-profile.index') ? 'active' : ''}}">
                            <a href="{{route('user-profile.index')}}"><i class="fa fa-dot-circle-o"></i>{{__('Enchères assistées')}}</a>
                        </li>
                        <li class="{{is_current_route('seller-profile.create') ? 'active' : ''}}">
                            <a href="{{route('seller-profile.create')}}"><i class="fa fa-dot-circle-o"></i>{{__('Devenir vendeur')}}</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview {{is_current_route(['user-profile.edit','user-profile.change-password','user-profile.avatar.edit','user-address.create','user-address.index','profile-verification-with-address.create','profile-verification-with-id.create']) ? 'active' : ''}}">
                    <a href="javascript:;">
                        <i class="fa fa-user-circle-o"></i>
                        <span>{{__('Gérer mon profil')}}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{is_current_route('user-profile.edit') ? 'active' : ''}}"><a href="{{route('user-profile.edit')}}"><i class="fa fa-dot-circle-o"></i>{{__('Editer mon profil')}}</a></li>
                        <li class="{{is_current_route('user-profile.change-password') ? 'active' : ''}}"><a href="{{route('user-profile.change-password')}}"><i class="fa fa-dot-circle-o"></i>{{__('Changer mot de passe')}}</a></li>
                        <li class="{{is_current_route('user-profile.avatar.edit') ? 'active' : ''}}"><a href="{{route('user-profile.avatar.edit')}}"><i class="fa fa-dot-circle-o"></i>{{__('Changer ma photo de profil')}}</a></li>
                        <li class="{{is_current_route('user-address.create') ? 'active' : ''}}"><a href="{{route('user-address.create')}}"><i class="fa fa-dot-circle-o"></i>{{__('Ajouter une nouvelle adresse')}}</a></li>
                        <li class="{{is_current_route('user-address.index') ? 'active' : ''}}"><a href="{{route('user-address.index')}}"><i class="fa fa-dot-circle-o"></i>{{__('Choisir une adresse par défaut')}}</a></li>
                        <li class="{{is_current_route('profile-verification-with-address.create') ? 'active' : ''}}"><a href="{{route('profile-verification-with-address.create')}}"><i class="fa fa-dot-circle-o"></i>{{__('Vérifier votre adresse')}}</a></li>
                        <li class="{{is_current_route('profile-verification-with-id.create') ? 'active' : ''}}"><a href="{{route('profile-verification-with-id.create')}}"><i class="fa fa-dot-circle-o"></i>{{__('Verifier votre identité')}}</a></li>
                    </ul>
                </li>
                @if(!is_null(auth()->user()->seller))
                    <li class="treeview {{is_current_route(['seller-profile.edit','address.create','address.index','seller-verification-with-address.create']) ? 'active' : ''}}">
                        <a href="javascript:;">
                            <i class="fa fa-building-o" aria-hidden="true"></i>
                            <span>{{__('Gérer ma boutique')}}</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{is_current_route('seller-profile.edit') ? 'active' : ''}}"><a href="{{route('seller-profile.edit', auth()->user()->seller->id)}}"><i class="fa fa-dot-circle-o"></i>{{__('Modifier la boutique')}}</a></li>
                            <li class="{{is_current_route('address.create') ? 'active' : ''}}"><a href="{{route('address.create')}}"><i class="fa fa-dot-circle-o"></i>{{__('Ajouter une adresse')}}</a></li>
                            <li class="{{is_current_route('address.index') ? 'active' : ''}}"><a href="{{route('address.index')}}"><i class="fa fa-dot-circle-o"></i>{{__('Choisir une adresse par défaut')}}</a></li>
                            <li class="{{is_current_route('seller-verification-with-address.create') ? 'active' : ''}}"><a href="{{route('seller-verification-with-address.create')}}"><i class="fa fa-dot-circle-o"></i>{{__('Verifier votre adresse')}}</a></li>
                        </ul>
                    </li>
                @endif
                <li class="{{is_current_route('notification.index') ? 'active' : ''}}">
                    <a href="{{route('notification.index')}}">
                        <i class="fa fa-bell-o"></i> <span>{{__('Mes notifications')}}</span>
                        @if(total_notifications() != null)
                            <small class="label pull-right label-info custom-notifi-badge">{{total_notifications()}}</small>
                        @endif
                    </a>
                </li>
                <li class="treeview {{is_current_route(['dispute.create','dispute.index']) ? 'active' : ''}}">
                    <a href="javascript:;">
                        <i class="fa fa-bug" aria-hidden="true"></i>
                        <span>{{__('Gérer les rapports')}}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{is_current_route('dispute.create') ? 'active' : ''}}"><a href="{{route('dispute.create')}}"><i class="fa fa-pencil-square-o"></i> <span>{{__('Signaler un dysfonctionnement')}}</span></a></li>
                        <li class="{{is_current_route('dispute.index') ? 'active' : ''}}"><a href="{{route('dispute.index')}}"><i class="fa fa-list"></i> <span>{{__('Tous mes rapports')}}</span></a></li>
                    </ul>
                </li>
            @endif
            <li class="header mt-4">{{__('NAVIGATION SUR LE SITE')}}</li>
            <li class="{{is_current_route('auction.home') ? 'active' : ''}}"><a href="{{route('auction.home')}}"><i class="fa fa-gavel"></i> <span>{{__('Toutes les enchères')}}</span></a></li>
            <li class="treeview {{is_current_route('auction-type.home') ? 'active' : ''}}">
                <a href="javascript:;">
                    <i class="fa fa-list"></i>
                    <span>{{__('Types d\'enchères')}}</span>
                    <span class="label label-primary pull-right badge badge-pill bg-teal text-white">4</span>
                </a>
                <ul class="treeview-menu display-none">
                    @foreach(get_auction_type_value() as $auctionType)
                        <li>
                            <a href="{{route('auction-type.home', auction_type_slug($auctionType))}}"><i class="fa fa-dot-circle-o"></i> {{auction_type($auctionType)}}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="{{is_current_route('contact-us.create') ? 'active' : ''}}">
                <a href="{{route('contact-us.create')}}">
                    <i class="fa fa-envelope-open-o"></i> <span>{{__('Nous contacter')}}</span>
                </a>
            </li>
            <li class="{{is_current_route('auction-rules.index') ? 'active' : ''}}">
                <a href="{{route('auction-rules.index')}}">
                    <i class="fa fa-question-circle-o"></i> <span>{{__('Règles d\'enchères')}}</span>
                </a>
            </li>
        </ul>
    </div>

</div>

<div class="overlay"></div>

<div class="main-nav">
    <div class="container">
        <div class="row">

            <!-- Start: logo -->
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-8">
                        <div class="main-logo">
                            <a href="{{route('home')}}">
                                <img class="img-fluid" src="{{company_logo()}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div>
                            <button type="button" class="c-button button c-button--primary">
                                <div class="hamburger">
                                    <div class="top-bun"></div>
                                    <div class="meat"></div>
                                    <div class="bottom-bun"></div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End: logo -->

            <!-- Start: search area -->
            <div class="{{Auth::check() ? 'col-lg-7' : 'col-lg-6' }}">
                <form action="{{route('auction-search.index')}}" method="get">
                    @csrf
                    <div id="search">
                        <input name="p_srch" id="input" placeholder="Search..." value="{{ request()->get('p_srch') }}"/>
                        <button type="submit" id="button"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <!-- End: search area -->

            <!-- Start: profile area -->
            <div class="{{Auth::check() ? 'col-lg-2' : 'col-lg-3' }}">
                <div class="nav-icons notification-control-main">
                    @if(Auth::guest())
                    <nav class="nav nav-pills d-flex text-center">
                        <a class="flex-fill guest-link text-sm-center nav-link" data-toggle="modal"
                           data-target="#registerModal" href="javascript:">
                            Créer un compte
                        </a>
                        <a class="flex-fill guest-link text-sm-center nav-link" data-toggle="modal"
                           data-target="#loginModal" href="javascript;">
                            Se connecter
                        </a>
                    </nav>
                    @else
                    <nav class="nav nav-pills d-flex">
                        <div class="d-inline-block flex-fill ">
                            <!-- Start: notification area -->
                            <a class="text-sm-center nav-link" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false" href="javascript:">
                                <i class="fa fa-bell-o position-relative nav-notification">
                                    @if(total_notifications() != null)
                                        <span class="notification-badge">{{total_notifications()}}</span>
                                    @endif
                                </i>
                            </a>
                            <div class="dropdown-menu notifications-area drop-menu dropdown-menu-right">
                                <span class="font-weight-bold color-666 d-block border-bottom pb-2">{{__('Notifications')}}</span>
                                @foreach(get_notifications() as $notification)
                                    <div class="block clearfix">
                                        <a class="d-block fz-14 {{$notification->link == null ? 'disabled' : ''}}" href="{{$notification->link == null ? 'javascript:;' : $notification->link }}">
                                            {{view_html($notification->data)}}
                                        </a>
                                        <span class="d-block px-2 float-right color-999 fz-12">{{$notification->created_at !== null ? $notification->created_at->diffForHumans():''}}</span>
                                    </div>
                                @endforeach
                                <a class="d-block border-top pt-2 mt-2 text-center" href="{{route('notification.index')}}">{{__('Voir toutes les notifications')}}</a>
                            </div>
                            <!-- End: notification area -->
                        </div>
                        <div class="d-inline-block flex-fill ">
                            <a class=" user-avater text-sm-center nav-link p-0" aria-labelledby="dropdownProfile" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" href="javascript:">
                                <img class="rounded-circle" src="{{get_avatar(auth()->user()->avatar)}}" alt="Avatar">
                            </a>
                            <div class="dropdown-menu drop-menu profile-drop dropdown-menu-right" aria-labelledby="dropdownProfile">
                                <span class="text-center d-block">{{auth()->user()->profile->first_name}} {{auth()->user()->profile->last_name}}</span>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('user-profile.index')}}">
                                    <i class="fa fa-user mr-3"></i>
                                    {{__('Profil')}}
                                </a>
                                <a class="dropdown-item" href="{{route('notification.index')}}">
                                    <i class="fa fa-bell-o mr-3"></i>
                                    {{__('Mes notifications')}}
                                </a>
                                <a class="dropdown-item" href="{{route('dispute.create')}}">
                                    <i class="fa fa-bug mr-3"></i>
                                    {{__('Signaler un problème')}}
                                </a>
                                <a class="dropdown-item" href="{{route('transaction-history')}}">
                                    <i class="fa fa-money mr-3"></i>
                                    {{__('Mes transactions')}}
                                </a>
                                <a class="dropdown-item" href="{{route('user-profile.edit')}}">
                                    <i class="fa fa-cogs mr-3"></i>
                                    {{__('Manager mon profil')}}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="fa fa-sign-out mr-3" aria-hidden="true"></i> {{__('Déconnexion')}}
                                </a>
                            </div>
                        </div>
                    </nav>
                    @endif
                </div>
            </div>
            <!-- End: profile area -->

        </div>
    </div>
</div>
<!-- =========== End: header ============= -->
