@extends('frontend.layouts.master')
@section('content')

    <!-- ::::::::::::::::::::::START PAGE HEAD ::::::::::::::::::::::::: -->
    <div class="p-b-100  p-t-50">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    @include('layouts.includes.breadcrumb')
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-success text-center font-weight-bold mb-3">{{__('Félicitations, vous avez remporté l\'enchère!')}}</h4>
                            <div class="card">
                                <div class="card-body address-card">
                                    <div class="row">
                                        <div class="col-lg-3 align-self-center">
                                            <img class="img-fluid" src="{{auction_image($auction->images[0])}}" alt="">
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="agent-info">
                                                <div class="personal-info mx-2 my-4">
                                                    <ul>
                                                        <li>
                                                            <span>
                                                                <i class="fa fa-product-hunt"></i>
                                                                Enchère :
                                                            </span>
                                                            <a class="font-weight-bold color-666"
                                                               href="{{route('auction.show', $auction->id)}}">{{$auction->title}}</a>
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="fa fa-user-circle-o"></i>
                                                                vendeur :
                                                            </span>
                                                            <a class="font-weight-bold"
                                                               href="{{route('seller-profile.show', $auction->seller->id)}}">{{$auction->seller->name}}</a>
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="fa fa-phone"></i>
                                                               téléphone :
                                                            </span>
                                                            {{$auction->seller->phone_number}}
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="fa fa-envelope"></i>
                                                                email :
                                                            </span>
                                                            {{$auction->seller->email}}
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="fa fa-money"></i>
                                                                votre offre:
                                                            </span>
                                                            <strong
                                                                class="text-success fz-16">{{$auction->currency->symbol}} {{$isWinner->amount}}</strong>
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="fa fa-check-circle"></i>
                                                                statut de l'expédition :
                                                            </span>

                                                            <span
                                                                class="badge badge-pill w-auto {{config('commonconfig.product_claim_status.' . ( !is_null($auction) ? $auction->product_claim_status : '' ) . '.color_class')}}">{{ config('commonconfig.product_claim_status.' . ( !is_null($auction) ? $auction->product_claim_status : '' ) . '.text')}}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($auction->status == AUCTION_STATUS_COMPLETED)
                                        <div class="default-badge">
                                            {{__('Encheres terminées')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-4">
                    @if(is_null($auction->address_id))
                        <div class="card">
                            <div class="card-body was-validated custom-validate" id="addressOn">
                                <h5 class="color-999 mb-3 border-bottom pb-3">
                                    <span class="font-weight-bold color-default"> Selectionner une adresse </span>
                                    vous souhaitez recevoir le produit à :
                                </h5>

                                <div class="row mb-3">
                                    <div class="col-lg-6 my-1">
                                        <button class="btn font-weight-bold color-999 bg-custom-gray p-5 w-100 fz-20" :class="{'active-color' : showExistingAddress }" @click="onClickExistingAddress">EAdresse existante</button>
                                    </div>
                                    <div class="col-lg-6 my-1">
                                        <button class="btn font-weight-bold color-999 bg-custom-gray p-5 w-100 fz-20" :class="{'active-color' : showNewAddress}" @click="onClickNewAddress">Nouvelle adresse</button>
                                    </div>
                                </div>

                                {{ Form::open(['route'=>['shipping-description.update', $auction->id],'class'=>'form-horizontal edit-profile-form','id' => 'addressInfo']) }}
                                @method('post')
                                @basekey

                                <!-- Existed addresses -->
                                <div v-show="showExistingAddress">
                                    @foreach($addresses as $address)
                                        <div class="card custom-validate-hover my-3">
                                            <div class="custom-control custom-radio mb-3">
                                                {{Form::radio(fake_field('address_id'), old('address_id', $address->id), false, ['class' => 'custom-control-input',  'id' => fake_field('checkerId'. $loop->iteration)] )}}
                                                <label class="custom-control-label"
                                                       for="checkerId{{$loop->iteration}}"></label>
                                            </div>
                                            <div class="card-body address-card">
                                                <div class="agent-info">
                                                    <div class="personal-info mx-2 my-4">
                                                        <ul>
                                                            <li>
                                                                <span>
                                                                    <i class="fa fa-user"></i>
                                                                    Nom :
                                                                </span>
                                                                {{$address->name}}
                                                            </li>
                                                            <li>
                                                                <span>
                                                                    <i class="fa fa-map-marker"></i>
                                                                    Localisation :
                                                                </span>
                                                                {{$address->city}}
                                                                {{$address->country->name}}
                                                            </li>
                                                            <li>
                                                                <span>
                                                                    <i class="fa fa-phone"></i>
                                                                    téléphone :
                                                                </span>
                                                                {{$address->phone_number}}
                                                            </li>
                                                            <li>
                                                                <span>
                                                                    <i class="fa fa-envelope"></i>
                                                                    code postal :
                                                                </span>
                                                                {{$address->post_code}}
                                                            </li>
                                                            <li>
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    Statut vérification :
                                                                </span>

                                                                <span
                                                                    class="badge d-inline-block w-auto badge-pill pr-2 text-white font-weight-normal {{config('commonconfig.verification_status.' . ( $address->is_verified !== VERIFICATION_STATUS_APPROVED ? VERIFICATION_STATUS_UNVERIFIED  : $address->is_verified) . '.color_class')}}"> {{verification_status($address->is_verified) }} </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @if($address->is_default == ACTIVE_STATUS_ACTIVE)
                                                    <div class="default-badge">
                                                        {{$address->is_default == ACTIVE_STATUS_ACTIVE ? 'Default Address' : ''}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach

                                    <!-- Delivery instruction form -->
                                        <div class="card my-3">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="{{ fake_field('delivery_instruction') }}"
                                                           class="control-label color-666 fz-16 required">Avez vous des instructions <span class="color-666 font-weight-bold">de livraison </span> pour le vendeur : <span class="d-block fz-12">(Optionel)</span> </label>
                                                    {{Form::textarea(fake_field('delivery_instruction'), old('delivery_instruction'), ['class' => 'form-control', 'id' => fake_field('delivery_instruction'), 'data-cval-delivery_instruction' => 'Store delivery_instruction required', 'data-cval-rules' => 'required|min:3', 'rows' => 3 ] )}}
                                                    <span class="invalid-feedback cval-error"
                                                          data-cval-error="{{ fake_field('delivery_instruction') }}">{{ $errors->first('delivery_instruction') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <!-- New address form -->
                                <div v-show="showNewAddress">

                                    <div class="card custom-validate-hover my-3">
                                        <div class="card-body address-card p-t-50">
                                            @include('frontend.user_access.auction._form_shipping_description')
                                        </div>
                                    </div>

                                    <!-- Delivery instruction form -->
                                    <div class="card my-3">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="{{ fake_field('delivery_instruction') }}"
                                                                                                                 class="control-label color-666 fz-16 required">Avez vous des instructions <span class="color-666 font-weight-bold">de livraison </span> pour le vendeur : <span class="d-block fz-12">(Optionel)</span> </label>
                                                {{Form::textarea(fake_field('delivery_instruction'), old('delivery_instruction'), ['class' => 'form-control', 'id' => fake_field('delivery_instruction'), 'data-cval-delivery_instruction' => 'Store delivery_instruction required', 'data-cval-rules' => 'required|min:3', 'rows' => 3 ] )}}
                                                <span class="invalid-feedback cval-error"
                                                      data-cval-error="{{ fake_field('delivery_instruction') }}">{{ $errors->first('delivery_instruction') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <div class="form-group mb-2 border-top pt-2">
                                    {{ Form::submit('Submit Address',['class'=>'btn custom-btn px-4 mt-2']) }}
                                </div>

                                {{ Form::close() }}

                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3 color-666"><span class="color-default"> le produit</span> sera envoyé 
                                    à <span class="color-default"> cette adresse </span> :</h5>
                                <div class="card custom-validate-hover my-3">
                                    <div class="card-body address-card">
                                        <div class="agent-info">
                                            <div class="personal-info mx-2 my-4">
                                                <ul>
                                                    <li>
                                                <span>
                                                    <i class="fa fa-user"></i>
                                                    nom :
                                                </span>
                                                        {{$productReceivingAddress->name}}
                                                    </li>
                                                    <li>

                                                <span>
                                                    <i class="fa fa-map-marker"></i>
                                                    localisation :
                                                </span>
                                                        {{$productReceivingAddress->city}}
                                                        {{$productReceivingAddress->country->name}}
                                                    </li>
                                                    <li>
                                                <span>
                                                    <i class="fa fa-phone"></i>
                                                    téléphone :
                                                </span>
                                                        {{$productReceivingAddress->phone_number}}
                                                    </li>
                                                    <li>
                                                <span>
                                                    <i class="fa fa-envelope"></i>
                                                    code postal :
                                                </span>
                                                        {{$productReceivingAddress->post_code}}
                                                    </li>
                                                    <li>
                                                <span>
                                                    <i class="fa fa-check-circle"></i>
                                                    Statut Vérification :
                                                </span>
                                                        <span
                                                            class="badge d-inline-block w-auto badge-pill pr-2 text-white font-weight-normal {{config('commonconfig.verification_status.' . ( $productReceivingAddress->is_verified !== VERIFICATION_STATUS_APPROVED ? VERIFICATION_STATUS_UNVERIFIED  : $productReceivingAddress->is_verified) . '.color_class')}}"> {{verification_status($productReceivingAddress->is_verified) }} </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @if($productReceivingAddress->is_default == ACTIVE_STATUS_ACTIVE)
                                            <div class="default-badge">
                                                {{$productReceivingAddress->is_default == ACTIVE_STATUS_ACTIVE ? 'Default Address' : ''}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Start: shipping instruction -->
                                @if(!is_null($auction->shipping_description))
                                <div class="mt-4">
                                    <h5 class="color-333 mb-3">{{__('Instruction de livraison :')}}</h5>
                                    <p class="mt-3 color-666">{{$auction->shipping_description}}</p>
                                </div>
                                @endif
                                <!-- End: shipping instruction -->

                                <!-- Start: shipping instruction -->
                                @if(!is_null($auction->delivery_date) && $auction->product_claim_status == AUCTION_PRODUCT_CLAIM_STATUS_ON_SHIPPING)
                                    <div class="mt-4">
                                        <h5 class="color-333 mb-3">{{__('Date de livraison :')}}</h5>
                                        <span class="mt-3 fz-20 font-weight-bold color-999">{{$carbon->parse($auction->delivery_date)->diffForHumans()}}</span>
                                    </div>

                                    <!-- End: shipping instruction -->
                                    <h5 class="color-333 mt-4">{{__('Avez-vous déjà reçu le produit?')}}</h5>
                                    <span class="d-block fz-12 color-666">{{__('Veuillez nous informer dès que vous recevez le produit.')}}</span>
                                    <a class="dropdown-item confirmation btn custom-btn bg-success border-0 d-inline-block mt-3 w-auto" data-alert="{{__('Etes-vous sûre?')}}"
                                       data-form-id="urm-{{$auction->id}}" data-form-method='put'
                                       href="{{ route('update-shipping-status-user.update',$auction->id) }}">
                                        <i class="fa fa-check-circle mr-2"></i>
                                        {{__('Oui')}}
                                    </a>
                                @endif

                                @if(!is_null($auction->delivery_date) && $carbon->parse($auction->delivery_date) < now() && now() < $reportWithIn && $auction->product_claim_status != AUCTION_PRODUCT_CLAIM_STATUS_DISPUTED)
                                    <h5 class="color-333 mt-4">{{__('Si vous n\'avez pas reçu le produit à temps, veuillez le signaler ici.')}}</h5>
                                   <a class="btn custom-btn border-0 d-inline-block mt-3" href="{{route('disputes.specific', [DISPUTE_TYPE_SHIPPING_ISSUE, $auction->ref_id])}}">
                                       <i class="fa fa-trash-o mr-2"></i>
                                        {{__('Signaler')}}
                                    </a>
                                    <span class="mt-3 color-666 fz-12 d-block"> <span class="font-weight-bold color-666">{{__('Note :')}}</span> {{__('S\'il est en retard par rapport à l\'heure donnée par le vendeur, veuillez le contacter pour plus de détails.')}}</span>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- ::::::::::::::::::::::::END PAGE HEAD ::::::::::::::::::::::::: -->

@endsection

@section('script')
    <script>
        var app = new Vue({
            el: '#addressInfo',
            el: "#addressOn",
            data: {
                states: [],
                selectedState: "{{ old('state_id') }}",
                selectedCountryId: "{{ old('country_id') }}",
                disableStateDom: false,
                isLoading: false,
                showExistingAddress: false,
                showNewAddress: false,
            },

            methods: {
                onClickExistingAddress(e) {
                    this.showExistingAddress = !this.showExistingAddress;
                    this.showNewAddress = false;
                },
                onClickNewAddress(e) {
                    this.showNewAddress = !this.showNewAddress;
                    this.showExistingAddress = false;
                },
                onChange: function (event) {
                    this.getStates(event.target.value);
                },
                getStates: function (countryId) {
                    this.disableStateDom = true;
                    this.isLoading = true;

                    const thisApp = this;
                    axios.post("{{route('get-state.index')}}", {
                        country_id: countryId
                    })
                        .then(function (response) {
                            thisApp.states = response.data.states;
                            console.log(thisApp.states)
                        })
                        .catch(function (error) {
                            alert('Failed to load states! Please try again.');
                        })
                        .finally(function () {
                            thisApp.disableStateDom = false;
                            thisApp.isLoading = false;
                        });
                }
            },

            mounted() {
                if (parseInt(this.selectedCountryId) && this.selectedCountryId > 0) {
                    this.getStates(this.selectedCountryId);
                }
            }
        })
    </script>
@endsection

@section('style-top')
    <style>
        .agent-info .personal-info ul li span {
            width: 20%;
            text-align: left !important;
            display: inline-block;
            text-transform: capitalize;
        }

        .active-color {
            background-color: #46AB2B;
            color: #fff !important;
        }

        .custom-validate-hover .custom-radio .custom-control-input {
            width: 100%;
            height: 100%;
            z-index: 99;
            cursor: pointer;
        }

        .was-validated .custom-select:valid, .was-validated .form-control:valid {
            border-color: #ced4da;
        }

        .form-group input,
        .form-group select {
            position: relative;
            z-index: 99;
        }

        .custom-validate .custom-radio .custom-control-input ~ .custom-control-label::after {
            font-family: 'FontAwesome';
            content: "\f00c";
            font-size: 20px;
            z-index: 99;
            width: 100% !important;
            background: #d0d0d0;
            height: 100%;
            position: relative;
            border-radius: 40px;
            padding: 5px 10px;
            color: #fff;
        }

        .custom-validate-hover .custom-radio .custom-control-input {
            width: 100%;
            height: 100%;
            z-index: 99;
            cursor: pointer;
        }

    </style>
@endsection

