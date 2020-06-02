@extends('layouts.master')

@section('page-title', '結帳')

@section('page-style')
@endsection

@section('page-script')
<script src="{{ asset('js/form-validation.js') }}"></script>
@endsection

@section('page-content')
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{ asset('svg/bootstrap-solid.svg') }}" alt="" width="72" height="72">
            <h2>結帳</h2>
            <p class="lead">請填寫您的個人資訊並確認您的購物清單</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">購物車</span>
                    <span class="badge badge-secondary badge-pill">{{ $products->count() }}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach($products as $product)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $product->name }}</h6>
                            <small class="text-muted">{{ $product->description }}</small>
                        </div>
                        <span class="text-muted">${{ $product->price }}</span>
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>總價格 (新台幣)</span>
                        <strong>${{ $products->sum->price }}</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">運送地址</h4>
                <form action="{{ route('checkout.index') }}" method="post" class="needs-validation" novalidate>

                    @method('POST')
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="name">姓名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                請填寫您的姓名
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            請填寫 Email
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="zip">郵遞區號</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                請填寫郵遞區號
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="country">縣市</label>
                            <select class="custom-select d-block w-100" id="city" required>
                                <option value="">請選擇</option>
                                <option value="台北市">台北市</option>
                                <option value="新北市">新北市</option>
                                <option value="桃園市">桃園市</option>
                                <option value="台中市">台中市</option>
                                <option value="台南市">台南市</option>
                                <option value="高雄市">高雄市</option>
                            </select>
                            <div class="invalid-feedback">
                                請選擇縣市
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">地址</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                        <div class="invalid-feedback">
                            請填寫地址
                        </div>
                    </div>

                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">運送地址與我付款地址相同</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">記住資訊下次自動套用</label>
                    </div>
                    <hr class="mb-4">

                    <h4 class="mb-3">付款</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                            <label class="custom-control-label" for="credit">信用卡</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="paypal">PayPal</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">卡片姓名</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required>
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                請填寫卡片姓名
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">卡號</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required>
                            <div class="invalid-feedback">
                                請填寫卡號
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">到期日</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                            <div class="invalid-feedback">
                                請填寫到期日
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">安全碼</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                            <div class="invalid-feedback">
                                請填寫安全碼
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <input type="hidden" name="totalAmount" value="{{ $products->sum->price }}">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">確認結帳</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; {{ now()->year }} Laravel 道場</p>
        </footer>
    </div>
@endsection
