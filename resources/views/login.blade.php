@extends('base')
@section('content')
<section id="content" style="margin-bottom: 0px;">


  @if(!Auth::check())

            <div class="content-wrap nopadding">

                <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('images/parallax/home/1.jpg') center center no-repeat; background-size: cover;"></div>
                <div class="section nobg full-screen nopadding nomargin" style="height: auto;">
                    <div class="container vertical-middle divcenter clearfix" style="position: relative; top: 0px; width: auto; padding-top: 20px; padding-bottom: 60px; margin-top: 0px;">
                        <div class="panel panel-default divcenter noradius noborder col-md-6">
                            <div class="panel-body" style="padding: 40px;">
                            <form  action="{{ URL::route('signIn') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <h3>Hesabınıza giriş yapın</h3>

                                    <div class="col_full">
                                        <label for="login-form-username">E-mail:</label>
                                        <input type="text" id="login-form-username" name="email" value="" class="form-control not-dark">
                                    </div>

                                    <div class="col_full">
                                        <label for="login-form-password">Parola:</label>
                                        <input type="password" id="login-form-password" name="password" value="" class="form-control not-dark">
                                    </div>
                                    <br />
                                    <div class="col_full nobottommargin">
                                        <button class="btn btn-primary" id="" name="login-form-submit" value="login">Giriş yap</button>
            
                                    </div>
                                </form>

                                <div class="line line-sm"></div>

                            </div>
                        </div>
                        <div class="panel panel-default divcenter noradius noborder col-md-6">
                            <div class="panel-body" style="padding: 40px;">
                           
                                    <h3>Hesabınız yok mu?</h3>

                                    <div class="col_full">
                                        <a href="{{ URL::route('signUp') }}">Hemen Bir Hesap Oluşturun</a>
                                    </div>

                                   
                                    <br />

                                <div class="line line-sm"></div>

                            </div>
                        </div>
                        

                    </div>
                </div>

            </div>

        @else
            <div class="col-md-12">   
                    <p><h1 class="m_bottom_15">{{ Auth::user()->name }}</h1></p>
                    <p><a href="/editaccount" class="default_t_color">Hesap Bilgileri</a></p>
                    <p><a href="/auth/logout">
       @endif
       @endsection